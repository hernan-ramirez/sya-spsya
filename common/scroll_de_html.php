<? require_once $path . "conexion.php" ?>
<MARQUEE>
<?
$result = mysql_query("
SELECT DISTINCT(n.titulo), n.copete, p.alias, n.id
FROM publicaciones pu
	LEFT JOIN noticias n ON (pu.id_publicado = n.id)
	LEFT JOIN paises p ON (n.id_pais = p.id)
WHERE pu.id_lista_tablas = 40
ORDER BY id DESC
LIMIT 30
");
if (mysql_num_rows($result)!=0){
	$x=0;
	while($row = mysql_fetch_array($result)){
		?><A href="../../welcome/popup.php?id_not=<? echo $row["id"] ?>" target="_blank"><? 
		
		if($row["alias"]!=""){ echo "(".$row["alias"].") "; }		
		echo $row["titulo"] ?>: <? echo $row["copete"] ;
		
		?></A>&nbsp;&nbsp;&nbsp;<?
		$x++;
	}
}
?>
</MARQUEE>