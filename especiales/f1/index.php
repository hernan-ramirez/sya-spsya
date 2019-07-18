<?
$path = "../../";
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
	<SCRIPT language="JavaScript" src="<? echo $path ?>admin/includes/javas.js" type="text/javascript"></SCRIPT>
<BODY bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? include $path . "common/header.inc.php"; ?>
<? include $path . "common/solapas.inc.php"; ?>    
<TABLE cellspacing="0" cellpadding="0" width="775" border="0">
    <TR>
		<TD width="165" valign="top" class="BackMenuZone">
			<? 
    include $path . "common/menu.php";
    ?>
		</TD>
		      
        <TD width="1" bgcolor="#000000"></TD>
		<TD valign="top" bgcolor="#FFFFFF">
			<table width="468" border="0" cellspacing="0" cellpadding="0">
        		<tr>
          			<td><? include $path . "banners/banner_468_top.php" ?></td>
				</tr>
      		</table>
			
      <? include "index.php3" ?> 
	  <table width="468" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td>
            <? include $path . "banners/banner_468_bottom.php" ?>
          </td>
        </tr>
      </table>
		</TD>
    	<td valign="top"><img src="img/spacer_content_right.gif" width="1" height="3"></td>
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

