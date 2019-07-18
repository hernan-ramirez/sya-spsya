<?
if(!isset($num_fecha)){ #A
$sql = "
SELECT numero_fecha
FROM futbol_partidos 
WHERE fecha_partido > DATE_SUB(now(), INTERVAL 2 DAY) 
AND numero_fecha<>0
ORDER BY fecha_partido ASC 
LIMIT 1
";
$res = mysql_query($sql);
	if(mysql_num_rows($res)!=0){ #B
		$r = mysql_fetch_array($res);
		$num_fecha = $r["numero_fecha"];
	}else{ #B
		$sql = "
		SELECT numero_fecha
		FROM futbol_partidos 
		WHERE fecha_partido < now() 
		AND numero_fecha<>0
		ORDER BY fecha_partido DESC 
		LIMIT 1
		";
		$res = mysql_query($sql);
		if(mysql_num_rows($res)!=0){
			$r = mysql_fetch_array($res);
			$num_fecha = $r["numero_fecha"];
		}else{
			$num_fecha = 1;
		}
	} #B
} #A
?>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR> 
	<TD><TABLE border="0" cellspacing="0" cellpadding="0">
		<TR align="center"> 
		  <? if($inc=="fixture"){$stilo = "on";}else{$stilo = "off";} ?>
		  <td><img src="<? echo $path ?>img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=fixture">Fixture</A></TD>
		  <TD><img src="<? echo $path ?>img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		  <? if($inc=="posiciones"){$stilo = "on";}else{$stilo = "off";} ?>
		  <TD><img src="<? echo $path ?>img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=posiciones">Posiciones</A></TD>
<!-- 		  <TD><img src="../../img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		  <? if($inc=="descenso"){$stilo = "on";}else{$stilo = "off";} ?>
		  <TD><img src="../../img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=descenso">Descenso</A></TD> -->
		  <TD><img src="<? echo $path ?>img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		  <? if($inc=="goleadores"){$stilo = "on";}else{$stilo = "off";} ?>
		  <TD><img src="<? echo $path ?>img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=goleadores">Goleadores</A></TD>
		  <TD><img src="<? echo $path ?>img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		  <? if($inc=="goleadores"){$stilo = "on";}else{$stilo = "off";} ?>
		  
		  <? if($inc=="tarjetas"){$stilo = "on";}else{$stilo = "off";} ?>
		  <TD><img src="<? echo $path ?>img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=tarjetas">Tarjetas</A></TD>
		  <TD><img src="<? echo $path ?>img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		</TR>
	  </TABLE>
	  </TD>
  </TR>
</TABLE>