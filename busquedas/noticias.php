<?
$path = "../";
?>
<?
$sql = "SELECT n.*, f.archivo_imagen, p.pais, d.deporte FROM noticias n
	LEFT JOIN fotos f ON (n.id_foto = f.id)
	LEFT JOIN paises p ON (n.id_pais = p.id)
	LEFT JOIN deportes d ON (n.id_deporte = d.id)
	WHERE 
	( 
	n.titulo LIKE '%$palabra_buscada%' 
	OR n.copete LIKE '%$palabra_buscada%' 
	OR n.cuerpo LIKE '%$palabra_buscada%' 
	)
	ORDER by n.fecha_creacion DESC";
	#echo "<pre>".$sql."</pre>";
$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result)){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
	    <td class="small">
			<? echo $row["pais"] ?> | <b><? echo $row["deporte"] ?></b></TD>
	</tr>
    <tr> 
	    <td><a href="javascript:abrirVentana('<? echo $path ?>welcome/popup.php?id_not=<? echo $row["id"] ?>','<? echo $row["id"] ?>',520,350);"><? echo $row["titulo"] ?></a></TD>
	</tr>
    <tr> 
	    <td>
			<? echo $row["resumen"] ?>
		</td>
	</tr>
    <tr> 
	    <td class="Dashed"><img src="<? echo $path ?>img/spacer.gif"></td>
	</tr>
</table>
<?
	} 
}	
	else 
	{
	echo "<b>no se encontraron noticias</b>";
	}
?>