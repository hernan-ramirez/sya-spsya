<?
$sql = "SELECT * FROM banners b
LEFT JOIN publicaciones pu ON (pu.id_publicado = b.id)
WHERE pu.id_seccion = 8
AND pu.id_lista_tablas = 53
AND pu.id_estructura = $id_estruc";
$result = mysql_query ($sql,$conexion);
if(mysql_num_rows($result)!=0){
	$row = mysql_fetch_array($result);
?> <a href="<? echo $row["link"] ?>" ><img src="../noticias/<? echo $path ?>clipart/banners/<? echo $row["archivo_banners"] ?>" width="468" height="60" border="0"></a> 
<?
} 
?>

