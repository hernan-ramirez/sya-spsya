<? $path = "../"; ?>
<? include $path."common/conexion.php" ?>
<HTML>
<HEAD>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<TITLE>Sports YA</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="<? echo $path ?>common/css/style.css" rel="stylesheet" type="text/css">
</HEAD>
<body bgcolor="5A595D" text="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?
$sql = "SELECT *
		FROM prensa
		WHERE id = $id_not";

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
		<td class="PopPadding">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td HEIGHT="20" class="small"><font COLOR="#CCCCCC"><? echo substr($row["fecha_creacion"], 0, 10) ?></font></td>
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
					<td bgcolor="#FFFFFF"> 
						<b><? echo $row["copete"] ?></b>
						<br>
						<br>
						<? echo nl2br($row["cuerpo"]) ?></td>
				</tr>
				<td width="6"><img src="<? echo $path ?>img/pop_corner_lb.gif" width="6" height="6"></td>
				<td width="100%"><img src="<? echo $path ?>img/spacer.gif" width="1" height="1"></td>
				<td width="6"><img src="<? echo $path ?>img/pop_corner_rb.gif" width="6" height="6"></td>
			</table>
		</td>
	</tr>
</table></td>
</tr> </table> 
<?
} 
?>
</body>
</html>
