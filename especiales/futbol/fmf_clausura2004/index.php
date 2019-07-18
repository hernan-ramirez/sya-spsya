<?
$path = "../../../";
$common = "../futbol_common/";
include $path . "common/motor.php";
include $path . "welcome/_common_not.php";
if(!isset($id_estruc)){ $id_estruc = 63; }
if(!isset($id_torneo)){ $id_torneo = 5; }
if(!isset($inc)){ $inc = "fixture"; }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES">
<HTML>
<HEAD>
<TITLE> Torneo FMF Clausura 2004 </TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<? echo $path ?>common/css/style.css" type="text/css">
<SCRIPT language="JavaScript" src="<? echo $path ?>includes/javas.js" type="text/javascript"></SCRIPT>
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
					<td><IMG src="./img/clausura_04_up.gif" width="468" height="66"></td>
				</tr>
				<tr> 
					<td background="img/clausura_04_doen.gif"> 
						<? include $common."menu.inc.php" ?>
					</td>
				</tr>
<tr>					
<td class="MasNoticias"> <A href="http://mx.geocities.com/salvador_f/" target="_blank"><B>Libro de Francisco Javier</B></A>&nbsp;&nbsp;&nbsp;
<? if($inc == "posiciones"){ ?><A href="?inc=posiciones_grupos"><B>Por Grupos</B></A><? } ?>
</td>
</tr>			
				<tr> 
					<td> 
						<? include $common.$inc. ".inc.php" ?>
					</td>
				</tr>
				<? if($inc == "posiciones"){ ?>
				<tr>
					<td>
						<? include $common."descenso.inc.php" ?>
					</td>
				</tr>
				<? } ?>
				<? if($inc == "fixture"){ ?>
				<tr>
					<td>
						<? include $path .  "welcome/not_secundarias_breves.php" ?>
					</td>
				</tr>
				<tr>
					<td class="MasNoticias">
						<? include $path .  "welcome/not_mas_noticias.php" ?>
					</td>
				</tr>
				<? } ?>
				<tr>
					<td>&nbsp;</td>
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