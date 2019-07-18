<? $path = "../";
include $path . "common/motor.php";
include "_common_not.php";
if(!isset($id_estruc)){	$id_estruc=10;}
?>

<HTML>
<HEAD>
<TITLE> SportsYA! </TITLE>
<META HTTP-EQUIV="refresh" CONTENT="300;URL=http://www.sportsya.com/welcome/">
</HEAD>
	
<link rel="stylesheet" href="<? echo $path ?>common/css/style.css" type="text/css">
	
<SCRIPT language="JavaScript" src="<? echo $path ?>includes/javas.js" type="text/javascript"></SCRIPT>
<BODY bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?include $path . "common/header.inc.php";include $path . "common/solapas.inc.php";?>
    
<TABLE width="775" border="0" cellpadding="0" cellspacing="0">
    <TR>		
		<TD width="165" valign="top" class="BackMenuZone">
			<TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
			<TR>
				<TD><? include $path . "common/menu.php"; ?></TD>
			</TR>
			<TR>
				<TD><IMG SRC="../img/spacer.gif" WIDTH="1" HEIGHT="8"></TD>
			</TR>
			<TR>
				<TD align="center"><? include $path . "banners/banner_155x64.php" ?></TD>
			</TR>
			</TABLE>
		    <BR>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	    <td class="SpacerMenuSecciones"><img src="../img/spacer.gif" width="100%" height="1"></td>
	</tr>
        <tr> 
          <td class="Menu"><B>Contactos</B></FONT></td>
        </tr>
        <tr> 
          <td BGCOLOR="730027"><img src="../img/spacer.gif" width="100%" height="1"></td>
        </tr>
        <tr> 
          <td class="SubMenu" onmouseover="this.className='SubMenuOver';" onmouseout="this.className='SubMenuOff';"> 
            <A href="mailto:editorial@sportsya.com">Editorial</A> </td>
        </tr>
        <tr> 
          <td class="SpacerSubMenu"><img src="../img/spacer.gif" width="100%" height="1"></td>
        </tr>
        <tr> 
          <td class="SubMenu" onmouseover="this.className='SubMenuOver';" onmouseout="this.className='SubMenuOff';"> 
            <A href="mailto:comercial@sportsya.com">Comercial</A> </td>
        </tr>
      </table> <BR>
			</TD>
		<TD width="1" bgcolor="#000000"><IMG SRC="../img/spacer.gif" WIDTH="1" HEIGHT="1"></TD>
		<TD valign="top" bgcolor="#FFFFFF">			
		<? include "not_alerta.php" ?>
		<? include "not_principal.php" ?>
			<table width="468" border="0" cellspacing="0" cellpadding="0">
			<tr>          			
				<td><? include $path . "banners/banner_468_top.php" ?></td>
			</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>					
				<td><? include "not_secundarias_breves.php" ?></td>
				</tr>
			</table>
			<table width="468" border="0" cellspacing="0" cellpadding="0">
				<tr>           
					<td><? include $path . "banners/banner_468_bottom.php" ?></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>					
				<td class="MasNoticias"><? include "not_mas_noticias.php" ?></td>
			</tr>
			</table>
		</TD>
		<td valign="top"><img src="img/spacer_content_right.gif" width="1" height="3"></td>
		<TD width="140" valign="top">			
			<TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
			<TR>
				<TD><? include $path . "common/buscar.php" ?></TD>
			</TR>
			<TR>
				<TD><? include $path . "common/encuestas.php" ?></TD>
			</TR>
			<TR>
				    <TD>
						<? include $path . "opinion/opinion.php" ?>
					</TD>
			</TR>
			<TR>
				<TD><? include $path . "common/lista_de_mam.inc.php" ?></TD>
			</TR>
			<TR>
				<TD><? include $path . "resultados/resumen_partidos.inc.php" ?></TD>
			</TR>
			<TR>
				    <TD>
						<? include $path . "banners/banner_140x55_1.php" ?>
					</TD>
			</TR>
			<TR>
				    <TD>
						<? include $path . "entrevistas/entrevistas.php" ?>
						
					</TD>
			</TR>
			<TR>
				    <TD>
						<? include $path . "banners/banner_140x55_2.php" ?>
					</TD>
			</TR>
			<TR>
				<TD><? include $path . "banners/banner_140x55_3.php" ?></TD>
			</TR>
			</TABLE>
		</TD>
	</TR>
</TABLE>
</BODY>
</HTML>