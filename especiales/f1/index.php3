<?
include ("../../common/conexion.php");
if(!isset($page))
{
	$page = "inicio";
}
?>
<link rel="stylesheet" href="<? echo $path ?>common/css/style.css" type="text/css">
<!-- comienzo especial -->
<table width="468" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="image/h_f1.gif" width="468" height="66"></td>
  </tr>
</table>
<TABLE WIDTH="468" CELLPADDING=0 CELLSPACING=0 BORDER=0>
  <TR>
    <TD WIDTH=480 VALIGN="top">
      <? require $page . ".php"; ?>
    </TD>
  </TR>
</TABLE>

