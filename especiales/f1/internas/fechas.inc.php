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
          <td><image src="image/solapa_especial_1_on.gif" width="15" height="23"></td>
          <td class="BackSolapasEspecialesOn">Calendario</td>
          <td><image src="image/solapa_especial_2_on.gif" width="5" height="23"></td>
          <td><image src="image/solapa_especial_1_off.gif" width="15" height="23"></td>
          <td class="BackSolapasEspecialesOff"><a href="?inc=campeonatos">Posiciones</a></td>
          <td><image src="image/solapa_especial_2_off.gif" width="5" height="23"></td>
        </tr>
      </table></td>
  </tr>
</table>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR align="center"> 
    <TD class="terraLeft">Fecha</FONT></TD>
    <TD class="terraLeft">Gran Premio</FONT></TD>
    <TD class="terraLeft">Circuito</FONT></TD>
    <TD class="terraLeft">Vueltas</FONT></TD>
    <TD class="terraLeft">Distancia</FONT></TD>
  </TR>
  <?
	$car=mysql_query("SELECT * FROM f1_carreras ORDER BY id");
	if($car!=0){
	while($carrera=mysql_fetch_object($car)){
			$fecha=$carrera->fecha_carrera;
			$resultado=strtok($fecha, "-");	
			$xx=1;
			while ($resultado){
				$fechin[$xx]=$resultado;
				$resultado=strtok("-");
			$xx++;
			}
			if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} 
			?>
  <TR align="center"> 
    <TD class="LitleGray"><? echo $fechin[3]."-". $fechin[2] ?></TD>
    <TD class="terra<? echo $estilo ?>"><? echo $carrera->premio ?></TD>
    <TD class="terra<? echo $estilo ?>"><? echo $carrera->circuito ?></TD>
    <TD class="Gray<? echo $estilo ?>"><? echo $carrera->vueltas ?></TD>
    <TD class="terra<? echo $estilo ?>"><? echo $carrera->distancia  ?> km</TD>
  </TR><?
	}
}
?>
</TABLE>

