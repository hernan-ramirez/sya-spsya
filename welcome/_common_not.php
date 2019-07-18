<?
################### Funciones de Cadenas ###################
function cortaCadena($cadena, $longitudCorte){
	if( strlen($cadena) > $longitudCorte ){
		$palabras = explode(" ", substr($cadena,0,$longitudCorte));
		for($i=0; $i<count($palabras)-1; $i++){
			$cuerpo .= $palabras[$i] . " ";
		}
		return $cuerpo . "...";
	}else{
		return $cadena;
	} 
}
# ejemplo: echo cortaCadena($row["cuerpo"], 160);
#################
$caracteresXminuto = 1200;
function timepoLectura($cadena){
	global $caracteresXminuto;
	$tiempo_segundos = round( 60 * strlen($cadena) / $caracteresXminuto );
	$minutos = floor($tiempo_segundos/60);  
	$resto_segundos = $tiempo_segundos - ($minutos * 60);
	$tiempo = $minutos . "'" . substr("0".$resto_segundos,strlen($resto_segundos)-1,2) . "''"; 
	return $tiempo; 
}
# ejemplo:  echo timepoLectura($row["cuerpo"]); 
#########################################################
?>