<? 
if(!isset($fechaform)){
	$ff=mysql_query("SELECT * FROM f1_clasificacion ORDER BY id_carrera");
	$ffa=mysql_fetch_array($ff);
	$fechaform=$ffa[id_carrera];
}
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
?> 
<table width="468" border="0" cellspacing="0" cellpadding="0">
<FORM name="clasificacion" method="post" action="<? echo $php_self ?>">
  <tr> 
    <td class="BackSolapasEspecialesF1"> <table border="0" cellspacing="0" cellpadding="0">
        <tr> 
			<td><image src="image/solapa_especial_1_on.gif" width="17" height="23"></td>
			<td class="BackSolapasEspecialesOn">Resultados</td>
			<td><image src="image/solapa_especial_2_on.gif" width="5" height="23"></td>
			<td><image src="image/solapa_especial_1_off.gif" width="15" height="23"></td>
			<td class="BackSolapasEspecialesOff"><a href="?inc=escuderias">Escuderias</a></td>
			<td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>
			<td><image src="image/solapa_especial_1_off.gif" width="15" height="23"></td>
			<td class="BackSolapasEspecialesOff"><a href="?inc=fechas">Calendario</a></td>
			<td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>
			<td><image src="image/solapa_especial_1_off.gif" width="15" height="23"></td>
			<td class="BackSolapasEspecialesOff">Posiciones</td>
			<td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>		  
        </tr>
      </table>
	  
	<SELECT name="fechaform" onChange="javascript:document.clasificacion.submit()" style="font-family:Ms Sans Serif; font-size:10px; background:#EFEFEF; width:100%">
        <? $fe=mysql_query("SELECT * FROM f1_carreras ORDER BY fecha_carrera DESC");
	  	if($fe!=0){
			while($fec=mysql_fetch_object($fe)){
			$resultado=strtok($fec->fecha_carrera, "-");	
			$x=1;
			while ($resultado){
				$fecha[$x]=$resultado;
				$resultado=strtok("-");
			$x++;
			}
			?>
        <OPTION value="<? echo $fec->id ?>" <? if($fechaform==$fec->id){echo 'SELECTED';} ?>> 
        <? echo $fec->id.") ".$fec->circuito." ".$fecha[3]."-". $fecha[2]."-".$fecha[1] ?> 
        </OPTION>
        <?
			}
		}
		?>
      </SELECT>
</td>
  </tr>
</FORM>
</table>
<TABLE border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="30" align="center" class="TerraLeft">Pos</td>
    <td width="186" class="TerraLeft">Piloto</td>
    <td width="165" class="TerraLeft">Escuder&iacute;a</td>
    <td width="87" align="center" class="TerraLeft">Tiempo</td>
  </tr>
  <? $result=mysql_query("SELECT * FROM f1_clasificacion WHERE dia='f' and id_carrera=$fechaform ORDER BY posicion LIMIT 32");
				if($result!=0){
					$x=1;
					while($row=mysql_fetch_object($result)){
					$insc=mysql_query("SELECT * FROM f1_pilotos WHERE id=$row->id_piloto");
					$inscripto=mysql_fetch_array($insc);
					$mar=mysql_query("SELECT * FROM f1_equipos WHERE id_primer_piloto=$row->id_piloto OR id_segundo_piloto=$row->id_piloto");
					$marca=mysql_fetch_array($mar);
					if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} 
					?>
  <tr> 
    <td width="30" align="center" class="LitleGray"><B><? echo $x ?></B></td>
    <td width="186" class="Terra<? echo $estilo ?>"><a href="#"><? echo $inscripto[nombre]." ".$inscripto[apellido] ?></a>
      </td>
    <td width="165" class="Terra<? echo $estilo ?>">&nbsp;<? echo $marca[nombre] ?></td>
    <td width="87" align="center" class="Gray<? echo $estilo ?>"><? echo $row->tiempo ?></td>
  </tr>
  <?
			  		$x++;
			  		}
				}
				?>
</TABLE>

