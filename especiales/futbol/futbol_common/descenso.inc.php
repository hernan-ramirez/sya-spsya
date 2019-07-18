<BR>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr> 
		<TD class="BackEspecialesFst"><B>Descenso</B></td>
	</tr>
</table>
<?
$sql = "
SELECT c.alias, d.*,
ac_1_2_pts + ac_2_3_pts + ac_3_4_pts AS pts,
ac_1_2_pj + ac_2_3_pj + ac_3_4_pj AS pj,
ROUND((ac_1_2_pts + ac_2_3_pts + ac_3_4_pts) / (ac_1_2_pj + ac_2_3_pj + ac_3_4_pj), 3) AS pro
FROM futbol_descenso d
LEFT JOIN futbol_clubes c ON(c.id = d.id_club)
WHERE id_torneos = $id_torneo
ORDER BY pro DESC
";
$result = mysql_query ($sql);
$nro_col = mysql_num_rows($result);
if($nro_col!=0){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr> 
    <TD class="GreenLeft">Equipo</td>
    <TD colspan="2" align="center" nowrap class="TerraLeft"><b> Ap/Cl 01-02</b></td>
    <TD colspan="2" align="center" nowrap class="TerraLeft"><b> Ap/Cl 02-03</b></td>
    <TD colspan="2" align="center" nowrap class="TerraLeft"><b> Ap/Cl 03-04</b></td>
    <TD colspan="2" align="center" nowrap class="TerraLeft" width="20%"><B>TOTALES</B></td>
    <TD align="center" nowrap class="TerraLeft"><b> </b></td>
  <tr> 
    <td class="Terra2">&nbsp;</td>
    <td align="center" class="Terra2">Pts</td>
    <td align="center" class="Terra2">PJ</td>
    <td align="center" class="Terra2">Pts</td>
    <td align="center" class="Terra2">PJ</td>
    <td align="center" class="Terra2">Pts</td>
    <td align="center" class="Terra2">PJ</td>
    <td align="center" class="Terra2">Pts</td>
    <td align="center" class="Terra2">PJ</td>
    <td align="center" class="Terra2"><b>Promedio</b></td>
  </tr>
<?
$c = 0;
while ($row = mysql_fetch_array($result)){
	$c++;
	if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} 
	if ($c > $nro_col-4){ $add = " style='color:#006699;font-weight:bold'";}
	if ($c > $nro_col-2){ $add = " style='color:#FF0000;font-weight:bold'";}
?>
  <tr> 
    <td class="Green<? echo $estilo ?>"<? echo $add ?>><? echo $row["alias"] ?></td>
    <td align="center" class="Green<? echo $estilo ?>"<? echo $add ?>> 
<B>      <? if($row[3] ==""){echo "-";}else{echo $row[3];} ?>
</B>    </td>
    <td align="center" class="Green<? echo $estilo ?>"<? echo $add ?>> 
      <? if($row[4] ==""){echo "-";}else{echo $row[4];} ?>
    </td>
    <td align="center" class="Green<? echo $estilo ?>"<? echo $add ?>> 
<B>      <? if($row[5] ==""){echo "-";}else{echo $row[5];} ?>
</B>    </td>
    <td align="center" class="Green<? echo $estilo ?>"<? echo $add ?>> 
      <? if($row[6] ==""){echo "-";}else{echo $row[6];} ?>
    </td>
    <td align="center" class="Green<? echo $estilo ?>"<? echo $add ?>> 
<B>      <? if($row[7] ==""){echo "-";}else{echo $row[7];} ?>
</B>    </td>
    <td align="center" class="Green<? echo $estilo ?>"<? echo $add ?>> 
      <? if($row[8] ==""){echo "-";}else{echo $row[8];} ?>
    </td>
    <td align="center" class="Terra<? echo $estilo ?>"<? echo $add ?>><? echo $row["pts"] ?></td>
    <td align="center" class="Terra<? echo $estilo ?>"<? echo $add ?>><? echo $row["pj"] ?></td>
    <td align="center" class="Terra<? echo $estilo ?>"<? echo $add ?>><? echo round($row["pro"], 3) ?></td>
  </tr>
<?
} 
?>
</table>
<? } 
?>