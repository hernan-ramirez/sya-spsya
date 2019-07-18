<!-- Inicio Opinion -->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
   <?
$sql = "SELECT o. * , c.archivo_columnista, c.nombre
FROM publicaciones pu
LEFT  JOIN opiniones o ON ( o.id = pu.id_publicado ) 
LEFT  JOIN columnistas c ON ( o.id_columnista = c.id ) 
WHERE id_lista_tablas =41
AND pu.id_estructura = $id_estruc
ORDER  BY pu.posicion";



$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result)){
?>
  <tr>
    <td height="52"><img src="<? echo $path ?>clipart/columnista_ch/<? echo $row["archivo_columnista"] ?>.gif" width="140" height="75"></td>
  </tr>
          <tr>
          <td class="titulocolumna"><? echo $row["titulo"] ?></td>
        </tr>
  <tr> 
    <td class="BodyColumna"><a href="javascript:abrirVentana('<? echo $path?>opinion/columna.php?id_col=<? echo $row["id"] ?>','<? echo $row["id"] ?>',503,350);">
      <? 
		if( strlen($row["copete"]) > 55 ){
			echo substr($row["copete"],0,55). "...";
		}else{
			echo $row["copete"];
		}
		?></a>
    </td>
  </tr>
  <tr> 
   <td align="right" bgcolor="E5E5E5"><img src="<? echo $path?>img/corner_r_b.gif" width="5" height="5"></td>
  </tr>
  <?
}
	} 
?>
</table>
<!-- Fin Opinion -->

