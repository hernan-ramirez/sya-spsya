<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="BackMenuZone">
<form name="buscar" action="../busquedas/index.php" method="post">
		  <tr> 
			<td> <input name="palabra_buscada" type="text" style="width:100px" value="<? if(isset($palabra_buscada)){echo $palabra_buscada;}else{ echo 'Buscar';} ?>" onClick="javascript:this.value='';"> 
			</td>
			<td><a href="javascript:document.buscar.submit();"><img src="<? echo $path ?>img/ir.gif" width="25" height="19" border="0"></a></td>
		  </tr>
</form>
</table>

