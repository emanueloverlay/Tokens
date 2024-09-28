// Función para iniciar sesión y generar el token (POST)
function postLogin(data) {

    const tokenDisplay = document.getElementById('tokenDisplay');

    fetch('./app/Controllers/TokenController.php', {
        method: 'POST',
        body: data
    })
    .then(response => response.json())
    .then(data => {
        if (data.token) {
            tokenDisplay.innerHTML = 'Token recibido: ' + data.token;
        } else {
            tokenDisplay.innerHTML = data.error || 'Error';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Función para verificar un token (GET)
function getVerifyToken(token) {

    const verificationDisplay = document.getElementById('verificationDisplay');

    fetch('./app/Controllers/TokenController.php', {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token 
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            verificationDisplay.innerHTML = data.message + ', usuario: ' + data.username;
        } else {
            verificationDisplay.innerHTML = data.error || 'Error al verificar el token';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Evento para llamar a la funciòn postLogin desde el formulario.
document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(e.target);

    postLogin(formData);
});

// Evento para llamar a la funciòn getVerifyToken desde el btn.
document.getElementById('verifyTokenButton').addEventListener('click', function (e) {
    e.preventDefault();

    const token = document.getElementById('tokenInput').value;
    
    if (token) {
        getVerifyToken(token);
    } else {
        verificationDisplay.innerHTML = 'Por favor, ingresa un token.';
    }
});