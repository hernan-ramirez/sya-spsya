<?
$sql_ult = "SELECT o.* from `opiniones` o
			WHERE o.id_columnista = $row[id_columnista]
			AND o.id != $id_col
			LIMIT 5";

$result_ult = mysql_query ($sql_ult);
if(mysql_num_rows($result_ult)!=0){
//echo "Ultimas Opiniones de $row[nombre]";
?>
<?
	while ($row_ult = mysql_fetch_array($result_ult)){
?>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
<TR a href="*">
	<TD class="PopMenu" onMouseOver="this.className='PopMenuOver';" onMouseOut="this.className='PopMenuOff';">
	<A HREF="?id_col=<? echo $row_ult["id"]; ?>"><? echo $row_ult["titulo"] ?></A></TD>
</TR>
</TABLE>
<? 
}
	}
?>