const contenido = document.querySelector('.contenido')
const btnGrabarTexto = document.querySelector('.btn-grabar')
    /* Primero creamos los objetos para poder grabar nuestra voz con el microfono */
const reconocimientoVoz = window.SpeechRecognition || window.webkitSpeechRecognition
const reconocimiento = new reconocimientoVoz()
    /* metodo que se ejecuta al empezar a granar */
reconocimiento.onstart = () => {
        contenido.innerHTML = 'Di tu palabra clave...'
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
    if (mensaje.includes('galo')) {
        let datos = new FormData();
        datos.append("usuario", 'Galo');
        fetch('recibirVoz.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ data }) => {
                console.log(data);
                if (data === 1) {
                    location.href = 'home.php';
                }
            });
        voz.text = 'Sesión iniciada';
    } else if (mensaje.includes('estefania')) {
        let datos = new FormData();
        datos.append("usuario", 'Estefania');
        fetch('recibirVoz.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ data }) => {
                console.log(data);
                if (data === 1) {
                    location.href = 'home.php';
                }
            });
        voz.text = 'Sesión iniciada';
    } else if (mensaje.includes('ramon')) {
        let datos = new FormData();
        datos.append("usuario", 'Ramon');
        fetch('recibirVoz.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ data }) => {
                console.log(data);
                if (data === 1) {
                    location.href = 'home.php';
                }
            });
        voz.text = 'Sesión iniciada';
    } else {
        voz.text = 'No existe el usuario';
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