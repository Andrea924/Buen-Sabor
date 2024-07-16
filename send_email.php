<?php
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function validate_name($name) {
    return preg_match("/^[a-zA-Z\s]{3,}$/", $name);
}

function validate_lastname($lastname) {
    return preg_match("/^[a-zA-Z\s]{3,}$/", $lastname);
}

function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_phone($phone) {
    return preg_match("/^\d{9}$/", $phone);
}

function validate_message($message) {
    return strlen($message) >= 10;
}

if ($_SERVER["REQUEST_METHOD"] == "post") {
    $name = sanitize_input($_POST['nombre']);
    $lastname = sanitize_input($_POST['apellido']);
    $email = sanitize_input($_POST['email']);
    $phone = sanitize_input($_POST['celular']);
    $message = sanitize_input($_POST['mensaje']);
    
    $errors = [];
    
    if (!validate_name($name)) {
        $errors[] = "Nombre inválido.";
    }

    if (!validate_name($lastname)) {
        $errors[] = "Apellido inválido. ";
    }
    
    if (!validate_email($email)) {
        $errors[] = "Correo electrónico inválido.";
    }
    
    if (!validate_phone($phone)) {
        $errors[] = "Número de celular inválido.";
    }
    
    if (!validate_message($message)) {
        $errors[] = "El mensaje debe contener al menos 10 caracteres.";
    }
    
    if (empty($errors)) {
        $to = "andreataipeg@outlook.com.pe";
        $subject = "Nuevo mensaje de contacto";
        $body = "Nombre: $name $lastname\nCelular: $phone\nCorreo Electrónico: $email\n\nMensaje:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Mensaje enviado exitosamente.";
        } else {
            echo "Hubo un error al enviar el mensaje.";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
} else {
    echo "Método no permitido.";
}
?>
