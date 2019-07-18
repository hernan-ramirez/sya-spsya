<table width="468" border="0" cellspacing="0" cellpadding="0">
    <tr> 
     	<td class="BackSolapasEspecialesF1"> <table border="0" cellspacing="0" cellpadding="0">
    <tr> 
          <td><image src="image/solapa_especial_1_off.gif" width="17" height="23"></td>
          <td class="BackSolapasEspecialesOff"><a href="?inc=resultados">Resultados</a></td>
          <td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>
          <td><image src="image/solapa_especial_1_on.gif" width="15" height="23"></td>
          <td class="BackSolapasEspecialesOn">Escuderias</td>
          <td><image src="image/solapa_especial_2_on.gif" width="5" height="23"></td>
          <td><image src="image/solapa_especial_1_off.gif" width="15" height="23"></td>
          <td class="BackSolapasEspecialesOff"><a href="?inc=fechas">Calendario</a></td>
          <td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>
          <td><image src="image/solapa_especial_1_off.gif" width="15" height="23"></td>
          <td class="BackSolapasEspecialesOff"><a href="?inc=campeonatos">Posiciones</a></td>
          <td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>
        </tr>
      </table></td>
    </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr align="center"> 
    <td class="terraLeft">Equipo</td>
    <td class="terraLeft">N&ordm;</td>
    <td class="terraLeft">Pilotos</td>
    <td class="terraLeft">Modelo</td>
    <td class="terraLeft">Motor</font></td>
    <td class="terraLeft"><image src="image/rueda.gif" width="16" height="16"></td>
    <td class="terraLeft">Tester</td>
  </tr>
  <?
$x=1;
$equi=mysql_query("SELECT * FROM f1_equipos ORDER BY id");
if($equi!=0){
	while($equipo=mysql_fetch_object($equi)){
	if($x==13){$x=$x+1;}
	if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} 
?>
  <tr align="center"> 
    <td class="Gray<? echo $estilo ?>"> <? echo $equipo->nombre ?> </td>
    <td class="terra<? echo $estilo ?>"> <? echo $x ?><br> 
      <?
 $x++; 
echo $x; 
?>
    </td>
    <td class="terra<? echo $estilo ?>"> 
      <?
$pil=mysql_query("SELECT * FROM f1_pilotos WHERE id = '$equipo->id_primer_piloto' ");
$piloto=mysql_fetch_array($pil); echo $piloto[nombre]. " " .$piloto[apellido]; 
?>
      <br> 
      <?
$pil=mysql_query("SELECT * FROM f1_pilotos WHERE id = '$equipo->id_segundo_piloto' ");
$piloto=mysql_fetch_array($pil);
 echo $piloto[nombre]. " " .$piloto[apellido];
?>
    </td>
    <td class="terra<? echo $estilo ?>"> <? echo $equipo->chasis ?> </td>
    <td class="terra<? echo $estilo ?>"> <? echo $equipo->motor ?> </td>
    <td class="terra<? echo $estilo ?>"><image src="image/<? if($equipo->neumaticos=='Michelin'){echo 'm';}else{echo 'b';} ?>.gif" width="16" height="16"></td>
    <td class="terra<? echo $estilo ?>"> 
      <?
$pil=mysql_query("SELECT * FROM f1_pilotos WHERE id = '$equipo->id_tester_piloto' ");
$piloto=mysql_fetch_array($pil);
 echo $piloto[nombre]. " " .$piloto[apellido]; 
?>
    </td>
  </tr>
  <?		$x++;
	}
}
?>
</table>
<br>
<br>
Referencias: <image SRC="image/b.gif" WIDTH="16" HEIGHT="16"> Bridgestone - <image SRC="image/m.gif" WIDTH="16" HEIGHT="16"> 
  Michel&iacute;n

