let formCancelar = document.querySelector('#formCancelar');
let codigo = document.querySelector('#codigo');
let consultarFactura = document.querySelector('#consultar');
let cancelar = document.querySelector('#cancelarVenta');
let respuestaForm = document.querySelector('#respuesta');
let alertaForm = document.querySelector('#alertaForm');
let tablafactura = document.querySelector('#tablafactura');
let imprimirFactura = document.querySelector('#imprimir');



imprimirFactura.addEventListener('click', (e) => {
    e.preventDefault();
    imprimir();
})




function imprimir() {

    if (codigo.value === '' || codigo.value <= 0) {
        setTimeout(() => {
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
        datos.append("codigo", codigo.value);
        fetch('../recibirDatos.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(data => {
                if (!isNaN(data)) {
                    console.log(data);
                    formCancelar.submit();
                } else {
                    console.log(data);
                    setTimeout(() => {
                        respuestaForm.style.display = 'block';
                        respuestaForm.classList.remove('invisible');
                        alertaForm.textContent = `${data}`;
                        setTimeout(() => {
                            respuestaForm.style.display = 'none';
                            respuestaForm.classList.add('invisible');
                        }, 2000);
                    }, 100);
                }
            })
    }
};