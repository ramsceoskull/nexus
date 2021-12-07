const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const textarea = document.querySelectorAll('#formulario textarea');

const expresiones = {
	titulo: /^[a-zA-Z0-9\_\- ]{2,255}$/,
	marca: /^[a-zA-Z0-9\_\- ]{2,255}$/, 
	plataforma: /^[a-zA-Z0-9\_\- ]{2,255}$/,  
	precio: /^[0-9]+([.])?([0-9]+)?$/,
}

const campos = {
	titulo: false,
	precio: false,
	marca: false,
	plataforma: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "titulo":
			validarCampo(expresiones.titulo, e.target, 'titulo');
		break;
		case "precio":
			validarCampo(expresiones.precio, e.target, 'precio');
		break;
		case "marca":
			validarCampo(expresiones.marca, e.target, 'marca');
		break;
		case "plataforma":
			validarCampo(expresiones.marca, e.target, 'plataforma');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}


inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

textarea.forEach((textarea) => {
	textarea.addEventListener('keyup', validarFormulario);
	textarea.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	if(!campos.titulo && !campos.descripcion && !campos.precio && !campos.marca){
		e.preventDefault();
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});