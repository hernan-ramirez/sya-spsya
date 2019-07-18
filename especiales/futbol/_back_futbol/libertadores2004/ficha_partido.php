<script>
function printWindow(){
   bV = parseInt(navigator.appVersion)
   if (bV >= 4) window.print()
}
</script>


<? require_once "../../common/conexion.php"; ?>

<? 
$sql = "
SELECT p.*, DATE_FORMAT(p.fecha_partido,'%e/%c/%y') AS fecha, t.torneo, c.nombre AS primer_club, cc.nombre AS segundo_club, c.id AS id_primer_club, cc.id AS id_segundo_club 
FROM futbol_partidos p 
	LEFT JOIN futbol_torneos t ON (t.id = p.id_torneo)
	LEFT JOIN futbol_clubes c ON (c.id = p.id_primer_club)
	LEFT JOIN futbol_clubes cc ON (cc.id = id_segundo_club)
WHERE p.id = $id_partido
";
//echo "<pre>".$sql."</pre>";

$result = mysql_query($sql);
if(mysql_num_rows($result)!=0){
	$row = mysql_fetch_array($result);
	$m = $row["id_primer_club"];
	$n = $row["id_segundo_club"];
	$estilo_club[$m] = "GreenBorde1";
	$estilo_club[$n] = "Terra1";
	
?>
<LINK href="../../common/css/style.css" rel="stylesheet" type="text/css">
<BODY bgcolor="EAEAEA" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<TABLE width="100%" border="0" cellpadding="0" cellspacing="0">
  <TR bgcolor="#D7E3DB"> 
	<TD colspan="2" class="BackEspecialesFst"><STRONG>Datos del Partido: </STRONG></TD>
  </TR>
  <TR> 
	<TD width="70" align="right" class="Green1">Torneo</TD>
	<TD class="Green3"><? echo $row["torneo"] ?>&nbsp;</TD>
  </TR>
  <TR> 
	    <TD align="right" class="Green3">Partido</TD>
	<TD class="Green3"><? echo $row["primer_club"] ?> vs. <? echo $row["segundo_club"] ?></TD>
  </TR>
  <TR> 
	<TD align="right" class="Green1">Fecha</TD>
	<TD class="Green3"><? echo $row["fecha"] ?>&nbsp;</TD>
  </TR>
  <TR> 
	<TD align="right" class="Green3">Estadio</TD>
	<TD class="Green3"><? echo $row["estadio"] ?>&nbsp;</TD>
  </TR>
  <TR> 
	<TD align="right" class="Green1">Arbitro </TD>
	<TD class="Green3"><? echo $row["arbitro"] ?>&nbsp;</TD>
  </TR>
  <TR> 
	<TD align="right" class="Green2">Líneas</TD>
	<TD class="Green3"><? echo $row["lineas"] ?>&nbsp;</TD>
  </TR>
  <TR> 
	<TD align="right" class="Green1">Resultado</TD>
	<TD class="Green3"><b><? echo $row["goles_primer_club"] ?> - <? echo $row["goles_segundo_club"] ?></b></TD>
  </TR>
</TABLE>
<TABLE width="100%" border="0" cellpadding="0" cellspacing="0">
  <TR bgcolor="#D7E3DB"> 
	<TD colspan="2" class="BackEspecialesFst"><STRONG>Formaciones</STRONG></TD>
  </TR>
  <TR> 
	<TD width="50%" class="GreenBorde1"><b><? echo $row["primer_club"] ?>&nbsp;</b></TD>
	<TD width="50%" class="Terra1"><b><? echo $row["segundo_club"] ?>&nbsp;</b></TD>
  </TR>
	<? 
	$result_forma = mysql_query("SELECT * FROM futbol_formacion WHERE `id_partido`=$id_partido");
	if(mysql_num_rows($result_forma)!=0){
		while($row_forma = mysql_fetch_array($result_forma)){
			$i = $row_forma["id_jugador"];
			$orden[$i] = $row_forma["orden"];
		}
	}
	?>
  <TR> 
	<TD valign="top">
	<TABLE border="0" cellspacing="0" cellpadding="0" width="100%">
<? 
	  			$sql = "
						SELECT j.nombre, j.apellido, j.id
						FROM futbol_formacion f
							LEFT JOIN futbol_jugadores j ON (j.id = f.id_jugador)
							LEFT JOIN futbol_planteles p ON (p.id_jugador = j.id)
						WHERE id_torneo = $row[id_torneo]
						AND id_clubes = $row[id_primer_club]
						ORDER BY id_clubes
					";
	$result_jug = mysql_query($sql);
	if(mysql_num_rows($result_jug)){
		while($row_jug=mysql_fetch_array($result_jug)){
		$idjug = $row_jug["id"];
	?>	
  <TR>
	<TD class="Green1"><? echo $row_jug["apellido"].", ".$row_jug["nombre"];?></TD>
  </TR>
  <?
	}
}
?>
</TABLE>
</TD>
	<TD valign="top">
	<TABLE border="0" cellspacing="0" cellpadding="0" width="100%">
<? 
		$sql = "
				SELECT j.nombre, j.apellido, j.id
				FROM futbol_formacion f
					LEFT JOIN futbol_jugadores j ON (j.id = f.id_jugador)
					LEFT JOIN futbol_planteles p ON (p.id_jugador = j.id)
				WHERE id_torneo = $row[id_torneo]
				AND id_clubes = $row[id_segundo_club]
				ORDER BY id_clubes
			";
	$result_jug = mysql_query($sql);
	if(mysql_num_rows($result_jug)){
		while($row_jug=mysql_fetch_array($result_jug)){
		$idjug = $row_jug["id"];
	?>	
  <TR>
	<TD class="Terra1"><? echo $row_jug["apellido"].", ".$row_jug["nombre"];?></TD>
  </TR><?
	}
}
?></TABLE>
	</TD>
  </TR>
</TABLE>
<?
$resultado = mysql_query("SELECT c.id, c.minuto, j.apellido AS sale_apellido, j.nombre AS sale_nombre, 
ju.apellido AS entra_apellido, ju.nombre AS entra_nombre, p.id_clubes,
j.numero AS sale_numero, ju.numero AS entra_numero 
FROM futbol_cambios c
	LEFT JOIN futbol_jugadores j ON (j.id = c.id_sale_jugador)
	LEFT JOIN futbol_jugadores ju ON (ju.id = c.id_entra_jugador)
	LEFT JOIN futbol_planteles p ON (p.id_jugador = j.id)
WHERE id_partido = $id_partido
	AND ( p.id_clubes = $row[id_primer_club]
	OR p.id_clubes = $row[id_segundo_club] )
ORDER BY c.minuto");
if(mysql_num_rows($resultado)!=0){
?> 
<TABLE width="100%" border="0" cellpadding="0" cellspacing="0">
  <TR bgcolor="#D7E3DB"> 
	<TD colspan="3" class="BackEspecialesFst"><STRONG>Cambios</STRONG></TD>
  </TR>
  <TR>  
	<TD width="40%" class="Gray1"><strong>Sale</strong></TD>
	<TD width="40%" class="Gray1"><strong>Entra</strong></TD>
	<TD width="20%" align="center" class="Gray1">Minuto</TD>
  </TR>
<? while($fila = mysql_fetch_array($resultado)){ 
$m = $fila["id_clubes"] ?>
 <TR>
   	<TD class="<? echo $estilo_club[$m] ?>"><? echo $fila["sale_apellido"] . ",&nbsp;" . $fila["sale_nombre"] ?>&nbsp;</TD>
	<TD class="<? echo $estilo_club[$m] ?>"><? echo $fila["entra_apellido"] . ",&nbsp;" . $fila["entra_nombre"] ?>&nbsp;</TD>
	<TD class="<? echo $estilo_club[$m] ?>"><? echo $fila["minuto"] ?>&nbsp;</TD>
  </TR>
  <? } ?>
</TABLE>
<?
}
$sql = "SELECT g.id, g.minuto, j.apellido, j.nombre, 
j.numero, t.tipo, p.id_clubes
FROM futbol_goleadores g
	LEFT JOIN futbol_jugadores j ON (j.id = g.id_jugador)
	LEFT JOIN futbol_planteles p ON (p.id_jugador = j.id)
	LEFT JOIN futbol_tipo_goles t ON (t.id = g.id_tipo_goles)
WHERE id_partido = $id_partido 
	AND ( p.id_clubes = $row[id_primer_club]
	OR p.id_clubes = $row[id_segundo_club] )
ORDER BY g.minuto";
//echo "<pre>".$sql."</pre>";
$resultado = mysql_query($sql);
if(mysql_num_rows($resultado)!=0){ 
?>
<TABLE width="100%" border="0" cellpadding="0" cellspacing="0">
  <TR bgcolor="#D7E3DB"> 
	<TD colspan="3" class="BackEspecialesFst"><STRONG>Goleadores</STRONG></TD>
  </TR>
  <TR> 
	<TD width="40%" class="Gray1"><strong>Jugador </strong></TD>
	<TD width="40%" class="Gray1"><strong>Tipo</strong></TD>
	<TD width="20%" align="center" class="Gray1">Minuto</TD>
  </TR>
<?	while($fila = mysql_fetch_array($resultado)){ 
$m = $fila["id_clubes"] ?>
  <TR> 
	<TD class="<? echo $estilo_club[$m] ?>"><? echo  $fila["apellido"] . ",&nbsp;". $fila["nombre"] ?>&nbsp;</TD>
	<TD class="<? echo $estilo_club[$m] ?>"><? echo $fila["tipo"] ?>&nbsp;</TD>
	<TD class="<? echo $estilo_club[$m] ?>" align="center"><? echo $fila["minuto"] ?>&nbsp;</TD>
  </TR>
  <TR> 
	<? } ?>
</TABLE>
<? 
}
$resultado = mysql_query("SELECT t.id, t.minuto, j.apellido, j.nombre, 
j.numero, t.tarjeta, p.id_clubes
FROM futbol_tarjetas t
	LEFT JOIN futbol_jugadores j ON (j.id = t.id_jugador)
	LEFT JOIN futbol_planteles p ON (p.id_jugador = j.id)
WHERE id_partido = $id_partido 
	AND ( p.id_clubes = $row[id_primer_club]
	OR p.id_clubes = $row[id_segundo_club] )
ORDER BY t.minuto");
if(mysql_num_rows($resultado)!=0){ 
?>
<TABLE width="100%" border="0" cellpadding="0" cellspacing="0">
	<TR bgcolor="#D7E3DB"> 
		<TD colspan="2" class="BackEspecialesFst"><STRONG>Tarjetas</STRONG></TD>
	</TR>
	<TR> 
		<TD width="40%" class="EspecialesGray"><strong>Jugador</strong></TD>
		<TD width="40%" class="EspecialesGray"><strong>Tarjeta</strong></TD>
	</TR>
	<?	while($fila = mysql_fetch_array($resultado)){ 
$m = $fila["id_clubes"] ?>
	<TR> 
		<TD class="<? echo $estilo_club[$m] ?>"><? echo $fila["apellido"] . ",&nbsp;" . $fila["nombre"] ?>&nbsp;</TD>
		<TD class="<? echo $estilo_club[$m] ?>"> 
			<? if($fila["tarjeta"]==1){ echo "Roja";}else{ echo "Amarilla";} ?>
		</TD>
	</TR>
	<? } ?>
</TABLE>
<?
	}
}
?>



<?
if(mysql_num_rows($resultado)!=0){ 
?>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
	<TR> 
		<TD class="BackEspecialesFst"><STRONG>Cronica</STRONG></TD>
	</TR>
	<TR>
		<TD>
			<TABLE width="100%" border="0" cellspacing="4" cellpadding="4">
				<TR>
					<TD><? echo nl2br($row["cronica"]) ?></TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
</TABLE>
<?
	}
?>