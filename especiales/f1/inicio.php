<?
	$fecha_creacion = date ("Y-m-d");
	$hora= date ("H:i:s"); 
mysql_query("INSERT INTO arg_f12001_visitas (fecha_creacion, ip_usuario, hora) ". "VALUES ('$fecha_creacion', '$REMOTE_ADDR', '$hora')");
if(!isset($inc)){
	$inc="resultados";
}
?> 
<table width="468" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? include "internas/".$inc.".inc.php"; ?></td>
  </tr>
</table>

