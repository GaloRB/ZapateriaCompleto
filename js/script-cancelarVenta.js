let cancelarVenta = document.querySelector('#cancelarVenta');
let producto = document.querySelector('#producto');
let unidades = document.querySelector('#unidades');

cancelarVenta.addEventListener('click', (e) => {
    e.preventDefault();
    console.log('sii');
    devolucion();
})


function devolucion() {

    let datos = new FormData();
    datos.append("producto", producto.value);
    datos.append("unidades", unidades.value);
    fetch('../p.php', {
            method: 'POST',
            body: datos
        }).then(Response => Response.json())
        .then(data => {

            console.log(data);
        })

}