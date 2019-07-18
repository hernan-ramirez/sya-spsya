<? echo '<?xml version="1.0" encoding="ISO-8859-1"?>' . "\n" ?>
<NOTICIAS>
<? 
require_once "../common/conexion.php";
$sql = "
SELECT DISTINCT(n.id),
n.titulo, 
n.copete, 
n.cuerpo, 
n.epigrafe,
n.fecha_creacion, 
	f.archivo_imagen,
	p.alias AS alias_pais, 
	d.deporte, 
	d.id AS id_dep
FROM publicaciones pu 
	LEFT JOIN noticias n ON (pu.id_publicado = n.id)
	LEFT JOIN fotos f ON (n.id_foto = f.id)
	LEFT JOIN paises p ON (n.id_pais = p.id)
	LEFT JOIN deportes d ON (n.id_deporte = d.id)
WHERE 
pu.id_lista_tablas = 40 

ORDER BY n.fecha_creacion DESC 
LIMIT 10
";
$result = mysql_query($sql);
if(mysql_num_rows($result)!=0){
while($row = mysql_fetch_array($result)){
	
	$ts = str_replace(":", "", $row["fecha_creacion"]);
	$ts = str_replace("-", "", $ts);
	$ts = str_replace(" ", "", $ts);
	$ts = substr($ts, 0, 12);
?>
<NOTICIA id="<? echo $row["id"] ?>" timestamp="<? echo $ts ?>">
  <CATEGORIA id="<? echo $row["id_dep"] ?>"><? echo $row["deporte"] ?></CATEGORIA> 
  <FUENTE id="2">SportsYa</FUENTE> 
  <TITULO><? echo "(" . strtoupper($row["alias_pais"]) . ".-" . $row["deporte"] . ") " . stripslashes($row["titulo"]) ?></TITULO> 
  <COPETE><? echo stripslashes($row["copete"]) ?></COPETE> 
  <TEXTO><? echo stripslashes($row["cuerpo"]) ?></TEXTO> 
  <? if( $row["archivo_imagen"] != "" && $row["epigrafe"] != ""){ ?>
  <IMAGEN url="http://www.mediadev.com.ar/clipart/dimensionar.php?imagen=imagen/<? echo $row["archivo_imagen"] ?>">
  <? echo $row["epigrafe"] ?></IMAGEN><? } ?>
</NOTICIA>
<? } } ?>
</NOTICIAS>