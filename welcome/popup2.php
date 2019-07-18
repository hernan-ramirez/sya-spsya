<? $path = "../"; ?>
<? include $path."common/conexion.php" ?>
<HTML>
<HEAD>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<TITLE>Sports YA</TITLE>
	<SCRIPT language=javascript>
	
		//Resize Windows
		var ancho=480;
		var alto=350;

		window.resizeTo(ancho, alto);

		if (document.all)
		{	window.moveTo((screen.width - ancho) / 2, (screen.height - alto) / 2);
		} else {
			window.moveTo(window.screenX + ((window.outerWidth - ancho) / 2), window.screenY + ((window.outerHeight - alto) / 2));
		}
	</script>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="<? echo $path ?>common/css/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body bgcolor="5A595D" text="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" toolbars=0 OnLoad="menubar=0,scrollbars=0,toolbars=0">
<?
$sql = "SELECT n.*, f.archivo_imagen, p.pais, d.deporte, a.autor FROM noticias n
LEFT JOIN fotos f ON (n.id_foto = f.id)
LEFT JOIN paises p ON (n.id_pais = p.id)
LEFT JOIN autores a ON (n.id_autor = a.id)
LEFT JOIN deportes d ON (n.id_deporte = d.id)
WHERE n.id =  $id_not";
$result = mysql_query ($sql);
if(mysql_num_rows($result)!=0){
	$row = mysql_fetch_array($result);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td class="BackHeaderTop"><IMG src="<? echo $path ?>img/pop_logo.gif" width="179" height="43"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td class="PopPadding"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td><font color="#FFFFFF"><? echo $row["pais"] ?> | <B> <? echo $row["deporte"] ?></B></font></td>
        </tr>
        <tr> 
          <td class="PopTitle"><? echo $row["titulo"] ?></td>
        </tr>
        <tr> 
          <td><img src="<? echo $path ?>img/spacer.gif" width="1" height="8"></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td width="6"><img src="<? echo $path ?>img/pop_corner_lt.gif" width="6" height="6"></td>
          <td width="100%" bgcolor="#FFFFFF"><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
          <td width="6"><img src="<? echo $path ?>img/pop_corner_rt.gif" width="6" height="6"></td>
        </tr>
        <tr> 
          <td><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
          <td bgcolor="#FFFFFF"><strong> 
            <? 
							if(($row["archivo_imagen"])!=0){
						?>
            </strong> <TABLE width="228" border="0" align="left" cellpadding="0" cellspacing="0">
              <TR> 
                <TD width="220"> <TABLE width="220" border="0" cellpadding="0" cellspacing="0">
                    <TR> 
                      <TD><IMG src="<? echo $path ?>clipart/dimensionar.php?imagen=imagen/<? echo $row["archivo_imagen"] ?>&ancho=220&marca_de_agua=si" border="1"></TD>
                    </TR>
                    <TR> 
                      <TD class="PopEpigrafe"> <? echo $row["epigrafe"] ?> </TD>
                    </TR>
                    <TR> 
                      <TD>&nbsp; </TD>
                    </TR>
                  </TABLE></TD>
                <TD width="8"><IMG src="<? echo $path ?>img/spacer.gif" width="8" height="1"></TD>
              </TR>
            </TABLE>
            <?
			}	
				else 
				{
				echo "";
				}
			?>
            <b><? echo $row["copete"] ?></b><br>
            <br> <br>
            <? echo nl2br($row["cuerpo"]) ?>
			<BR>
			<I><? echo $row["autor"] ?></I>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<br>
              <tr> 
                <td bgcolor="#000000"><IMG src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
              </tr>
              <tr> 
                <td> 
                  <? include "relacionadas_popup.php" ?>
                </td>
              </tr>
            </table></td>
        </tr>
        <td width="6"><img src="<? echo $path ?>img/pop_corner_lb.gif" width="6" height="6"></td>
        <td width="100%"><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
        <td width="6"><img src="<? echo $path ?>img/pop_corner_rb.gif" width="6" height="6"></td>
      </table></td>
  </tr>
</table>
</td>
</tr> 
</table> 
<?
} 
?>
</body>
</html>
