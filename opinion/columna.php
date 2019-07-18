<? $path = "../../"; ?>
<? include "../common/conexion.php" ?>
<HTML>
<HEAD>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<TITLE>SportsYA!</TITLE>
<META http-equiv="" content="text/html; charset=iso-8859-1">
<LINK href="../common/css/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="" content="text/html; charset=iso-8859-1"></HEAD>
<BODY bgcolor="5A595D" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td class="BackHeaderTop"><IMG src="../../img/pop_logo.gif" width="179" height="43"></td>
  </tr>
</table>
<?
$sql = "SELECT o.*, c.archivo_columnista, c.nombre
		FROM opiniones o
		LEFT JOIN columnistas c ON (o.id_columnista = c.id)
		WHERE o.id =  $id_col";
$result = mysql_query ($sql);

$columnista = $row["id_columnista"];
echo $columnista;

if(mysql_num_rows($result)!=0){
	$row = mysql_fetch_array($result);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="PopPadding"> 
    <td class="PopTitle"><? echo $row["titulo"] ?></td>
  </tr>
  <tr> 
    <td><img src="<? echo $path ?>img/spacer.gif" width="1" height="8"></td>
  </tr>
  <tr class="PopPadding">
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td width="6"><img src="<? echo $path ?>img/pop_corner_lt.gif" width="6" height="6"></td>
          <td width="100%" bgcolor="#FFFFFF"><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
          <td width="6"><img src="<? echo $path ?>img/pop_corner_rt.gif" width="6" height="6"></td>
        </tr>
        <tr> 
          <td><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
          <td valign="top" bgcolor="#FFFFFF"><TABLE width="100%" border="0" cellspacing="2" cellpadding="2">
              <TR> 
                <TD valign="top"> <TABLE width="228" border="0" align="left" cellpadding="0" cellspacing="0">
                    <TR> 
                      <TD width="220"> <TABLE width="220" border="0" cellpadding="0" cellspacing="0">
                          <TR> 
                            <TD><IMG src="../clipart/columnista/<? echo $row["archivo_columnista"] ?>.gif" border="0"></TD>
                          </TR>
                          <TR> 
                            <TD class="Epigrafe"><? echo $row["epigrafe"] ?>
                            </TD>
                          </TR>
                        </TABLE></TD>
                      <TD width="8"><IMG src="img/spacer.gif" width="8" height="1"></TD>
                    </TR>
                  </TABLE>
                  <b><? echo nl2br($row["copete"]) ?></b><br><br> <? echo nl2br($row["cuerpo"]) ?> 
                </TD>
              </TR>
            </TABLE></td>
        </tr>
        <td width="6"><img src="<? echo $path ?>img/pop_corner_lb.gif" width="6" height="6"></td>
        <td width="100%"><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
        <td width="6"><img src="<? echo $path ?>img/pop_corner_rb.gif" width="6" height="6"></td>
      </table>
      <br> 
      <?
		} 
		?>
    </td>
  </tr>
</table>
<? include "ultimas_columnas.php" ?>

</BODY>
</HTML>