<? require_once "../common/conexion.php"; ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> Minuto a Minuto </TITLE>
<LINK href="../common/css/style.css" rel="stylesheet" type="text/css">
<STYLE type="text/css">
<!--
.Campo1 {
	background-color: #E8E9D4;
	margin: 2px;
}
.Campo2 {
	background-color: #E2EBEC;
	margin: 2px;
}
border {
	border: 1px solid 949494;
}
-->
</STYLE>
<META http-equiv="" content="text/html; charset=iso-8859-1">
<META http-equiv="" content="text/html; charset=iso-8859-1">
</HEAD>
<BODY leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
	<TD class="BackEspecialesFst">Minuto a Minuto</TD>
  </TR>
</TABLE>
<TABLE width="100%" cellpadding="0" cellspacing="0">
  <? $resultado = mysql_query("SELECT *
	FROM futbol_acciones
WHERE id_partido = $id_partido 
ORDER BY tiempo, minuto");
if(mysql_num_rows($resultado)!=0){ 
while($fila = mysql_fetch_array($resultado)){ 

if ($estilo == "1"){ $estilo = "2"; } else { $estilo = "1";}

?>
  <TR class="Campo<? echo $estilo ?>"> 
	<TD width="40"> <IMG src="../img/mam/<? echo $fila["accion"] ?>.gif" width="40" height="40" hspace="4" vspace="4" border="1"> 
	</TD>
	<TD width="100%"> 
	  <? 
	switch ($fila["tiempo"]){
		case "1": echo "1&deg;T"; break;
		case "2": echo "2&deg;T"; break;
		case "3": echo "ET"; break;
		case "4": echo "1&deg;S"; break;
		case "5": echo "2&deg;S"; break;

	} ?>
	  -&nbsp;<b>Minuto <? echo $fila["minuto"] ?></b> l	<? echo $fila["descripcion"] ?></TD>
  </TR>
  <TR bgcolor="#FFFFFF"> 
	<TD colspan="2"><IMG src="../img/spacer.gif" width="1" height="1"></TD>
  </TR>
  <TR bgcolor="#808080"> 
	<TD colspan="2"><IMG src="../img/spacer.gif" width="1" height="1"></TD>
  </TR>
  <? } } ?>
</TABLE>
<A name="fin"></A>
</BODY>
</HTML>