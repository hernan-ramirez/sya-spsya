<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR> 
	<TD class="BackSolapasEspecialesEli"><TABLE border="0" cellspacing="0" cellpadding="0">
		<TR align="center"> 
		  <? if($inc=="fixture"){$stilo = "on";}else{$stilo = "off";} ?>
		  <td><img src="<? echo $path ?>img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=fixture">Fixture</A></TD>
		  <TD><img src="<? echo $path ?>img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		  <? if($inc=="posiciones"){$stilo = "on";}else{$stilo = "off";} ?>
		  <TD><img src="../../img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=posiciones">Posiciones</A></TD>
<!-- 		  <TD><img src="../../img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		  <? if($inc=="descenso"){$stilo = "on";}else{$stilo = "off";} ?>
		  <TD><img src="../../img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=descenso">Descenso</A></TD> -->
		  <TD><img src="../../img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		  <? if($inc=="goleadores"){$stilo = "on";}else{$stilo = "off";} ?>
		  <TD><img src="../../img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=goleadores">Goleadores</A></TD>
		  <TD><img src="../../img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		  <? if($inc=="goleadores"){$stilo = "on";}else{$stilo = "off";} ?>
		  
		  <? if($inc=="tarjetas"){$stilo = "on";}else{$stilo = "off";} ?>
		  <TD><img src="../../img/solapa_especial_1_<? echo $stilo ?>.gif" ></TD>
		  <TD class="BackSolapasEspeciales<? echo $stilo ?>"><A href="?inc=tarjetas">Tarjetas</A></TD>
		  <TD><img src="../../img/solapa_especial_2_<? echo $stilo ?>.gif"></TD>
		</TR>
	  </TABLE>
	  </TD>
  </TR>
</TABLE>