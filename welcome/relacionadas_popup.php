<?
$sql_r = "
SELECT r.*, n.titulo
FROM rel_noticias r, noticias n
WHERE
(
	n.id = r.id_noticia AND
	r.id_noticias = ".$row["id"]."
) OR (
	n.id = r.id_noticias AND
	r.id_noticia = ".$row["id"]."
)
";
$result_r = mysql_query ($sql_r);
if(mysql_num_rows($result_r)!=0){
?>
<LINK href="../common/css/style.css" rel="stylesheet" type="text/css">
 
<TABLE width="230" border="0" cellspacing="0" cellpadding="0">
	<TR> 
		<TD class="titulocolumna">&nbsp;Relacionadas</TD>
		<TD width="8" rowspan="2"><IMG src="<? echo $path ?>img/spacer.gif" width="8" height="1"></TD>
	</TR>
	<TR> 
		<TD>
			<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
			<?
				while ($row_r = mysql_fetch_array($result_r)){
			?>
				<TR a href="*"> 
					<TD class="PopMenu" onMouseOver="this.className='PopMenuOver';" onMouseOut="this.className='PopMenuOff';"> 
						<A HREF="?id_not=<?
					if($row_r["id_noticias"]==$row["id"]){
						echo $row_r["id_noticia"];
					}else{
						echo $row_r["id_noticias"];
					}
						 ?>"><? echo $row_r["titulo"] ?></A></TD>
				</TR>
				<? 
					}
				?>
				
			</TABLE>
		</TD>
	</TR>
</TABLE>

<? 
	}
?>
