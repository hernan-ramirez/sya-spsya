<?
$sql_r = "SELECT r.*, n.titulo
		FROM rel_noticias r, noticias n
		WHERE
		(
			n.id = r.id_noticia AND
			r.id_noticias = ".$row["id"]."
		) OR (
			n.id = r.id_noticias AND
			r.id_noticia = ".$row["id"]."
		)";
$result_r = mysql_query ($sql_r);
if(mysql_num_rows($result_r)!=0){
	while ($row_r = mysql_fetch_array($result_r)){
?>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="1" bgcolor="#f7f7f7">
    <TR>
		<TD width="4"><img src="img/spacer.gif" width="4" height="1"></TD>
	    <TD width="10">&#149 </TD>
		<TD class="relacionadas_ppal"><A HREF="javascript:abrirVentana('popup.php?id_not=<?
if($row_r["id_noticias"]==$row["id"]){
	echo $vent = $row_r["id_noticia"];
}else{
	echo $vent = $row_r["id_noticias"];
}
	 ?>','<? echo $vent ?>',485,350);"">
			<? echo $row_r["titulo"] ?>
			</A></TD>
	</TR>
</TABLE>
<? 
	}
		}
 ?>

