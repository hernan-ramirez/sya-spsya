<? include "../common/conexion.php" ?>
<HTML>
<HEAD>
<TITLE>MailMAN</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</HEAD>
<BODY>
<FORM action="https://mailman.sportsya.com/subscribe/<? echo $lista ?>" method="post">
  <INPUT size="30" name="email" value="<? echo $mail ?>">
  <INPUT size="30" name="fullname" value="<? echo $nombre ?> <? echo $apellido ?>">
  <INPUT type="password" size="15" name="pw" value="<? echo $clave ?>">
  <INPUT type="Password" name="pw-conf" size="15" value="<? echo $clave ?>">
</FORM>
</BODY>
</HTML>
<SCRIPT language="JavaScript">
document.forms[0].submit();
</SCRIPT>