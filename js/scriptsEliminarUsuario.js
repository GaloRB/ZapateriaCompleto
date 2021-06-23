let eliminar = document.querySelector('#eliminar');
let usuario = document.querySelector('#usuario');
let respuestaForm = document.querySelector('#answer');
let alertaForm = document.querySelector('#alertForm');



eliminar.addEventListener('click', (e) => {
    e.preventDefault();

    console.log('funcoina');
    if (usuario.value == 2) {
        setTimeout(() => {
            respuestaForm.classList.remove('none');
            respuestaForm.classList.remove('invisible');
            alertaForm.textContent = 'Elije un usuario';
            setTimeout(() => {
                respuestaForm.classList.add('none');
                respuestaForm.classList.add('invisible');
            }, 2000);
        }, 100);
    } else {
        let datos = new FormData();
        datos.append("usuario", usuario.value);

        fetch('Usuario.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ data }) => {
                console.log(data);
                if (data === 1) {
                    Swal.fire({
                        icon: 'success',
                        title: `El usuario ${usuario.options[usuario.selectedIndex].innerText} fue eliminado con exito`,
                    }).then(function() {
                        window.location = "usuarios.php";
                    });

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: `El usuario ${usuario.value} no se pudo eliminar, contacte al administrador del sistema.`,
                    });
                }
            });
    }
})