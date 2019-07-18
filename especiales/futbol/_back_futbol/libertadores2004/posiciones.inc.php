<?
$sql = "SELECT grupo FROM futbol_partidos 
WHERE id_torneo = $id_torneo
AND grupo is not null
GROUP BY grupo ORDER BY grupo";
$result_g = mysql_query($sql);
if(mysql_num_rows($result_g)!=0){
	while($row_g=mysql_fetch_array($result_g)){
	$numero_grupo = $row_g[0];
	if($numero_grupo=="" || $numero_grupo=="null" || !isset($numero_grupo)){$numero_grupo="";}
?>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
	<TD class="BackEspecialesFst"><? if(mysql_num_rows($result_g)>1){ ?><B>Grupo <? echo $numero_grupo ?></B><? } ?>&nbsp;</TD>
  </TR>
</TABLE>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr> 
	<td width="50%" class="GreenBorde">Equipo</td>
	<td width="30" nowrap class="GreenBorde">PJ</td>
	<td width="30" nowrap class="GreenBorde">PG</td>
	<td width="30" nowrap class="GreenBorde">PE</td>
	<td width="30" nowrap class="GreenBorde">PP</td>
	<td width="30" nowrap class="TerraLeft">GF</td>
	<td width="30" nowrap class="TerraLeft">GC</td>
	<td width="30" nowrap class="GreenBorde">PTS</td>
  </tr>
<?
$sql = "
SELECT c.id, c.alias
FROM futbol_clubes c
LEFT JOIN futbol_partidos p on (p.id_primer_club = c.id OR p.id_segundo_club = c.id)
WHERE p.id_torneo = $id_torneo
AND p.grupo = '$numero_grupo'
AND p.orden_llave = 0
GROUP by c.id
";
#echo "<!-- #### consulta ###@ ". $sql . " @### -->";
$result = mysql_query($sql);
if(mysql_num_rows($result)!=0){
	while($row=mysql_fetch_array($result)){
		$id_club = $row["id"];
		$alias[$id_club] = $row["alias"];

		$PJ[$id_club] = 0;
		$PG[$id_club] = 0;
		$PE[$id_club] = 0;
		$PP[$id_club] = 0;
		$GF[$id_club] = 0;
		$GC[$id_club] = 0;
		$PTS[$id_club] = 0.1; #tiene el 0.1 porque sino no sale en el orden del array
		
		$sql = "SELECT p.id, p.goles_primer_club, p.goles_segundo_club,
		p.id_primer_club, p.id_segundo_club 
		FROM futbol_partidos p 
		WHERE p.id_partidos_estados = 1
		AND	p.id_torneo = $id_torneo 
		AND (p.id_primer_club = $id_club 
		OR p.id_segundo_club = $id_club )
		AND p.orden_llave = 0";
		$result_part = mysql_query($sql);
		if(mysql_num_rows($result_part)!=0){
			$PJ[$id_club] = mysql_num_rows($result_part);
			while($row_part=mysql_fetch_array($result_part)){
				############
				 $L = $row_part["goles_primer_club"];
				 settype ( $L, "integer");
				 $V = $row_part["goles_segundo_club"];
				 settype ( $V, "integer");
				############
				# echo "·······Partido·······" . $row_part["id"] . "<BR>";
				# echo "local:" . $row_part["id_primer_club"] . "->" . $L . "<BR>";
				# echo "visitante:" . $row_part["id_segundo_club"] . "->" . $V . "<BR>";				
				############
				if($row_part["id_primer_club"]==$id_club){		
					$GF[$id_club] = $GF[$id_club] + $L;
					$GC[$id_club] = $GC[$id_club] + $V;					
					if($L > $V){
						$PG[$id_club] = $PG[$id_club] + 1;
						$PTS[$id_club] = $PTS[$id_club] + 3;
					}
					if($L < $V){
						$PP[$id_club] = $PP[$id_club] + 1;
					}	
				}elseif($row_part["id_segundo_club"]==$id_club){
					$GF[$id_club] = $GF[$id_club] + $V;
					$GC[$id_club] = $GC[$id_club] + $L;					
					if($L < $V){
						$PG[$id_club] = $PG[$id_club] + 1;
						$PTS[$id_club] = $PTS[$id_club] + 3;
					}
					if($L > $V){
						$PP[$id_club] = $PP[$id_club] + 1;
					}
				}
				if($L == $V){
					$PE[$id_club] = $PE[$id_club] + 1;
					$PTS[$id_club] = $PTS[$id_club] + 1;
				}
				############
				#echo "PG:" . $PG[$id_club] . " PE:" . $PE[$id_club] . " PP:" . $PP[$id_club] . " GF:" . $GF[$id_club] . " GC:" . $GC[$id_club] . " PTS: " . $PTS[$id_club] . "<BR>";
				############
			}
		}
		mysql_free_result($result_part);
	}
}
mysql_free_result($result);

arsort($PTS);
do{
	$id_club = key($PTS);
	?>
	 <? if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";} ?>
  <tr> 
	<td class="Greenborde<? echo $estilo ?>"><? echo $alias[$id_club] ?>&nbsp;</td>
	<td class="Greenborde<? echo $estilo ?>"><? echo $PJ[$id_club] ?>&nbsp;</td>
	<td class="Greenborde<? echo $estilo ?>"><? echo $PG[$id_club] ?>&nbsp;</td>
	<td class="Greenborde<? echo $estilo ?>"><? echo $PE[$id_club] ?>&nbsp;</td>
	<td class="Greenborde<? echo $estilo ?>"><? echo $PP[$id_club] ?>&nbsp;</td>
	<td class="Terra<? echo $estilo ?>"><? echo $GF[$id_club] ?>&nbsp;</td>
	<td class="Terra<? echo $estilo ?>"><? echo $GC[$id_club] ?>&nbsp;</td>
	<td class="Greenborde<? echo $estilo ?>"><B><? echo str_replace(".1","",$PTS[$id_club]) ?></B>&nbsp;</td>
  </tr>
  <?
}while(next($PTS));
		unset($PJ);
		unset($PG);
		unset($PE);
		unset($PP);
		unset($GF);
		unset($GC);
		unset($PTS); 
} # del while del grupo 
} # del if del grupo 
?>
</table>
