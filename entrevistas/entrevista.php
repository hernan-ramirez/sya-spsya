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
$sql = "SELECT e.*, f.archivo_imagen FROM entrevistas e
		LEFT JOIN fotos f ON (e.id_foto = f.id)
		WHERE e.id= $id_ev";

	$result = mysql_query ($sql);
	if(mysql_num_rows($result)!=0){
		$row = mysql_fetch_array($result);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="PopPadding"> 
        <td class="PopTitle">Entrevista | <? echo $row["entrevistado"] ?><BR>
		<? echo $row["titulo"] ?></td>
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
          			<td valign="top" bgcolor="#FFFFFF">
		  
						<TABLE width="100%" border="0" cellspacing="2" cellpadding="2">
              <TR> 
                <TD valign="top">
					<? ## Si archivo_imagen no esta vacio pone esto
					if(($row["archivo_imagen"])!=''){ ?>				
					<TABLE width="228" border="0" align="left" cellpadding="0" cellspacing="0">
					<TR> 
						<TD width="220"> <TABLE width="220" border="0" cellpadding="0" cellspacing="0">
					<TR> 
						<TD><IMG src="<? echo $path ?>clipart/dimensionar.php?imagen=imagen/<? echo $row["archivo_imagen"] ?>&ancho=220&marca_de_agua=si" border="1"></TD>
					</TR>
					<TR> 
						<TD class="PopEpigrafe"> <? echo $row["copete"] ?></TD>
					</TR>
					</TABLE>
						</TD>
                      <TD width="10"><IMG src="img/spacer.gif" width="8" height="1"></TD>
                    </TR>
                  </TABLE>
  					<? } # Sino no pone nada... ?>
						<br>
					<? ## Si audio no esta vacio pone esto
					if(($row["audio"])!=''){ ?>
					<B>Escuchar el Audio</B><a href="<? echo $row["audio"] ?>"><img SRC="<? echo $path ?>img/audio.gif" BORDER="0"></a>
					<? } # Sino no pone nada... ?>						
						<br>
						<br> <? echo nl2br($row["cuerpo"]) ?>
						<br>
					</TD>
              </TR>
            </TABLE>
			</td>
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
</BODY>
</HTML>

