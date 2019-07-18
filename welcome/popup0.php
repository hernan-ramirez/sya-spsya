<? $path = "../"; ?>
<? include $path."common/conexion.php" ?>
<HTML>
<HEAD>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<TITLE>Sports YA</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="<? echo $path ?>common/css/style.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?
$sql = "SELECT n.*, f.archivo_imagen, p.pais, d.deporte FROM noticias n
LEFT JOIN fotos f ON (n.id_foto = f.id)
LEFT JOIN paises p ON (n.id_pais = p.id)
LEFT JOIN deportes d ON (n.id_deporte = d.id)
WHERE n.id= $id_not";
$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	$row = mysql_fetch_array($result);
?>
 
<TABLE width="468" border="0" cellspacing="0" cellpadding="0">
  <TR> 
    <TD bgcolor="FDD74F"> <TABLE border="0" cellspacing="0" cellpadding="0">
        <TR> 
          <TD><IMG src="<? echo $path ?>img/logo.gif" width="288" height="51" hspace="6" vspace="12"></TD>
          <TD><IMG src="<? echo $path ?>img/pipe.gif"></TD>
          <TD><IMG src="img/spacer.gif" width="12" height="1"></TD>
          <TD><TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
              <TR> 
                <TD><A href="onclick="javascript.print();"">Imprimir</A></TD>
              </TR>
              <TR> 
                <TD>Mandar via e mail</TD>
              </TR>
              <TR> 
                <TD><A href="javascript:window.close()">Cerrar</A></TD>
              </TR>
            </TABLE>
			</TD>
        </TR>
      </TABLE>
    </TD>
  </TR>
  <TR> 
    <TD bgcolor="#FFFFFF"><IMG src="img/spacer.gif" width="1" height="1"></TD>
  </TR>
  <TR>
    <TD class="NoticiaPopUp">
      		<TABLE width="100%" border="0" cellspacing="2" cellpadding="2">
        		<TR> 
          			<TD class="small">
            			<? echo $row["pais"] ?>
             | <B>
						<? echo $row["deporte"] ?>
						</B>
          </TD>
				</TR>
        		<TR> 
          			<TD class="TitlePpal">
						<? echo $row["titulo"] ?>
					</TD>
				</TR>
				<TR>
          			<TD class="Copete">
						<? echo $row["copete"] ?>
					</TD>
				</TR>
        		<TR> 
          			<TD valign="top">
						<? 
							if(($row["archivo_imagen"])!=0){
						?>						
						<TABLE width="228" border="0" align="left" cellpadding="0" cellspacing="0">
              				<TR>
                				<TD width="220"> 
                  					<TABLE width="220" border="0" cellpadding="0" cellspacing="0">
														
										<TR> 
                      						<TD><IMG src="<? echo $path ?>clipart/dimensionar.php?imagen=imagen/<? echo $row["archivo_imagen"] ?>&ancho=220&marca_de_agua=si" border="1"></TD>
										</TR>
                    					<TR> 
                      						<TD class="PopEpigrafe">
												<? echo $row["epigrafe"] ?>
											</TD>
										</TR>
										<TR> 
                      						<TD> 
												<? include "relacionadas_popup.php" ?>
												 </TD>
										</TR>
                  					</TABLE>
									<?
									}	
										else 
										{
										echo "";
										}
									?>
									
									
								</TD>
								<TD width="8"><IMG src="img/spacer.gif" width="8" height="1"></TD>
							</TR>
            			</TABLE>
						<? echo nl2br($row["cuerpo"]) ?>
					</TD>
				</TR>
      		</TABLE>
		</TD>
  </TR>
</TABLE>
<?
} 
?>
</BODY>
</HTML>

