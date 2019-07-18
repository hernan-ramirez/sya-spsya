

<?

include $path."admin-me/especiales/common.inc.php";



if(isset($Submit) && is_array($suscriptos)){

	ejecutar("suscriptos");

	if($suscriptos["id"]!=""){

		$insert_id = $suscriptos["id"];

	}else{

		$insert_id = mysql_insert_id();

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

if(is_array($respuesta) || is_array($suscriptos)){
	$sql = "SELECT p.id 
	FROM trivias_participantes p
	LEFT JOIN trivias t ON(t.id = p.id_trivia)
	WHERE p.id_suscripto = $insert_id 
	AND t.ck_activa = 1";
	#echo $sql;
	$control = mysql_query($sql);

	if(mysql_num_rows($control)!=0){

		echo "Ya no tiene oportunidad de seguir participando";

	}else{

		require_once "en_juego.php";

	}

}else{



if(isset($del_id)){

	mysql_query("DELETE FROM estructura WHERE id=".$del_id);

}

########### Formulario ############

?>
<FORM name="t" method="post" action="">
<TABLE width="210" border="0" align="left" cellpadding="1" cellspacing="1">
  <TR>
	<TD colspan="2">
	<? if(isset($row)){ echo "Puede modificar sus datos si lo desea";
	}else{ ?><IMG src="../img/trivia_participante_nuevo.gif" width="210" height="27" vspace="8"><? } ?></TD>
  </TR>
	<INPUT type="hidden" name="suscriptos[id]" value="<? echo $row["id"] ?>">
	<TR> 
	  <TD>&nbsp;&nbsp;Nombre</TD>
	  <TD> <INPUT type="text" name="suscriptos[nombre]" value="<? echo $row["nombre"] ?>"> 
	  </TD>
	</TR>
	<TR> 
	  <TD>&nbsp;&nbsp;Apellido</TD>
	  <TD><INPUT type="text" name="suscriptos[apellido]" value="<? echo $row["apellido"] ?>"></TD>
	</TR>
	<TR> 
	  <TD>&nbsp;&nbsp;Mail</TD>
	  <TD><INPUT type="text" name="suscriptos[mail]" value="<? echo $row["mail"] ?>"></TD>
	</TR>
	<TR> 
	  <TD>&nbsp;&nbsp;Clave</TD>
	  <TD><INPUT type="password" name="suscriptos[clave]" value="<? echo $row["clave"] ?>"></TD>
	</TR>
	<TR> 
	  <TD>&nbsp;&nbsp;Direccion</TD>
	  <TD><INPUT type="text" name="suscriptos[direccion]" value="<? echo $row["direccion"] ?>"></TD>
	</TR>
	<TR> 
	  <TD>&nbsp;</TD>
	  <TD align="center"><INPUT type="submit" name="Submit" value="Enviar"></TD>
	</TR>
  </TABLE>

</FORM>

<? if(!isset($row)){ ?>

		<P>&nbsp;</P>

<FORM name="t" method="post" action="">

  <TABLE border="0" align="center" cellpadding="1" cellspacing="1">
	<TR> 
	  <TD colspan="2"><IMG src="../img/trivia_participante_registr.gif" width="182" height="27" vspace="8"><BR> 
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

<? } #del submit ?>