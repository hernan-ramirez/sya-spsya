<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
	<TD class="BackEspecialesFst">
	<?
		$sql="SELECT numero_fecha FROM futbol_partidos
		WHERE id_torneo = $id_torneo
		GROUP BY numero_fecha 
		ORDER BY numero_fecha DESC";
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
<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr> 
		<TD class="GreenLeft">Nombre</td>
		<TD width="40" align="center" class="TerraLeft" nowrap><b> Goles &nbsp;</b></td>
	</tr>
	<?
$sql = "
		SELECT g.id_jugador, j.nombre, j.apellido, j.id, fc.alias, COUNT(g.id_jugador) as goles
		FROM futbol_goleadores g
			LEFT JOIN futbol_jugadores j ON (g.id_jugador = j.id)
			LEFT JOIN futbol_planteles pl ON (j.id = pl.id_jugador)
			LEFT JOIN futbol_clubes fc ON (pl.id_jugador = fc.id)			
			LEFT JOIN futbol_partidos fp ON (g.id_partido = fp.id)
		WHERE fp.id_torneo = $id_torneo	
		AND id_tipo_goles < 5
		GROUP BY g.id_jugador
		ORDER by goles DESC
		";

$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result)){
		if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} 
?>
	<tr> 
		<td class="Green<? echo $estilo ?>"><? echo $row["apellido"] ?>, <? echo $row["nombre"] ?> 
		</td>
		<td align="center" class="Terra<? echo $estilo ?>"><? echo $row["goles"] ?></td>
	</tr>
	<?
} 
	}
?>
</table>

