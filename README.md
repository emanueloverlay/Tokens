<h1 align="center">Autenticación con Token en PHP</h1>

<p align="center">
    Este mini proyecto implementa un sistema de autenticación simple usando tokens en PHP. 
    Permite la generación de tokens con un tiempo de expiración y su verificación para controlar el acceso a rutas protegidas.
</p>

---

<h2>📋 Descripción</h2>

<p>
    Este proyecto ofrece una implementación básica de autenticación basada en tokens usando PHP puro. La idea principal es permitir que un usuario inicie sesión y reciba un token que podrá utilizar para acceder a rutas protegidas mientras el token siga siendo válido. El token incluye una firma HMAC para asegurar la integridad de los datos y un campo de expiración que invalida el token luego del periodo de tiempo configurado.
</p>

---

<h2>📂 Estructura del Proyecto</h2>

<ul>
    <li><strong>index.html</strong>: Interfaz Forntend para iniciar sesión y verificar el token.</li>
    <li><strong>token.js</strong>: Archivo JavaScript que maneja las solicitudes al servidor para autenticar y verificar tokens.</li>
    <li><strong>./app/Models/Token.php</strong>: Lógica programada en PHP para generar y verificar tokens.</li>
    <li><strong>./app/Controllers/TokenController.php</strong>: Controlador que maneja las peticiones POST para login y GET para verificación del token.</li>
</ul>

---

<h2>🚀 Tecnologías Utilizadas</h2>

<ul>
    <li><strong>PHP</strong></li>
    <li><strong>HTML</strong></li>
    <li><strong>JavaScript</strong></li>
    <li><strong>CSS</strong></li>
  
</ul>

---

<h2>📦 Instalación</h2>

<ol>
    <li>Clonar este repositorio en tu servidor local:
        <pre><code>git clone https://github.com/emanueloverlay/TokensPHP.git</code></pre>
    </li>
    <li>Acceder a <code>index.html</code> en el navegador para iniciar la aplicación.</li>
</ol>

---

<h2>⚙️ Uso</h2>

<p>Este proyecto permite realizar dos acciones principales:</p>

<h3>1. Iniciar Sesión</h3>
<ul>
    <li>Mediante el formulario de login, se puede roporcionar un nombre de usuario y contraseña en <code>index.html</code>.</li>
    <li>Si las credenciales son válidas, se recibirá un token que se mostrará en la página.</li>
</ul>

<h3>2. Verificar Token</h3>
<ul>
    <li>En la sección de verificación de token, ingresar el token generado previamente.</li>
    <li>Si el token es válido y no ha expirado, se mostrará un mensaje indicando que el acceso es permitido y el nombre del usuario.</li>
</ul>

---

<h2>📖 Explicación Técnica</h2>

<ul>
    <li><strong>Generación de Token:</strong> Se crea un token codificado en base64 que contiene el nombre de usuario y la hora de expiración. Este token es firmado con HMAC-SHA256 usando una clave secreta.</li>
    <li><strong>Verificación de Token:</strong> Al recibir un token, el servidor lo decodifica, verifica la firma, y comprueba que el tiempo de expiración no haya pasado.</li>
</ul>

<h2>🔑 Credenciales para Probar</h2>

<p>Para realizar pruebas con este sistema de autenticación, se puede usar las siguientes credenciales predeterminadas:</p>

<ul>
    <li><strong>Usuario:</strong> <code>pepe</code></li>
    <li><strong>Contraseña:</strong> <code>asd123</code></li>
</ul>

<p>Estas credenciales son validadas en el archivo <code>TokenController.php</code></p>
