<?
$path = "../../";
include $path . "common/motor.php";
if(!isset($id_estruc)){ $id_estruc = 1; }
if(!isset($id_torneo)){ $id_torneo = 1; }
if(!isset($num_fecha)){ $num_fecha = "1"; }
if(!isset($inc)){ $inc = "resultados"; }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES">
<HTML>
<HEAD>
<TITLE> Torneo AFA Apertura 2003 </TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<? echo $path ?>common/css/style.css" type="text/css">
<SCRIPT language="JavaScript" src="<? echo $path ?>admin-me/includes/javas.js" type="text/javascript"></SCRIPT>
</HEAD>

<BODY bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? include $path . "common/header.inc.php"; ?>
<? include $path . "common/solapas.inc.php"; ?>    
<TABLE cellspacing="0" cellpadding="0" width="775" border="0">
    <TR>
		<TD width="165" valign="top" class="BackMenuZone">
			<? include $path . "common/menu.php"; ?>
		</TD>
		      
        <TD width="1" bgcolor="#000000"></TD>
		<TD valign="top" bgcolor="#FFFFFF">
			<table width="468" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td><IMG src="img/h_c_apertura_ar.gif" width="468" height="66"></td>
				</tr>
				<tr> 
					<td> 
						<? include "menu.inc.php" ?>
					</td>
				</tr>
				<tr> 
					<td> 
						<? include $inc. ".inc.php" ?>
					</td>
				</tr>
			</table>
        </TD>
    	<td valign="top"><img src="../apertura2003/img/spacer_content_right.gif" width="1" height="3"></td>
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