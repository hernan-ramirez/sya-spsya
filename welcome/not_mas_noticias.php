<?
$sql = "SELECT n.*, f.archivo_imagen, p.pais, d.deporte FROM noticias n
	LEFT JOIN fotos f ON (n.id_foto = f.id)
	LEFT JOIN paises p ON (n.id_pais = p.id)
	LEFT JOIN deportes d ON (n.id_deporte = d.id)
	LEFT JOIN publicaciones pu ON (pu.id_publicado = n.id)
	WHERE pu.id_seccion = 4
	AND pu.id_lista_tablas = 40 
	AND pu.id_estructura = $id_estruc
	ORDER by posicion";
	
$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result)){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
	    <td class="small">
			<? echo $row["pais"] ?>
			 | <b>
			<? echo $row["deporte"] ?>
</b>: &nbsp;&nbsp; <a href="javascript:abrirVentana('/welcome/popup.php?id_not=<? echo $row["id"] ?>','<? echo $row["id"] ?>',520,350);""><? echo $row["titulo"] ?></a></TD> 
	</tr>
    <tr> 
	    <td class="Dashed"><img src="<? echo $path ?>img/spacer.gif"></td>
	</tr>
</table>
<?
		} 
	}
?>