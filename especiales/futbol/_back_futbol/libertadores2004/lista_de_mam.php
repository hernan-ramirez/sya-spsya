<? 
require_once "../../common/conexion.php"; ## sacar este include ##

$sql_mam = "SELECT * FROM futbol_partidos WHERE ck_mam = 1 AND fecha_partido >= now()";
$result_mam = mysql_query($sql_mam);
if(mysql_num_rows($result_mam)!=0){
?>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
	<TD>Minuto A Minuto</TD>
  </TR>
  <? while($row_mam=mysql_fetch_array($result_mam)){ ?>
  <TR>
	<TD><A href="javascript:abrirVentana('ficha_partido.php?id_partido=<? echo $row_mam["id"] ?>','<? echo $row_mam["id"] ?>',503,350);"><? echo $row_mam["fecha_partido"] ?> <? echo $row_mam["hora_partido"] ?></A></TD>
  </TR>
  <? } ?>
</TABLE>
<? } ?>