const contenidoM = document.querySelector('.contenidoM')
const btnGrabarTextoM = document.querySelector('.btn-grabarM')
    /* Primero creamos los objetos para poder grabar nuestra voz con el microfono */
const reconocimientoVozM = window.SpeechRecognition || window.webkitSpeechRecognition
const reconocimientoM = new reconocimientoVozM()

/* Selector para leer texto */
const btnLeerTextoM = document.querySelector('.btn-leerM')

/* Fucnion para leer texto */
btnLeerTextoM.addEventListener('click', () => {
    const locutorM = new SpeechSynthesisUtterance()
    const vozM = window.speechSynthesis
        /* console.log(texto.value) */
    locutorM.text = 'Di la marca del producto que deseas busacar';
    vozM.speak(locutorM)
})


/* metodo que se ejecuta al empezar a granar */
reconocimientoM.onstart = () => {
        contenido.innerHTML = 'Di la marca del producto que deseas buscar...'
    }
    /* Metodo que se ejecuta al terminar la grabación */
reconocimientoM.onresult = event => {
    let mensaje = event.results[0][0].transcript
    contenido.innerHTML = mensaje
    leerTextoCondicionadoM(mensaje)
}

btnGrabarTextoM.addEventListener('click', () => {
    btnGrabarTextoM.style.display = 'none';

})

/* Función que se lanza para locutar lo grabado */
const leerTextoSimpleM = (mensaje) => {
        const vozM = new SpeechSynthesisUtterance()
        vozM.text = mensaje
        window.speechSynthesis.speak(vozM)
    }
    /* Función que condiciona la respuesta dependiendo de el contenido de la grabación */
const leerTextoCondicionadoM = (mensaje) => {
    const vozM = new SpeechSynthesisUtterance()
    if (mensaje.includes('Vans')) {
        let datos = new FormData();
        datos.append("marca", 'Vans');
        fetch('recibirDatosMarca.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then((Response) => {
                console.log(Response);
                console.log(Response[0][2])
                if (Response) {
                    location.href = 'includes/disponiblesVozMMarca.php?product=Zapato';
                }
            });
        vozM.text = 'Mostradno zapatos disponibles';
    } else if (mensaje.includes('Levis')) {
        let datos = new FormData();
        datos.append("marca", 'Levis');
        fetch('recibirDatosMarca.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then((Response) => {
                console.log(Response);
                console.log(Response[0][2])
                if (Response) {
                    location.href = 'includes/disponiblesVozMMarca.php?product=Tennis';
                }
            });
        vozM.text = 'Mostradno los tenis disponibles';
    } else if (mensaje.includes('farfetch')) {
        let datos = new FormData();
        datos.append("marca", 'Farfetch');
        fetch('recibirDatosMarca.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then((Response) => {
                console.log(Response);
                console.log(Response[0][2])
                if (Response) {
                    location.href = 'includes/disponiblesVozMMarca.php?product=Zapatillas';
                }
            });
        vozM.text = 'Mostradno las zapatillas disponibles';
    } else {
        vozM.text = 'No hay esa marca en el inventario';
    }
    window.speechSynthesis.speak(vozM)
}


/* Evento para empezar a grabar pulsado el boton */
btnGrabarTextoM.addEventListener('click', () => {
    reconocimientoM.start()
})