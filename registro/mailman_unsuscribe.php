<? include "../common/conexion.php" ?>
<HTML>
<HEAD>
<TITLE>Desuscribe</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</HEAD>
<BODY bgcolor="white">
<FORM action="https://mailman.sportsya.com/options/<? echo $lista ?>" method="POST" >
  <INPUT name="email" type="HIDDEN" value="<? echo $mail ?>" >
  <INPUT name="login-unsub" value="Desuscribirs" >
</FORM>
</BODY>
</HTML>
<SCRIPT language="JavaScript">
document.forms[0].submit();
</SCRIPT>