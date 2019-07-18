<?
	$sql = "SELECT n.*, f.archivo_imagen, p.pais, d.deporte FROM noticias n
	LEFT JOIN fotos f ON (n.id_foto = f.id)
	LEFT JOIN paises p ON (n.id_pais = p.id)
	LEFT JOIN deportes d ON (n.id_deporte = d.id)
	LEFT JOIN publicaciones pu ON (pu.id_publicado = n.id)
	WHERE pu.id_seccion = 5
	AND pu.id_lista_tablas = 40 
	AND pu.id_estructura = $id_estruc
	ORDER by posicion
";
	
	$result = mysql_query ($sql);
	
	if(mysql_num_rows($result)!=0){
		while ($row = mysql_fetch_array($result)){
?>
<table width="468" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="NoticiaPrincipal">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr> 
			<td height="18" class="notoml"><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
			<td class="NotOContent"><span class="Red">Urgente | <? echo $row["titulo"] ?>: <? echo $row["copete"] ?></span></td>
			<td class="notomr"><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
        </tr>
      </table>
	  </td>
  </tr>
</table>
<?
	} 
}	
?>

