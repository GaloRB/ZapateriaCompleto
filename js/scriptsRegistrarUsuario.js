let registrar = document.querySelector('#registrar');
let nombre = document.querySelector('#nombre');
let password = document.querySelector('#password');
let tipoUsuario = document.querySelector('#tipoUsuario');
let respuestaForm = document.querySelector('#answer');
let alertaForm = document.querySelector('#alertForm');



registrar.addEventListener('click', (e) => {
    e.preventDefault();

    console.log('funcoina');
    if (nombre.value === '' || password.value === '' || tipoUsuario.value == 2) {
        setTimeout(() => {
            respuestaForm.classList.remove('none');
            respuestaForm.classList.remove('invisible');
            alertaForm.textContent = 'Llena todos los campos';
            setTimeout(() => {
                respuestaForm.classList.add('none');
                respuestaForm.classList.add('invisible');
            }, 2000);
        }, 100);
    } else {
        let datos = new FormData();
        datos.append("nombre", nombre.value);
        datos.append("password", password.value);
        datos.append("tipoUsuario", tipoUsuario.value);
        let tipo = tipoUsuario.value == 1 ? 'Administrador' : 'Usuario';


        fetch('Usuario.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ data }) => {
                console.log(data);
                if (data === 1) {
                    Swal.fire({
                        icon: 'success',
                        title: `El usuario ${nombre.value} de tipo ${tipo} fue registrado con exito`,
                    }).then(function() {
                        window.location = "../includes/usuarios.php";
                    });

                } else if (data === 2) {
                    console.log(data);
                    Swal.fire({
                        icon: 'error',
                        title: `El usuario ${nombre.value} ya existe, elije otro nombre de usuario.`,

                    });
                } else {
                    setTimeout(() => {
                        respuestaForm.classList.remove('none');
                        respuestaForm.classList.remove('invisible');
                        console.log(data);
                        alertaForm.textContent = 'Datos Incorrectos';
                        setTimeout(() => {
                            respuestaForm.classList.add('none');
                            respuestaForm.classList.add('invisible');
                        }, 2000);
                    }, 100);
                }
            });
    }
})