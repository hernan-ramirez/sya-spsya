<? 
$path = "../";
require_once $path."common/conexion.php";
include $path."common/_fnc_especiales.inc.php";

if(isset($Submit) && is_array($suscriptos)){
	if($dia!="" && $mes!="" && $anio!=""){
		$suscriptos["fecha_nacimiento"] = $anio . "-" . $mes . "-" . $dia;
	}
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
	controlarCampo[1] = "suscriptos[apellido]";
	controlarCampo[2] = "suscriptos[mail]";
	controlarCampo[3] = "suscriptos[clave]";
</SCRIPT>
</HEAD>
<BODY bgColor=#000000 text="#FFFFFF">
<center>
<? if(!isset($insert_id) && !isset($suscriptos["id"])){ ?>
<FORM name="t" method="post" action="" onSubmit="return envio(controlarCampo);">
  <TABLE width="210" border="0" cellpadding="1" cellspacing="1">
    <TR> 
      <TD colspan="2" align="center"> 
        <? if(isset($row)){ echo "<B>Puede modificar sus datos si lo desea</B><BR><BR>";
		}else{ ?>
        <IMG src="../img/registro.gif" width="210" height="27" vspace="8"> 
        <? } ?>
      </TD>
    </TR>
    <INPUT type="hidden" name="suscriptos[id]" value="<? echo $row["id"] ?>">
    <TR> 
        <TD>Nombre<FONT color="#FF9900">*</FONT></TD>
      <TD> <INPUT type="text" name="suscriptos[nombre]" id="Nombre" value="<? echo $row["nombre"] ?>"> 
      </TD>
    </TR>
    <TR> 
        <TD>Apellido<FONT color="#FF9900">*</FONT></TD>
      <TD><INPUT type="text" name="suscriptos[apellido]" id="Apellido" value="<? echo $row["apellido"] ?>"></TD>
    </TR>
    <TR> 
        <TD>Sexo</TD>
      <TD><SELECT name="suscriptos[sexo]">
            <OPTION value="M"<? if($row["sexo"]=="M"){echo " selected";}?>>Masculino</OPTION>
            <OPTION value="F"<? if($row["sexo"]=="F"){echo " selected";}?>>Femenino</OPTION>
          </SELECT></TD>
    </TR>
    <TR> 
        <TD>Fecha Nacimiento</TD>
      <TD nowrap><SELECT name="dia">
            <OPTION value="">&nbsp;</OPTION>
            <? for($d=1;$d<=31;$d++){ ?>
            <OPTION value="<? echo $d ?>"<? if( $d == substr($row["fecha_nacimiento"],8,2) ){echo " selected";}?>><? echo $d ?></OPTION>
            <? } ?>
          </SELECT> <SELECT name="mes">
            <OPTION value="">&nbsp;</OPTION>
            <? for($m=1;$m<=12;$m++){ ?>
            <OPTION value="<? echo $m ?>"<? if ($m==substr($row["fecha_nacimiento"],5,2)){echo " selected";}?>><? echo $m ?></OPTION>
            <? } ?>
          </SELECT> <SELECT name="anio">
            <OPTION value="">&nbsp;</OPTION>
            <? for($a=date("Y")-90;$a<=date("Y")-5;$a++){ ?>
            <OPTION value="<? echo $a ?>"<? if ($a==substr($row["fecha_nacimiento"],0,4)){echo " selected";}?>><? echo $a ?></OPTION>
            <? } ?>
          </SELECT></TD>
    </TR>
    <TR> 
        <TD>Mail<FONT color="#FF9900">*</FONT></TD>
      <TD><INPUT type="text" name="suscriptos[mail]" id="Mail" value="<? echo $row["mail"] ?>"></TD>
    </TR>
    <TR> 
        <TD>Clave<FONT color="#FF9900">*</FONT></TD>
      <TD><INPUT type="password" name="suscriptos[clave]" id="Clave" value="<? echo $row["clave"] ?>"></TD>
    </TR>
    <TR> 
      <TD>Direccion</TD>
      <TD><INPUT type="text" name="suscriptos[direccion]" value="<? echo $row["direccion"] ?>"></TD>
    </TR>
    <TR> 
      <TD>Pais</TD>
      <TD><SELECT name="suscriptos[id_pais]" style="width:100%">
                <OPTION>Pais..</OPTION>
                <?
######################### DESPLIEGO PAISES ########################
			$sql = "SELECT * FROM paises ORDER BY pais";
			$result_p = mysql_query($sql);
			if(mysql_num_rows($result_p)!=0){
				while($row_p=mysql_fetch_array($result_p)){
				?>
                <OPTION value="<? echo $row_p["id"] ?>"<? if($row["id_pais"]==$row_p["id"]){echo " SELECTED";}?>><? echo $row_p["pais"] ?></OPTION>
                <?
				}
			} 
			?>
              </SELECT></TD>
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
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="deporte" ></TD>
            <TD width="100%">Deportes en geneal</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Deportear" ></TD>
            <TD>Deportes de Argentina </TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Deportemx" ></TD>
            <TD>Deportes de M&eacute;xico</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Deporteus" ></TD>
            <TD>Deportes de USA</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Futbol" ></TD>
            <TD>F&uacute;tbol general</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Futbolar" ></TD>
            <TD>F&uacute;tbol de argentina</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Futbolmx" ></TD>
            <TD> F&uacute;tbol de M&eacute;xico</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Tenis" ></TD>
            <TD>Tenis</TD>
          </TR>
          <TR> 
            <TD><INPUT type="radio" name="suscriptos[newsletter]" value="Tenisar" ></TD>
            <TD> Tenis de Argentina</TD>
          </TR>
        </TABLE>
          <BR>
          <FONT color="#FF9900">* Campos Obligatorios</FONT>
		  <? if(isset($row["newsletter"]) && $row["newsletter"]!=""){ ?>
		  <SCRIPT language="JavaScript">
		  ob = document.forms[0].elements['suscriptos[newsletter]'];
		  for(i=0; i<ob.length; i++){
		  	if(ob[i].value=="<? echo $row['newsletter']?>"){ ob[i].status = true; }
		  }
		  </SCRIPT>
		  <? } ?>
		  </TD>
    </TR>
    <TR> 
      <TD colspan="2" align="center"><INPUT type="hidden" name="suscriptos[fecha_creacion]" value="<? echo date("Y-m-d H:i:s")?>">
	  <INPUT type="submit" name="Submit" value="Enviar"></TD>
    </TR>
  </TABLE>
</FORM>
  <? }elseif($suscriptos["id"]!=""){ ?>
  <b> Su actualizaci&oacute;n de datos<BR>
  se ha completado con &eacute;xito.<BR>
  </b> 
  <? }else{ ?>
  <b> Su suscripci&oacute;n se ha completado<br>
  con &eacute;xito.</b> 
  <? } #del submit ?>
  <? if(!isset($row)){ ?>
  <FORM name="t" method="post" action="">
  <TABLE border="0" cellpadding="1" cellspacing="1">
	<TR> 
	  <TD colspan="2">
	  <IMG src="../img/trivia_participante_registr.gif" width="182" height="27" vspace="8"><BR> 
		<STRONG><FONT color="#FF7E00">&nbsp;&nbsp;<? echo $mensaje ?></FONT></STRONG></TD>
	</TR>
	<TR> 
	  <TD>Mail</TD>
	  <TD align="center"><INPUT type="text" name="mail"></TD>
	</TR>
	<TR> 
	  <TD>Clave</TD>
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