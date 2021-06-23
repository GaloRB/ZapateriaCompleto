let venta = document.querySelector('#venta');
let clave = document.querySelector('#clave');
let unidades = document.querySelector('#unidades');
let respuestaForm = document.querySelector('#respuesta');
let alertaForm = document.querySelector('#alertaForm');
let costo = document.querySelector('#costo');
let costoForm = document.querySelector('#costoForm');
let aceptarVenta = document.querySelector('#aceptarVenta');
let formVenta = document.querySelector('#formVenta');


venta.addEventListener('click', (e) => {
    e.preventDefault();
    validarVenta();


});

function validarVenta() {
    if (clave.value === '' || clave.value <= 0 || unidades.value === '' || unidades.value <= 0) {
        setTimeout(() => {
            aceptarVenta.classList.add('invisible');
            costo.style.display = 'none';
            respuestaForm.style.display = 'block';
            respuestaForm.classList.remove('invisible');
            alertaForm.textContent = 'Llena todos los campos correctamente';
            setTimeout(() => {
                respuestaForm.style.display = 'none';
                respuestaForm.classList.add('invisible');
            }, 2000);
        }, 100);
    } else {
        let datos = new FormData();
        datos.append("clave", clave.value);
        datos.append("unidades", unidades.value);
        fetch('../recibirDatos.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(data => {

                console.log(data);
                if (!isNaN(data)) {
                    let precio = data * unidades.value;
                    let precioFinal = parseFloat(Math.round(precio * 100) / 100).toFixed(2);
                    aceptarVenta.classList.remove('invisible');
                    costo.style.display = 'block';
                    costo.classList.remove('invisible');
                    costoForm.textContent = `El Total de la venta es de: $${precioFinal}`;

                } else {
                    setTimeout(() => {
                        aceptarVenta.classList.add('invisible');
                        costo.style.display = 'none';
                        respuestaForm.style.display = 'block';
                        respuestaForm.classList.remove('invisible');
                        alertaForm.textContent = `Error: ${data}`;
                        setTimeout(() => {
                            respuestaForm.style.display = 'none';
                            respuestaForm.classList.add('invisible');
                        }, 2000);
                    }, 100);

                }

            })
    }
}


aceptarVenta.addEventListener('click', (e) => {
    e.preventDefault();

    let datosVenta = new FormData;
    datosVenta.append("clave", clave.value);
    datosVenta.append("unidades", unidades.value);
    fetch('../recibirDatosVenta.php', {
            method: 'POST',
            body: datosVenta
        }).then(ResponseV => ResponseV.json())
        .then(dataVenta => {
            console.log(dataVenta);
            Swal.fire({
                icon: 'success',
                title: `Venta con codigo No. ${dataVenta} generada con exito`,
                showConfirmButton: true,

            })
            formVenta.reset();
            aceptarVenta.classList.add('invisible');
            costo.style.display = 'none';
            respuestaForm.style.display = 'none';
            respuestaForm.classList.remove('invisible');
        })
});