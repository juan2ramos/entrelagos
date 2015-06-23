<?php
if (!empty($_POST)) {
    if(empty($_POST['name-user']) || empty($_POST['email'])|| empty($_POST['phone']) || empty($_POST['comment']) ){
        $arrayMsj['success'] = FALSE;
        $arrayMsj['message'] = 'Todos los campos son requeridos';
        echo (json_encode($arrayMsj));
        exit;
    }
    require '/home3/simonsei/mailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->FromName ='Formulario Entre Lagos' ;
    $mail->CharSet = 'UTF-8';
    $mail->From = 'webmaster@simonsein.com';
    $mail->Subject = 'Mensaje Entre Lagos';
    $mail->MsgHTML('Mensaje con HTML');
    $template = '<h1>Mensaje enviado desde el formulario de Entre Lagos</h1><br><br>';
    $template .= 'Nombre: ' . $_POST['name-user'] . '<br>';
    $template .= 'Email: ' . $_POST['email'] .'<br>';
    $template .= 'telefono: ' . $_POST['phone'] .'<br>';
    $template .= 'Comentario: ' . $_POST['comment'] .'<br>';
    $mail->Body = $template;
    $mail->AddAddress('webmaster@simonsein.com', '');
    $mail->AddAddress('andres.rivera@simonsein.com ', '');
    if($mail->Send()){
        $arrayMsj['success'] = TRUE;
        $arrayMsj['message'] = 'Felicitaciones, su mensaje a sido enviado con éxito!!';
    }else{
        $arrayMsj['success'] = false;
        $arrayMsj['message'] = 'Su mensaje no a sido enviado con éxito!!';
    }

    echo (json_encode($arrayMsj));
    exit;
}else{
    echo "Error al intentar acceder";
}