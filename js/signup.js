
const $btnCancel = document.getElementById("btnCancel")


const $btnSubmit = document.getElementById("btnSubmit")
$btnSubmit.addEventListener("click", () => {
    const usuario = document.getElementById('username').value;
    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellido').value;
    const password = document.getElementById('password').value;
    const email = document.getElementById('email').value;

    const data = {usuario,nombre,apellido,password,email};

    fetch('crud.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .catch(error => {

    });

    console.log(data)

});


