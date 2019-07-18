<?
$sql = "SELECT e.*, f.archivo_imagen
		FROM publicaciones pu
		LEFT JOIN entrevistas e ON (e.id = pu.id_publicado)
		LEFT JOIN fotos f ON (e.id_foto = f.id)
		WHERE pu.id_seccion = 9
		AND pu.id_lista_tablas = 36	
		AND pu.id_estructura = $id_estruc";

	$result = mysql_query ($sql);
	if(mysql_num_rows($result)!=0){
		while ($row = mysql_fetch_array($result)){
?>
<table width="140" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="1"><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
  </tr>
  <tr> 
    <td><img src="<? echo $path ?>img/header_entrevista.gif" width="140" height="19"></td>
  </tr>
		<tr><td class="BodyEntrevista"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>  
          <td width="100%" valign="middle" class="FotoEntrevista"><? echo $row["entrevistado"] ?></td>
		<? ## Si archivo_imagen no esta vacio pone esto
		if(($row["archivo_imagen"])!=''){ ?>				
          <td width="52" valign="bottom" class="FotoEntrevista"><img src="<? echo $path ?>clipart/dimensionar.php?imagen=imagen/<? echo $row["archivo_imagen"] ?>&ancho=52&marca_de_agua=no" border="1"></td>
  		<? } # Sino no pone nada... ?>		  
		  <td width="3" bgcolor="E5E5E5"><img src="img/spacer.gif" width="1" height="3"></td>
              </tr>
      </table></td>
  </tr>
  <tr> 
    <td class="BodyEntrevista"><b><a href="javascript:abrirVentana('<? echo $path?>entrevistas/entrevista.php?id_ev=<? echo $row["id"] ?>','<? echo $row["id"] ?>',503,350);"> 
      <? echo $row["titulo"] ?> </a></b></td>
  </tr>
  <tr> 
   <td align="right" bgcolor="#FFFFFF"><img src="<? echo $path ?>img/corner_r_b.gif" width="5" height="5"></td>
  </tr>
  <?
}
	} 
?>
</table>