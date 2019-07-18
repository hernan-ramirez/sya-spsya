<?
$path = "../";
include $path . "common/motor.php";
if(!isset($id_estruc)){
	$id_estruc=1;
}
?>
<HTML>
<HEAD>
<TITLE> SportsYA! </TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>
	<link rel="stylesheet" href="<? echo $path ?>common/css/style.css" type="text/css">
	<SCRIPT language="JavaScript" src="<? echo $path ?>includes/javas.js" type="text/javascript"></SCRIPT>
<BODY bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?
include $path . "common/header.inc.php";
include $path . "common/solapas.inc.php";
?>    
<TABLE cellspacing="0" cellpadding="0" width="775" border="0">
  <TR>
		<TD width="165" valign="top" class="BackMenuZone" background="<? echo $path ?>img/principal/fondo_left.gif" bgcolor="#999999">
			<? include $path . "common/menu.php"; ?>
			<BR>
			<!-- Contactos -->
			<TABLE WIDTH="90%" BORDER="0" ALIGN="CENTER" CELLPADDING="0" CELLSPACING="0">
			<TR>
				<TD WIDTH="1" BGCOLOR="#000000"><IMG SRC="<? echo $path ?>img/spacer.gif" WIDTH="1" HEIGHT="1"></TD>
				<TD><table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td BGCOLOR="#000000"><IMG SRC="<? echo $path ?>img/spacer.gif" WIDTH="1" HEIGHT="1"></td>
						</tr>
						<tr>
							<td HEIGHT="18" BGCOLOR="#990000">&nbsp; <FONT COLOR="#FFFFFF"><B>Contactos</B></FONT></td>
						</tr>
						<tr>
							<td BGCOLOR="730027"><img src="../img/spacer.gif" width="100%" height="1"></td>
						</tr>
						<tr onclick="javascript:top.location='mailto:prensa@sportsya.com';">
							<td class="SubMenu" onmouseover="this.className='SubMenuOver';" onmouseout="this.className='SubMenuOff';"><A href="mailto:info@sportsya.com">Editorial</A></td>
						</tr>
						<tr>
							<td class="SpacerSubMenu"><img src="../img/spacer.gif" width="100%" height="1"></td>
						</tr>
						<tr onclick="javascript:top.location='mailto:comercial@sportsya.com';">
							<td class="SubMenu" onmouseover="this.className='SubMenuOver';" onmouseout="this.className='SubMenuOff';"><A href="mailto:info@sportsya.com">Comercial</A></td>
						</tr>
						<tr>
							<td BGCOLOR="#000000"><IMG SRC="<? echo $path ?>img/spacer.gif" WIDTH="1" HEIGHT="1"></td>
						</tr>
					</table>
				</TD>
				<TD WIDTH="1" BGCOLOR="#000000"><IMG SRC="<? echo $path ?>img/spacer.gif" WIDTH="1" HEIGHT="1"></TD>
			</TR>
			</TABLE>
			<!-- Fin Contactos -->
		</TD>
		      
        <TD width="1" bgcolor="#000000"></TD>
		
    <TD width="468" valign="top" bgcolor="#FFFFFF"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					
          <td class="MasNoticias"> 
            <? include "noticias.php" ?>
          </td>
				</tr>
			</table>
		</TD>
    	<td valign="top"><img src="../noticias/img/spacer_content_right.gif" width="1" height="3"></td>
		<TD width="140" valign="top">
			<? include $path . "common/buscar.php" ?>
			<? include $path . "common/encuestas.php" ?>
			<!-- <? include $path . "common/not_multimedia.php" ?> -->
			<? include $path . "opinion/opinion.php" ?>
		</TD>
	</TR>
</TABLE>
</BODY>
</HTML>

