<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recibir y sanitizar los datos
    $nombre = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $asunto_usuario = htmlspecialchars($_POST['subject']);
    $mensaje = htmlspecialchars($_POST['message']);
    $destinatario = "albertozarco57@gmail.com";
    $asunto_correo = "Portafolio: " . $asunto_usuario;
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";
    $headers = "From: albertozarco57@gmail.com\r\n"; 
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    if (@mail($destinatario, $asunto_correo, $contenido, $headers)) {
        echo "<script>
                alert('¡Mensaje enviado exitosamente!');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Error al enviar mensaje');
                window.location.href = 'index.html';
              </script>";
    }
} else {
    header("Location: index.html");
    exit();
}
?>