<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
	<TD class="BackEspecialesFst">
	<?
		$sql="SELECT numero_fecha FROM futbol_partidos
		WHERE id_torneo = $id_torneo
		GROUP BY numero_fecha 
		ORDER BY numero_fecha";
	?>
<TABLE border="0" cellpadding="0" cellspacing="3">
<TR> 
		  <TD nowrap><FONT color="#009900">fecha <? echo $num_fecha ?></FONT></TD>
	<TD nowrap>| Ir a fecha</TD>
	<FORM name="fechas">
	<TD><SELECT name="fechas" onChange="MM_jumpMenu('parent',this,1)">
	<?
		$result = mysql_query ($sql);
		if(mysql_num_rows($result)!=0){
		while ($row = mysql_fetch_array($result)){
	?>
  <OPTION value="index.php?inc=fixture&num_fecha=<? echo $row["numero_fecha"] ?>" <? if ($row["numero_fecha"] == $num_fecha){ echo "selected"; } ?> ><? echo $row["numero_fecha"] ?></OPTION>
  		<?
			}
		}
		?>
	</SELECT>
	</TD>
</FORM>
</TR>
</TABLE>

</TD>
  </TR>
</TABLE>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<TD class="TerraLeft">Estado</td>
		<TD class="GreenLeft">Local</TD>
		<TD align="center" class="GreenLeft">&nbsp;</td>
		<TD align="right" class="GreenLeft">Visitante</td>
		<TD align="center" class="TerraLeft">Fecha</TD>
	</tr>
	<?
		$sql = "SELECT c.alias as equipo1, cc.alias as equipo2, fpe.estado_partido, p.*, DATE_FORMAT(p.fecha_partido,'%e/%c/%y') AS fecha
		FROM futbol_partidos p
		LEFT JOIN futbol_clubes c ON (p.id_primer_club = c.id)
		LEFT JOIN futbol_clubes cc ON (p.id_segundo_club = cc.id)
		LEFT JOIN futbol_partidos_estados fpe ON (p.id_partidos_estados = fpe.id)
		WHERE numero_fecha = $num_fecha
		AND p.id_torneo = $id_torneo
		ORDER by grupo, fecha_partido";
		#echo "<pre>".$sql."</pre>";
		$result = mysql_query ($sql);
		if(mysql_num_rows($result)!=0){
			while ($row = mysql_fetch_array($result)){
			
			if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} 
			if ($row["estado_partido"] == "Postergado" || $row["estado_partido"] == "Suspendido"){ $estilo = "PS"; }
			 
		?>
	<TR>
		<TD nowrap class="Terra<? echo $estilo ?>"><? if($row["estado_partido"]!=""){ echo $row["estado_partido"]; }else{ echo "Pendiente";}?></TD>
		<TD width="50%" class="Green<? echo $estilo ?>"><? echo $row["equipo1"] ?>&nbsp;</TD>
		<TD align="center" nowrap class="Green3"><A href="javascript:abrirVentana('ficha_partido.php?id_partido=<? echo $row["id"] ?>','<? echo $row["id"] ?>',503,350);">
		<? if($row["estado_partido"]!="" && $row["estado_partido"]!="Postergado"){ ?>
		<? echo $row["goles_primer_club"] ?>&nbsp;-&nbsp;<? echo $row["goles_segundo_club"] ?></A>
		<? }else{ ?>
		ficha
		<? } ?>
		&nbsp;</TD>
		<TD width="50%" align="right" class="Green<? echo $estilo ?>"><? echo $row["equipo2"] ?>&nbsp;</TD>
		<TD align="center" nowrap class="Terra<? echo $estilo ?>"><? echo $row["fecha"] ?>&nbsp;</TD>
	</tr>
	<?
	} 
		}
	?>
</TABLE>
