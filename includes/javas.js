<!--
function abrirVentana(archivo, nombre, ancho, alto){
	window.open(archivo, nombre, 'top=30, left=150, width='+ ancho +',height='+ alto +',scrollbars=1,resizable=1');
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function envio(controlarCampos){
	enviar = true;
	for (var i=0; i<controlarCampos.length; i++){ // recorro los campos que asigno
		campo = eval("document.forms[0].elements['" + controlarCampos[i] + "']");		
		//alert(campo.type);
		if( campo.type == "select-one" ){
			//alert(campo.selectedIndex);
			if(campo.selectedIndex==0){
				alert("Olvidó seleccionar una opción en el campo " + campo.id);
				enviar = false;
			}
		}else if( campo.type == "select-multiple" ){			
			if(campo.selectedIndex==-1){
				alert("Olvidó seleccionar una opción en el campo " + campo.id);
				enviar = false;
			}
		}else if( campo.value == "" ){
			alert("Olvidó llenar el campo " + campo.id);
			enviar = false;
		}	

	} // del for para campos asignados

	if (enviar){ //enviar
//		document.forms[0].submit();
	}
	
	if (!enviar) {
		return false;
	}
		
} //fin de funcion
//-->