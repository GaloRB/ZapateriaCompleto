const contenido = document.querySelector('.contenido')
const btnGrabarTexto = document.querySelector('.btn-grabar')
    /* Primero creamos los objetos para poder grabar nuestra voz con el microfono */
const reconocimientoVoz = window.SpeechRecognition || window.webkitSpeechRecognition
const reconocimiento = new reconocimientoVoz()


/* Selector para leer texto */
const btnLeerTexto = document.querySelector('.btn-leer')

/* Fucnion para leer texto */
btnLeerTexto.addEventListener('click', () => {
    const locutor = new SpeechSynthesisUtterance()
    const voz = window.speechSynthesis
        /* console.log(texto.value) */
    locutor.text = 'Di tu palabra clave';
    voz.speak(locutor)
})

/* metodo que se ejecuta al empezar a granar */
reconocimiento.onstart = () => {
        contenido.innerHTML = 'Di tu palabra clave...'
    }
    /* Metodo que se ejecuta al terminar la grabación */
reconocimiento.onresult = event => {
    let mensaje = event.results[0][0].transcript
    contenido.innerHTML = 'Iniciadno Sesión...'
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
    } else if (mensaje.includes('Fanny')) {
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
    } else if (mensaje.includes('Gabriel')) {
        let datos = new FormData();
        datos.append("usuario", 'JuanGabriel');
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
    } else if (mensaje.includes('Ramón')) {
        let datos = new FormData();
        datos.append("usuario", 'Ramon');
        fetch('recibirVoz.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ data }) => {
                console.log(data);
                if (data === 2) {
                    location.href = 'inventarioUsuario.php';
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