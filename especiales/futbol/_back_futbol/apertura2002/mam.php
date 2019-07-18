<? require_once "../common/conexion.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<HTML>
<HEAD>
<TITLE>Minuto a Minuto</TITLE>
<META http-equiv="" content="text/html; charset=iso-8859-1">
</HEAD>

<FRAMESET rows="*,120" frameborder="NO" border="0" framespacing="0">
	<FRAME src="eliminatorias2006/ficha_partido.php?id_partido=<? echo $id_partido ?>" name="mainFrame"  noresize marginheight="4">
	<FRAME src="minuto_a_minuto.php?id_partido=<? echo $id_partido ?>#fin" name="bottomFrame" frameborder="yes" scrolling="auto">
</FRAMESET>
<NOFRAMES><BODY>

</BODY></NOFRAMES>
</HTML>

