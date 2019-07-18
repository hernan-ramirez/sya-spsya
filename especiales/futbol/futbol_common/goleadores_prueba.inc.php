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
/*"
;
mysql_query($sql);
$sql = "
*/
$sql = "
/****************** DE JUGADA ****************/
DROP TABLE IF EXISTS gole_tipo_jug;
CREATE TEMPORARY TABLE IF NOT EXISTS gole_tipo_jug ( id int(11), goles int(10) ) TYPE=HEAP;
INSERT INTO gole_tipo_jug 
		SELECT id_jugador, COUNT(*)
		FROM futbol_goleadores 
		WHERE id_tipo_goles = 1
		GROUP BY id_jugador
;

/****************** DE CABEZA ****************/
DROP TABLE IF EXISTS gole_tipo_cab;
CREATE TEMPORARY TABLE IF NOT EXISTS gole_tipo_cab ( id int(11), goles int(10) ) TYPE=HEAP;
INSERT INTO gole_tipo_cab 
		SELECT id_jugador, COUNT(*)
		FROM futbol_goleadores 
		WHERE id_tipo_goles = 2
		GROUP BY id_jugador
;

/****************** DE TIRO LIBRE ****************/
DROP TABLE IF EXISTS gole_tipo_lib;
CREATE TEMPORARY TABLE IF NOT EXISTS gole_tipo_lib ( id int(11), goles int(10) ) TYPE=HEAP;
INSERT INTO gole_tipo_lib 
		SELECT id_jugador, COUNT(*)
		FROM futbol_goleadores 
		WHERE id_tipo_goles = 3
		GROUP BY id_jugador
;

/****************** DE PENAL ****************/
DROP TABLE IF EXISTS gole_tipo_pen;
CREATE TEMPORARY TABLE IF NOT EXISTS gole_tipo_pen ( id int(11), goles int(10) ) TYPE=HEAP;
INSERT INTO gole_tipo_pen 
		SELECT id_jugador, COUNT(*)
		FROM futbol_goleadores 
		WHERE id_tipo_goles = 4
		GROUP BY id_jugador
;

/****************** CONSULTA ****************/
SELECT 
g.id_jugador, 
j.nombre, 
j.apellido,
 
tj.goles AS de_jugada,
tc.goles AS de_cabeza,
tl.goles AS de_tiro_libre,
tp.goles AS de_penal,
COUNT(*) AS goles_totales

FROM futbol_goleadores g
	LEFT JOIN futbol_jugadores j ON ( j.id = g.id_jugador )
	LEFT JOIN futbol_partidos fp ON ( fp.id = g.id_partido )
	
	LEFT JOIN gole_tipo_jug tj ON (tj.id = g.id_jugador)
	LEFT JOIN gole_tipo_cab tc ON (tc.id = g.id_jugador)
	LEFT JOIN gole_tipo_lib tl ON (tl.id = g.id_jugador)
	LEFT JOIN gole_tipo_pen tp ON (tp.id = g.id_jugador)

WHERE 
fp.id_torneo = 2 AND  /*** colocar $id_torneo ***/
id_tipo_goles < 5 AND
id_jugador <> 0 AND 
nombre is not NULL AND 
apellido is not NULL

GROUP BY g.id_jugador
ORDER by goles_totales DESC, apellido;
";
echo "<pre style='display:none'>" . $sql . "</pre>";
if($result = mysql_query ($sql));
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result)){
		if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} 
?>
	<tr id="<? echo $row[0] ?>"> 
		<td class="Green<? echo $estilo ?>"><? 
echo $row["apellido"];
if(strlen($row["nombre"])>>1){
	echo ", " . $row["nombre"];
} 
?></td>
<td align="center" class="Terra<? echo $estilo ?>"><? echo $row["goles"] ?></td>
</tr><?
} 
	}
?>
</table>