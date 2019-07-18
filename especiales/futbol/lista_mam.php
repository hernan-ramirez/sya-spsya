<? require_once "../common/conexion.php";
$id_torneo = 2;
$result = mysql_query("
SELECT p.id, c.alias as equipo1, cc.alias as equipo2, fpe.estado_partido, p.fecha_partido
FROM futbol_partidos p
	LEFT JOIN futbol_clubes c ON (p.id_primer_club = c.id)
	LEFT JOIN futbol_clubes cc ON (p.id_segundo_club = cc.id)
	LEFT JOIN futbol_partidos_estados fpe ON (p.id_partidos_estados = fpe.id)
WHERE p.id_torneo = $id_torneo 
AND ck_mam = 1 
");
?>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
<?
$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result)){
?>  <TR style="cursor:hand" onClick="javascript:window.location='mam.php?id_partido=<? echo $row["equipo1"] ?>'">
	<TD><? echo $row["equipo1"] ?></TD>
	<TD><? echo $row["equipo2"] ?></TD>
	<TD><? echo $row["fecha_partido"] ?></TD>
  </TR>
<? } } ?>
</TABLE>
