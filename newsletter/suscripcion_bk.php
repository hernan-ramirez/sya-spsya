<? 
$path = "../";
require_once $path."common/conexion.php";
include $path."common/_fnc_especiales.inc.php";

if(isset($Submit) && is_array($suscriptos)){
	if(ejecutar("suscriptos")){
		if($suscriptos["id"]!=""){
			$insert_id = $suscriptos["id"];
		}else{
			$insert_id = mysql_insert_id();
		}
	}	
}

if(isset($recuperar)){
	$sql = "SELECT * FROM suscriptos WHERE mail = '$mail' AND clave = '$clave'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)!=0){
		$row = mysql_fetch_array($result);
	}else{
		$mensaje = "Intente nuevamente.";
	}
}

######################## Formulario ########################
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<HTML><HEAD><TITLE>Newsletter</TITLE>
<META http-equiv= content="text/html; charset=iso-8859-1">
<META content="MSHTML 6.00.2800.1400" name=GENERATOR><META http-equiv="" content="text/html; charset=iso-8859-1">
<STYLE>
body,td,input,select,textarea{
	font-family:Verdana;
	font-size:11px;
}
</STYLE>
<SCRIPT language="JavaScript" src="../includes/javas.js"></SCRIPT>
<SCRIPT language="JavaScript">
	var controlarCampo = new Array;
	controlarCampo[0] = "suscriptos[nombre]";
	controlarCampo[1] = "suscriptos['apellido']";
	controlarCampo[2] = "suscriptos[mail]";
	controlarCampo[3] = "suscriptos[clave]";
</SCRIPT>
</HEAD>
<BODY bgColor=#000000 text="#FFCC66">
<center>
<? if(!isset($insert_id)){ ?>
<FORM name="t" method="post" action="" onSubmit="return envio(controlarCampo);">
  <TABLE border="0" cellpadding="1" cellspacing="1">
    <TR> 
      <TD colspan="2"> 
        <? if(isset($row)){ echo "Puede modificar sus datos si lo desea";
		}else{ ?>
        <IMG src="../img/trivia_participante_nuevo.gif" width="210" height="27" vspace="8"> 
        <? } ?>
      </TD>
    </TR>
    <INPUT type="hidden" name="suscriptos[id]" value="<? echo $row["id"] ?>">
    <TR> 
        <TD>&nbsp;&nbsp;Nombre*</TD>
      <TD> <INPUT type="text" name="suscriptos[nombre]" value="<? echo $row["nombre"] ?>"> 
      </TD>
    </TR>
    <TR> 
        <TD>&nbsp;&nbsp;Apellido*</TD>
      <TD><INPUT type="text" name="suscriptos[apellido]" value="<? echo $row["apellido"] ?>"></TD>
    </TR>
    <TR> 
        <TD>&nbsp;&nbsp;Mail*</TD>
      <TD><INPUT type="text" name="suscriptos[mail]" value="<? echo $row["mail"] ?>"></TD>
    </TR>
    <TR> 
        <TD>&nbsp;&nbsp;Clave*</TD>
      <TD><INPUT type="password" name="suscriptos[clave]" value="<? echo $row["clave"] ?>"></TD>
    </TR>
    <TR> 
      <TD>&nbsp;&nbsp;Direccion</TD>
      <TD><INPUT type="text" name="suscriptos[direccion]" value="<? echo $row["direccion"] ?>"></TD>
    </TR>
    <TR> 
      <TD colspan="2"><TABLE width="100%" border="0" cellspacing="1" cellpadding="1">
          <TR> 
              <TD colspan="2"> <BR>
                Seleccione el <B>Newsletter</B> al <BR>
              que se quiere suscribir. <BR>
                Newsletter de:</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="deporte" onClick="ct(this.value);"></TD>
            <TD width="100%">Deportes en geneal</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Deportear" onClick="ct(this.value);"></TD>
            <TD>Deportes de Argentina </TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Deportemx" onClick="ct(this.value);"></TD>
            <TD>Deportes de M&eacute;xico</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Deporteus" onClick="ct(this.value);"></TD>
            <TD>Deportes de USA</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Futbol" onClick="ct(this.value);"></TD>
            <TD>F&uacute;tbol general</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Futbolar" onClick="ct(this.value);"></TD>
            <TD>F&uacute;tbol de argentina</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Futbolmx" onClick="ct(this.value);"></TD>
            <TD> F&uacute;tbol de M&eacute;xico</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Tenis" onClick="ct(this.value);"></TD>
            <TD>Tenis</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Tenisar" onClick="ct(this.value);"></TD>
            <TD> Tenis de Argentina</TD>
          </TR>
        </TABLE>
          <BR>
          * Campos Obligatorios</TD>
    </TR>
    <TR> 
      <TD colspan="2" align="center"><INPUT type="hidden" name="suscriptos[fecha_creacion]" value="<? echo date("Y-m-d H:i:s")?>">
	  <INPUT type="submit" name="Submit" value="Enviar"></TD>
    </TR>
  </TABLE>
</FORM>
<? }else{ ?>
Muchas Gracias Por Suscribirce!!
<? } #del submit ?>


<? if(!isset($row) && $si_lo_permito == "si"){ ?>
<FORM name="t" method="post" action="">
  <TABLE border="0" cellpadding="1" cellspacing="1">
	<TR> 
	  <TD colspan="2">
	  <IMG src="../img/trivia_participante_registr.gif" width="182" height="27" vspace="8"><BR> 
		<STRONG><FONT color="#FF7E00">&nbsp;&nbsp;<? echo $mensaje ?></FONT></STRONG></TD>
	</TR>
	<TR> 
	  <TD>&nbsp;&nbsp;Mail</TD>
	  <TD align="center"><INPUT type="text" name="mail"></TD>
	</TR>
	<TR> 
	  <TD>&nbsp;&nbsp;Clave</TD>
	  <TD align="center"><INPUT type="password" name="clave"></TD>
	</TR>
	<TR> 
	  <TD>&nbsp;</TD>
	  <TD align="center"><INPUT type="submit" name="recuperar" value="Ingresar"></TD>
	</TR>
	<TR>
	  <TD>&nbsp;</TD>
	  <TD align="center">&nbsp;</TD>
	</TR>
  </TABLE>
</FORM>
<? } #del si esta seteado row ?>
</center>
</BODY>
</HTML>