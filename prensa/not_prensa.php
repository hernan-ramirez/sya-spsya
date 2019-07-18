<?
$sql = "SELECT * FROM prensa
		ORDER by id DESC";
	
$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result)){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
		<td WIDTH="70" ALIGN="CENTER" VALIGN="TOP" class="small"><? echo substr($row["fecha_creacion"], 0, 10) ?></td>
		 
	    <td class="small"><a href="javascript:abrirVentana('/prensa/prensa.php?id_not=<? echo $row["id"] ?>','<? echo $row["id"] ?>',520,350);""><B><? echo $row["titulo"] ?></B></a></td>
	</tr>
    <tr>
		<td><img src="<? echo $path ?>img/spacer.gif" WIDTH="2" HEIGHT="2"></td>
		<td class="small"><? echo $row["copete"] ?></td>
	</tr>
	<tr>
		<td class="Dashed"><img src="<? echo $path ?>img/spacer.gif" WIDTH="2" HEIGHT="2"></td>
		 
	    <td class="Dashed"><img src="<? echo $path ?>img/spacer.gif" WIDTH="2" HEIGHT="2"></td>
	</tr>
</table>
<?
		} 
	}
?>