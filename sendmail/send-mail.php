<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    if (isset($_POST['send'])) {
        $mail = new PHPMailer(true);
        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'doxuanchienh02042002@gmail.com';
        $mail -> Password = 'fhfdrdaoohvfrixs';
        $mail -> SMTPSecure = 'ssl';
        $mail -> Port = 465;
        $mail -> setFrom('doxuanchienh02042002@gmail.com');
        //receiver
        $mail -> addAddress($_POST['email']);
        $mail -> Subject = 'REGISTER NOTIFICATIONS SUCCESSFULLY';
        $mail -> Body = 'Cảm ơn bạn đã đăng kí nhận thông báo mới nhất từ cửa hàng chúng tôi. Chúng tôi sẽ cố gắng đem lại cho bạn những trải nghiệm tốt nhất về cửa hàng!';
    
        $mail -> send();
    
        echo "<script>
            alert('Đăng kí nhận thông báo thành công');
            document.location.href = '../index.php';
        </script>";
    }
?>