<table width="468" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td><img src="<? echo $path ?>img/spacer.gif" height="3"></td>
  </tr>
<!-- 
<tr> 
	<td><a href="javascript:abrirVentana('../trivia/index.php','trivia',511,511);""><img src="/clipart/banners/2.gif" border="0"></a></td>
</tr>
-->
</table>
<table width="468" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td valign="top" class="NoticiaSecundaria"> 
      <?
		$sql = "SELECT n.*, f.archivo_imagen, p.pais, d.deporte FROM noticias n
		LEFT JOIN fotos f ON (n.id_foto = f.id)
		LEFT JOIN paises p ON (n.id_pais = p.id)
		LEFT JOIN deportes d ON (n.id_deporte = d.id)
		LEFT JOIN publicaciones pu ON (pu.id_publicado = n.id)
		WHERE pu.id_seccion = 2
		AND pu.id_lista_tablas = 40 
		AND pu.id_estructura = $id_estruc
		ORDER by posicion";
	
			$result = mysql_query ($sql);
			if(mysql_num_rows($result)!=0){
			while ($row = mysql_fetch_array($result)){
	
	?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td class="small">
		  <TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
              <TR> 
                <TD><? echo $row["pais"] ?> | <b><? echo $row["deporte"] ?></b></TD>
                <TD align="right"><FONT color="#999999" size="1"><img src="<? echo $path ?>img/icono_time.gif" border="0"><? echo timepoLectura($row["cuerpo"]) ?></FONT></TD>
              </TR>
            </TABLE> 
             </td>
        </tr>
        <tr> 
          <td class="TitleSec"><a href="javascript:abrirVentana('/welcome/popup.php?id_not=<? echo $row["id"] ?>','<? echo $row["id"] ?>',520,350);"><? echo $row["titulo"] ?></a></td>
        </tr>
        <tr> 
          <td valign="middle" class="text_sec"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="<? echo $path ?>img/spacer.gif" width="1" height="73" border="0" align="right"><? echo cortaCadena($row["copete"], 119); ?>
                </td>
                <td width="88"><IMG src="<? echo $path ?>clipart/dimensionar.php?imagen=imagen/<? echo $row["archivo_imagen"] ?>&ancho=88&marca_de_agua=no" hspace="2" vspace="0" border="1"></td>
              </tr>
            </table>
            
          </td>
        </tr>
        <tr> 
          <td class="Dashed"><img src="<? echo $path ?>img/spacer.gif"></td>
        </tr>
      </table>
      <?
			} 
		}	
		?>
    </td>
    <td HEIGHT="110" valign="top" class="NoticiaTerciaria"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <?
					$sql = "SELECT n.*, f.archivo_imagen, p.pais, d.deporte FROM noticias n
					LEFT JOIN fotos f ON (n.id_foto = f.id)
					LEFT JOIN paises p ON (n.id_pais = p.id)
					LEFT JOIN deportes d ON (n.id_deporte = d.id)
					LEFT JOIN publicaciones pu ON (pu.id_publicado = n.id)
					WHERE pu.id_seccion = 3
					AND pu.id_lista_tablas = 40 
					AND pu.id_estructura = $id_estruc
					ORDER by posicion";
					
					$result = mysql_query ($sql);
					if(mysql_num_rows($result)!=0){
						while ($row = mysql_fetch_array($result)){
				?>
        <tr> 
          <td class="small"><? echo $row["pais"] ?> | <b><? echo $row["deporte"] ?></b></td>
        </tr>
        <tr> 
          <td height="20"><img src="<? echo $path ?>img/spacer.gif" width="1" height="30" border="0" align="right"><a href="javascript:abrirVentana('/welcome/popup.php?id_not=<? echo $row["id"] ?>','<? echo $row["id"] ?>',520,350);""><? echo $row["titulo"] ?></a><br> 
          </td>
        </tr>
        <tr> 
          <td class="text_sec"> 
            <img src="<? echo $path ?>img/spacer.gif" width="1" height="64" border="0" align="right"><? 
							if( strlen($row["copete"]) > 80 ){
							echo substr($row["copete"],0,80). "...";
							}else{
							echo $row["copete"];
							}
						?>
          </td>
        </tr>
        <tr> 
          <td class="Dashed"><img src="<? echo $path ?>img/spacer.gif"></td>
        </tr>
        <?
					} 
				}	
				?>
      </table></td>
  </tr>
</table>