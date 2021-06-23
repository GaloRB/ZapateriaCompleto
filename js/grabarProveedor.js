const contenido = document.querySelector('.contenido')
const btnGrabarTexto = document.querySelector('.btn-grabar')
    /* Primero creamos los objetos para poder grabar nuestra voz con el microfono */
const reconocimientoVoz = window.SpeechRecognition || window.webkitSpeechRecognition
const reconocimiento = new reconocimientoVoz()
    /* metodo que se ejecuta al empezar a granar */
reconocimiento.onstart = () => {
        contenido.innerHTML = 'Di el nombre el proveedo que buscas...'
    }
    /* Metodo que se ejecuta al terminar la grabación */
reconocimiento.onresult = event => {
    let mensaje = event.results[0][0].transcript
    contenido.innerHTML = 'Realizando busqueda...'
    leerTextoCondicionado(mensaje)
}

btnGrabarTexto.addEventListener('click', () => {
    btnGrabarTexto.style.display = 'none';

})

/* Función que se lanza para locutar lo grabado */
const leerTextoSimple = (mensaje) => {
        const voz = new SpeechSynthesisUtterance()
        voz.text = mensaje
        window.speechSynthesis.speak(voz)
    }
    /* Función que condiciona la respuesta dependiendo de el contenido de la grabación */
const leerTextoCondicionado = (mensaje) => {
    const voz = new SpeechSynthesisUtterance()
    if (mensaje.includes('Vans')) {
        let datos = new FormData();
        datos.append("proveedor", 'Vans');
        fetch('recibirDatosProveedor.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then((Response) => {
                console.log(Response);
                console.log(Response[0][2])
                if (Response) {
                    location.href = 'includes/proveedoresVoz.php?proveedor=Vans';
                }
            });
        voz.text = 'Mostradno datos de proveedor';
    } else if (mensaje.includes('Levis')) {
        let datos = new FormData();
        datos.append("proveedor", 'Levis');
        fetch('recibirDatosProveedor.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then((Response) => {
                console.log(Response);
                console.log(Response[0][2])
                if (Response) {
                    location.href = 'includes/proveedoresVoz.php?proveedor=Levis';
                }
            });
        voz.text = 'Mostradno datos de proveedor';
    } else if (mensaje.includes('farfetch')) {
        let datos = new FormData();
        datos.append("proveedor", 'Levis');
        datos.append("proveedor", 'Farfetch');
        fetch('recibirDatosProveedor.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then((Response) => {
                console.log(Response);
                console.log(Response[0][2])
                if (Response) {
                    location.href = 'includes/proveedoresVoz.php?proveedor=Farfetch';
                }
            });
        voz.text = 'Mostradno datos de proveedor';
    } else {
        voz.text = 'No hay proveedor registrado con ese nombre';
    }
    window.speechSynthesis.speak(voz)
}

// funion fetch para enviar los datos y consultar a la base
function enviarDatosParaConsulta(product) {
    let datos = new FormData();
    datos.append("producto", 'Zapato');
    fetch('recibirDatos.php', {
            method: 'POST',
            body: datos
        }).then(Response => Response.json())
        .then((Response) => {
            console.log(Response);
            console.log(Response[0][2])
            if (Response) {
                location.href = 'includes/disponiblesVoz.php?product=Zapato';
            }
        });
}
/* Evento para empezar a grabar pulsado el boton */
btnGrabarTexto.addEventListener('click', () => {
    reconocimiento.start()
})