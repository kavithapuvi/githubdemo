<?php
    session_start();

    if(empty($_POST)){
        header("Location:contact.php");
        exit();
    }
    include_once 'swiftmailer/vendor/autoload.php';

    $username="support@qbrainstorm.com";
    $transport=new Swift_SmtpTransport("smtp.gmail.com",587,"tls");
    $transport->setUsername($username);
    $transport->setPassword("Support4cus@Qbs");
    $transport->setStreamOptions(array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            "allow_self_signed"=>true
        )
    ));

    $mailer=new Swift_Mailer($transport);

    $message=new Swift_Message();
    $message->setFrom($username,"YRS Enterprises");
    $message->setTo($username);
    $message->setReplyTo($_POST['email']);
    $message->setSubject("Enquiry From Website");

    $table='
        <table border="1" cellspacing="0" cellpadding="5" >
            <tbody>
    ';
    foreach($_POST as $key=>$value){
        $table.='
            <tr>
                <td>'.ucfirst($key).'</td><td>'.$value.'</td>
            </tr>
        ';
    }
    $table.='
            </tbody>
        </table>
    ';
    $message->setBody($table,"text/html");

    $_SESSION['op_status']="Enquiry failed to send, try again ";
    try{
        if(!empty($mailer->send($message))){
            $_SESSION['op_status']="Enquiry sent successfully, we will get back you soon";
        }
    }catch(Exception $ex){

    }

    header("Location:contact.php");
    exit();
?>