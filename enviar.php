<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST['message']);
    $destinatario = "albertozarco57@gmail.com";
    $asunto = "Nuevo contacto de: $nombre";
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    if (@mail($destinatario, $asunto, $contenido, $headers)) {
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