<?
$sql = "SELECT n.*, f.archivo_imagen, p.pais, d.deporte FROM noticias n
LEFT JOIN fotos f ON (n.id_foto = f.id)
LEFT JOIN paises p ON (n.id_pais = p.id)
LEFT JOIN deportes d ON (n.id_deporte = d.id)
LEFT JOIN publicaciones pu ON (pu.id_publicado = n.id)
WHERE pu.id_seccion = 1
AND pu.id_lista_tablas = 40 
AND pu.id_estructura = $id_estruc";
$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	$row = mysql_fetch_array($result);
?>
<TABLE width="468" border="0" cellspacing="0" cellpadding="0">
	<TR>
		<TD>
<TABLE width="100%" border="0" cellspacing="2" cellpadding="2">
	<TR> 
		<TD class="small"> <? echo $row["pais"] ?> | <B> <? echo $row["deporte"] ?></B></TD>
	</TR>
	<TR> 
		<TD class="TitlePpal"> <A href="javascript:abrirVentana('popup.php?id_not=<? echo $row["id"] ?>','<? echo $row["id"] ?>',520,350);"> <? echo $row["titulo"] ?></A></TD>
	</TR>
<TR> 
	<TD valign="top"> <TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
		<TR> 
		<TD valign="top"><TABLE width="158" border="0" align="left" cellpadding="0" cellspacing="0">
				<TR> 
		  		<TD width="220"> <TABLE width="150" border="0" cellpadding="0" cellspacing="0">
			  			<TR> 
						    <TD><IMG src="<? echo $path ?>clipart/dimensionar.php?imagen=imagen/<? echo $row["archivo_imagen"] ?>&ancho=150&marca_de_agua=si" border="1"></TD>
			  </TR>
			</TABLE></TD>
		  <TD width="8"><IMG src="<? echo $path ?>img/spacer.gif" width="8" height="1"></TD>
		</TR>
	  </TABLE>
									<B><? echo $row["copete"] ?></B></TD>
  </TR>
</TABLE>
</TD>
</TR>
</TABLE>
</TD>
</TR>
</TABLE>
<?
} 
?>

