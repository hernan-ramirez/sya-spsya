<BODY BGCOLOR="#000000"><TABLE WIDTH="468" BORDER="0" CELLSPACING="0" CELLPADDING="0">
<TR>
	<TD VALIGN="BOTTOM"><IMG SRC="<? echo $path; ?>img/resumen.gif" WIDTH="140" HEIGHT="20"></TD>
</TR>
</TABLE>


<?
$sql = "
		SELECT fr.id_torneo, ft.torneo
		FROM futbol_resumen fr
		LEFT JOIN futbol_torneos ft ON (ft.id = fr.id_torneo)
		GROUP by fr.id_torneo
		ORDER by fr.id_torneo		
		";
	
$result_t = mysql_query ($sql);
if(mysql_num_rows($result_t)!=0){
	while ($row_t = mysql_fetch_array($result_t)){
?>
 

<table width="468" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td class="BackEspecialesFst"><? echo $row_t["torneo"] ?></td>
</tr>
</table>

<?
$sql = "
		SELECT fr.*, ft.torneo, fc.alias as e1, fcc.alias as e2 FROM futbol_resumen fr
		LEFT JOIN futbol_torneos ft ON (ft.id = fr.id_torneo)
		LEFT JOIN futbol_clubes fc ON (fc.id = fr.id_primer_club)
		LEFT JOIN futbol_clubes fcc ON (fcc.id = fr.id_segundo_club)
		WHERE id_torneo = $row_t[id_torneo]
		";

$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	while ($row = mysql_fetch_array($result)){
?>

<table width="468" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td WIDTH="189" class="Green1">&nbsp; <? echo $row["e1"] ?></td>
	<td width="1" bgcolor="#CCCCCC"><img src="<? echo $path; ?>img/spacer.gif" width="1" height="1"></td>
	    <td ALIGN="CENTER" class="Gray1"><? echo $row["goles_primer_club"] ?></td>
	<td ALIGN="CENTER" class="Gray2"><? echo $row["goles_segundo_club"] ?></td>
	<td width="1" bgcolor="#CCCCCC"><img src="<? echo $path; ?>img/spacer.gif" width="1" height="1"></td>
	<td WIDTH="189" class="Green2"><? echo $row["e2"] ?></td>
</tr>
<tr>
	<td colspan="3" width="1"><img src="<? echo $path; ?>img/spacer.gif" width="1" height="1"></td>
</tr>      
</table>

<?
	} 	# del IF del partido
}		# del WHILE del partido
?>
<?
	} 	# del IF del torneo
}		# del WHILE del torneo
?>
<table width="468" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td height="2" bgcolor="#E5E5E5">&nbsp;</td>
</tr>
<tr>
	<td align="right" bgcolor="#E5E5E5"><img src="<? echo $path; ?>img/corner_r_b.gif" width="5" height="5"></td>
</tr>
</table>