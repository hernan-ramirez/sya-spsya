<?
function puntaje($posicion){
	if($posicion==1){$puntos=10;}
	if($posicion==2){$puntos=6;}
	if($posicion==3){$puntos=4;}
	if($posicion==4){$puntos=3;}
	if($posicion==5){$puntos=2;}
	if($posicion==6){$puntos=1;}
	if($posicion>6){$puntos=0;}
	return $puntos;
}
$cal=mysql_query("SELECT * FROM f1_carreras");
if($cal!=0){
while($carrera=mysql_fetch_object($cal)){
//----------------------------------------------------------
	$result=mysql_query("SELECT * FROM f1_clasificacion WHERE dia='f' and id_carrera=$carrera->id ORDER BY posicion LIMIT 6");
	if($result!=0){
		while($row=mysql_fetch_object($result)){
			$puntos= puntaje($row->posicion);			
			$puntos_piloto[$row->id_piloto]=$puntos_piloto[$row->id_piloto] + $puntos;
			$mar=mysql_query("SELECT * FROM f1_equipos WHERE id_primer_piloto=$row->id_piloto OR id_segundo_piloto=$row->id_piloto");
			$marca=mysql_fetch_array($mar);
			$id_constructor=$marca[id];
			$puntos_marca[$id_constructor]=$puntos_marca[$id_constructor] + $puntos;
			if($row->posicion==1){
				$podio_finales[$row->piloto]=$podio_finales[$row->piloto]+1;
			}
  		}
	}
//-------------------------------------------------------------
}
}
			
?> 
<table width="468" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td class="BackSolapasEspecialesF1"> <table border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td><image src="image/solapa_especial_1_off.gif" width="17" height="23"></td>
          <td class="BackSolapasEspecialesOff"><a href="?inc=resultados">Resultados</a></td>
          <td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>
          <td><image src="image/solapa_especial_1_off.gif" width="15" height="23"></td>
          <td class="BackSolapasEspecialesOff"><a href="?inc=escuderias">Escuderias</a></td>
          <td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>
          <td><image src="image/solapa_especial_1_off.gif" width="15" height="23"></td>
          <td class="BackSolapasEspecialesOff"><a href="?inc=fechas">Calendario</a></td>
          <td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>
          <td><image src="image/solapa_especial_1_on.gif" width="15" height="23"></td>
          <td class="BackSolapasEspecialesOn"><a href="?inc=campeonatos">Posiciones</a></td>
          <td><image src="image/solapa_especial_2_on.gif" width="5" height="23"></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#CCCCCC">
  <tr align="center"> 
    <td class="terraLeft">Constructores</td> 
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <?
if(isset($puntos_marca)){
	arsort($puntos_marca);
	$x=1;
	do{
		$idpi= key($puntos_marca);
			$eq=mysql_query("SELECT * FROM f1_equipos WHERE id=$idpi");
			if($eq!=0){
			$equipo=mysql_fetch_array($eq);
			if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} 			
?>
  <tr> 
    <td align="center" width="5%" bgcolor="#FFFFFF" height="15" class="LitleGray"> <b> <? echo $x ?> 
      </b></td>
    <td height="15" class="terra<? echo $estilo ?>"><? echo $equipo[nombre] ?> 
    </td>
    <td align="center" width="20%" height="15" class="Gray<? echo $estilo ?>"> <? echo current($puntos_marca) ?> 
    </td>
  </tr>
  <?
			  }
		$x++;
	}while(next($puntos_marca));
}
?>
</table>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#CCCCCC">
  <tr align="center"> 
    <td class="TerraLeft">Pilotos</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <?
if(isset($puntos_piloto)){
	arsort($puntos_piloto);
	$x=1;
	do{
		$idpi= key($puntos_piloto);
			$insc=mysql_query("SELECT * FROM f1_pilotos WHERE id=$idpi");
			$inscripto=mysql_fetch_array($insc);
			$mar=mysql_query("SELECT * FROM f1_equipos WHERE id_primer_piloto=$idpi OR id_segundo_piloto=$idpi");
			$marca=mysql_fetch_array($mar);
			if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} 			
?>
  <tr> 
    <td align="center" width="5%" bgcolor="#FFFFFF" height="15" class="LitleGray"> <b> <? echo $x ?> 
      </b></td>
    <td height="15" class="terra<? echo $estilo ?>"> <? echo $inscripto[nombre] ?> <? echo $inscripto[apellido] ?> 
      ( <? echo $marca[nombre] ?> ) </td>
    <td align="center" width="20%" height="15" class="Gray<? echo $estilo ?>"> <? echo current($puntos_piloto) ?> 
    </td>
  </tr>
  <?
		$x++;
	}while(next($puntos_piloto));
}
?>
</table>

