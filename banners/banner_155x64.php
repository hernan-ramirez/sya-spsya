<?
$sql = "SELECT * FROM banners b
LEFT JOIN publicaciones pu ON (pu.id_publicado = b.id)
WHERE pu.id_seccion = 11
AND pu.id_lista_tablas = 53
AND pu.id_estructura = $id_estruc";

$result = mysql_query ($sql,$conexion);
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result)){
?>

<a href="<? echo $row["link"] ?>" target="_blank"><img src="../noticias/<? echo $path ?>clipart/banners/<? echo $row["archivo_banners"] ?>" width="155" border="0"></a> 

<?
	}
}
?>