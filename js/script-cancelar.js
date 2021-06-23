let formCancelar = document.querySelector('#formCancelar');
let codigo = document.querySelector('#codigo');
let consultarFactura = document.querySelector('#consultar');
let cancelar = document.querySelector('#cancelarVenta');
let respuestaForm = document.querySelector('#respuesta');
let alertaForm = document.querySelector('#alertaForm');
let tablafactura = document.querySelector('#tablafactura');
let imprimirFactura = document.querySelector('#imprimir');


consultarFactura.addEventListener('click', (e) => {
    e.preventDefault();
    cancelarVenta();
});

imprimirFactura.addEventListener('click', (e) => {
    e.preventDefault();

})




function cancelarVenta() {

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
        formCancelar.submit();

    }
};