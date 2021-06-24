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
    locutor.text = 'Di la categoría del producto que deseas busacar';
    voz.speak(locutor)
})


/* metodo que se ejecuta al empezar a granar */
reconocimiento.onstart = () => {
        contenido.innerHTML = 'Di la categoría del producto que deseas busacar...'
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
    if (mensaje.includes('zapatos')) {
        let datos = new FormData();
        datos.append("producto", 'Zapato');
        fetch('../recibirDatos.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then((Response) => {
                console.log(Response);
                console.log(Response[0][2])
                if (Response) {
                    location.href = '../includes/disponiblesVozUser.php?product=Zapato';
                }
            });
        voz.text = 'Mostradno zapatos disponibles';
    } else if (mensaje.includes('tenis')) {
        let datos = new FormData();
        datos.append("producto", 'Tennis');
        fetch('../recibirDatos.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then((Response) => {
                console.log(Response);
                console.log(Response[0][2])
                if (Response) {
                    location.href = '../includes/disponiblesVozUser.php?product=Tennis';
                }
            });
        voz.text = 'Mostradno los tenis disponibles';
    } else if (mensaje.includes('zapatillas')) {
        let datos = new FormData();
        datos.append("producto", 'Zapatillas');
        fetch('../recibirDatos.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then((Response) => {
                console.log(Response);
                console.log(Response[0][2])
                if (Response) {
                    location.href = '../includes/disponiblesVozUser.php?product=Zapatillas';
                }
            });
        voz.text = 'Mostradno las zapatillas disponibles';
    } else {
        voz.text = 'No hay producto con esa categoria';
    }
    window.speechSynthesis.speak(voz)
}


/* Evento para empezar a grabar pulsado el boton */
btnGrabarTexto.addEventListener('click', () => {
    reconocimiento.start()
})