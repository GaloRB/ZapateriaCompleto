let inicioSesion = document.querySelector('#InicioSesion');
let form = document.querySelector('#form');
let usuario = document.querySelector('#usuario');
let password = document.querySelector('#password');
let respuestaForm = document.querySelector('#respuesta');
let alertaForm = document.querySelector('#alertaForm');


inicioSesion.addEventListener('click', (e) => {
    e.preventDefault();
    if (usuario.value === '' || password.value === '') {
        setTimeout(() => {
            respuestaForm.style.display = 'block';
            respuestaForm.classList.remove('invisible');
            alertaForm.textContent = 'Llena todos los campos';
            setTimeout(() => {
                respuestaForm.style.display = 'none';
                respuestaForm.classList.add('invisible');
            }, 2000);
        }, 100);
    } else {
        let datos = new FormData();
        datos.append("usuario", usuario.value);
        datos.append("password", password.value);
        fetch('recibirDatos.php', {
                method: 'POST',
                body: datos
            }).then(Response => Response.json())
            .then(({ data }) => {
                if (data === 1) {
                    console.log(data);
                    location.href = 'home.php';
                } else if (data === 2) {
                    location.href = 'inventarioUsuario.php';
                    console.log(data);
                } else {
                    setTimeout(() => {
                        respuestaForm.style.display = 'block';
                        respuestaForm.classList.remove('invisible');
                        console.log(data);
                        alertaForm.textContent = 'Datos Incorrectos';
                        setTimeout(() => {
                            respuestaForm.style.display = 'none';
                            respuestaForm.classList.add('invisible');
                        }, 2000);
                    }, 100);
                }
            });
    }

});