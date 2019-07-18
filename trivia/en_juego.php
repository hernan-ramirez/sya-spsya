<FORM name="trivia" action="" method="post">

<INPUT type="hidden" name="insert_id" value="<? echo $insert_id ?>">

<?

if(!isset($nro_pregunta)){ $nro_pregunta = 0; }

if(is_array($respuesta)){

	while(list($id_pregunta,$id_respuesta) = each($respuesta)){

		$sql = "SELECT id FROM encuestas_respuestas WHERE id = $id_respuesta AND ck_correcta = 1";

		$result_v = mysql_query($sql);

		if(!isset($va_bien)){ $va_bien = "si"; }

		if(mysql_num_rows($result_v)!=0 && $va_bien == "si"){

			$va_bien = "si";

		}else{

			$va_bien = "no";

		}

		?><INPUT type="hidden" name="va_bien" value="<? echo $va_bien ?>"><?

	}

}

$sql = "SELECT * FROM trivias WHERE ck_activa=1";

$result_t = mysql_query($sql);

if(mysql_num_rows($result_t)!=0){ ##AA

while($row_t=mysql_fetch_array($result_t)){ ##AA

?>

<TABLE border="0" cellspacing="2" cellpadding="2">

  <TR>

	  <TD><strong><font color="#FF9900"><? echo $row_t["trivia"] ?></font></strong></TD>

  </TR>

<?

$sql = "SELECT * FROM encuestas_preguntas WHERE id_trivia=$row_t[id] ORDER BY orden LIMIT $nro_pregunta,1";

$result_p = mysql_query($sql);

if(mysql_num_rows($result_p)!=0){ ##BB

while($row_p=mysql_fetch_array($result_p)){ ##BB

?>

  <TR>

	  <TD><font color="#FFFFFF"><? echo $row_p["pregunta"] ?></font></TD>

  </TR>

<?

$sql = "SELECT * FROM encuestas_respuestas WHERE id_preguntas=$row_p[id] ORDER BY orden";

$result_r = mysql_query($sql);

if(mysql_num_rows($result_r)!=0){ ##CC

while($row_r=mysql_fetch_array($result_r)){ ##CC

?>

  <TR>

	<TD><INPUT type="radio" class="radio" name="respuesta[<? echo $row_p["id"] ?>]" value="<? echo $row_r["id"] ?>">

        <? echo $row_r["respuesta"] ?></TD>

  </TR>

<? }} ##CC ?>



  <TR>

	<TD><INPUT name="responde" type="submit" value="Esta es mi respuesta">

	<INPUT type="hidden" name="nro_pregunta" value="<? echo $nro_pregunta+1 ?>"></TD>

  </TR>

<? }}else{  ##BB ?>

  <TR>

	  <TD><strong><font color="#FF9900">Gracias por Participar de esta trivia</font></strong> 

        <BR>

        <? if($va_bien == "si"){ 

			mysql_query("INSERT INTO trivias_participantes (id_suscripto,id_trivia,ck_correcta)VALUES($insert_id,$row_t[id],1)");

			?>

        <font color="#FFFFFF"><BR>
Felicitaciones!.<BR>
Usted respondió BIEN a todas las preguntas y Ya! esta participando en el sorteo. 

        <? }else{ 

			mysql_query("INSERT INTO trivias_participantes (id_suscripto,id_trivia,ck_correcta)VALUES($insert_id,$row_t[id],0)");

			?>

        Usted no respondió bien a todas las preguntas. <BR>
Siga informandose en SportsYA y vuelva a intentarlo!

        <? } ?>

        </font> </TD>

  </TR>

<? } ##BB ?>

</TABLE>

  <? }}else{ ##AA ?>

  <font color="#FFFFFF">No hay trivia activa</font> 

  <? } ?>

</FORM>