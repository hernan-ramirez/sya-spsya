<? $path = "../"; 
if(!isset($id_torneo)){$id_torneo = 1;}
?>
<? require_once $path . "common/conexion.php"; ?>
<LINK href="../apertura2003/estilos.css" rel="stylesheet" type="text/css">
 <? function cuadro_partido($numero) { 
 global $id_torneo;
 $sql = "
 SELECT p.goles_primer_club, p.goles_segundo_club, p.penales_primer_club, p.penales_segundo_club, c.alias AS L , cc.alias AS V
 FROM futbol_partidos p 
 LEFT JOIN futbol_clubes c ON(c.id = p.id_primer_club)
 LEFT JOIN futbol_clubes cc ON(cc.id = p.id_segundo_club)
 WHERE p.id_torneo = $id_torneo
 AND p.orden_llave = $numero
 ";
 #echo $sql;
 $result = mysql_query($sql);
 if(mysql_num_rows($result)!=0){
 	$i = 0;
 	while($row=mysql_fetch_array($result)){
		$i++;
		$partido[$i]["c"] = $row["L"];
		$partido[$i]["cc"] = $row["V"];
		$partido[$i]["g"] = $row["goles_primer_club"];
		$partido[$i]["gg"] = $row["goles_segundo_club"];
		$partido[$i]["p"] = $row["penales_primer_club"];
		$partido[$i]["pp"] = $row["penales_segundo_club"];
	}
 }
 ?>     
<TABLE width="233" border="0" cellspacing="0" cellpadding="0">
  <TR> 
	<TD width="143" class="EspecialesTitleY">Equipos</TD>
	<? if($partido[1]["g"] !=""){ ?><TD width="30" align="center" class="EspecialesTitleGray">Ida&nbsp;</TD><? } ?>
	<? if($partido[2]["g"] !=""){ ?><TD width="30" align="center" class="EspecialesTitleGray">Vta&nbsp;</TD><? } ?>
	<? if($partido[2]["p"] !=""){ ?><TD width="30" class="EspecialesTitleGray">Penal</TD><? } ?>
  </TR>
  <TR> 
	<TD class="EspecialesYellow"><? echo $partido[1]["c"] ?>&nbsp;</TD>
	<? if($partido[1]["g"] !=""){ ?>
	<TD align="center" class="EspecialesYellow"><? echo $partido[1]["g"] ?>&nbsp;</TD>
	<? } ?>
	<? if($partido[2]["g"] !=""){ ?><TD align="center" class="EspecialesYellow"><? echo $partido[2]["g"] ?>&nbsp;</TD><? } ?>
	<? if($partido[2]["p"] !=""){ ?><TD align="center" class="EspecialesYellow"><? echo $partido[2]["p"] ?>&nbsp;</TD><? } ?>
  </TR>
  <TR> 
	<TD class="EspecialesGreen"><? echo $partido[1]["cc"] ?>&nbsp;</TD>
	<? if($partido[1]["g"] !=""){ ?><TD align="center" class="EspecialesGreen"><? echo $partido[1]["gg"] ?>&nbsp;</TD><? } ?>
	<? if($partido[2]["gg"] !=""){ ?><TD align="center" class="EspecialesGreen"><? echo $partido[2]["gg"] ?>&nbsp;</TD><? } ?>
	<? if($partido[2]["pp"] !=""){ ?><TD align="center" class="EspecialesGreen"><? echo $partido[2]["pp"] ?>&nbsp;</TD><? } ?>
  </TR>
</TABLE>
<TABLE width="233" border="0" cellspacing="0" cellpadding="0">
  <TR> 
	<TD>&nbsp;</TD>
  </TR>
</TABLE>
<? } ?>
<TABLE width="510" border="0" cellpadding="7" cellspacing="8" bgcolor="E1E1E1">
  <TR>
	<TD>

<TABLE width="713" border="0" cellspacing="0" cellpadding="0">
		<TR> 
		  <TD>&nbsp;</TD>
		  <TD>&nbsp;</TD>
		  <TD width="332">&nbsp;</TD>
		  <TD width="332">&nbsp;</TD>
		  <TD width="332">&nbsp;</TD>
		</TR>
		<TR> 
		  
	<TD width="233" valign="top"> 
	  <? cuadro_partido(1) ?>
	  <? cuadro_partido(2) ?>
	  <? cuadro_partido(3) ?>
	  <? cuadro_partido(4) ?>
	</TD>
		  <TD width="230" valign="top"><IMG src="../apertura2003/img/spacer.gif" width="11" height="1"></TD>
		  <TD valign="top"><TABLE width="233" border="0" cellspacing="0" cellpadding="0">
			  <TR> 
				<TD><IMG src="../apertura2003/img/spacer.gif" width="1" height="60"></TD>
			  </TR>
			</TABLE>
			
	  <? cuadro_partido(5) ?>
	  <TABLE width="233" border="0" cellspacing="0" cellpadding="0">
			  <TR> 
				<TD><IMG src="../apertura2003/img/spacer.gif" width="1" height="74"></TD>
			  </TR>
			</TABLE>
			
	  <? cuadro_partido(6) ?>
	</TD>
		  <TD valign="top"><IMG src="../apertura2003/img/spacer.gif" width="11" height="1"></TD>
		  <TD valign="top"><TABLE width="233" border="0" cellspacing="0" cellpadding="0">
			  <TR> 
				<TD><IMG src="../apertura2003/img/spacer.gif" width="1" height="147"></TD>
			  </TR>
			</TABLE>
			
	  <? cuadro_partido(7) ?>
	</TD>
		</TR>
	  </TABLE> </td>
  </tr>
</table>
&nbsp;</TD>
  </TR>
</TABLE>
<? require_once $path . "fin.php" ?>
