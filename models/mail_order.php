<?php
function send_email_order($email_recive,$name,$contents,$subject){
    //https://www.google.com/settings/security/lesssecureapps
    // Khai báo thư viên phpmailer
    require "phpmailer/PHPMailerAutoload.php";
    require "phpmailer/class.phpmailer.php";
    // Khai báo tạo PHPMailer
    $mail = new PHPMailer();
    //Khai báo gửi mail bằng SMTP
    $mail->IsSMTP();
    //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
    // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
    // 1 = Thông báo lỗi ở client
    // 2 = Thông báo lỗi cả client và lỗi ở server
    // To load the French version
    $mail->setLanguage('vi', '/optional/path/to/language/directory/');
    $mail->SMTPDebug  = 0;
    $mail->SMTPOptions = array (
        'ssl' => array(
            'verify_peer'  => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true)
    );
    $mail->CharSet="UTF-8";
    $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
    $mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
    $mail->Port       = 587; // cổng để gửi mail
    $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
    $mail->SMTPAuth   = true; //Xác thực SMTP
    $mail->Username   = "nguyengialong9x@gmail.com"; // Tên đăng nhập tài khoản Gmail
    $mail->Password   = "01294831010"; //Mật khẩu của gmail
    $mail->SetFrom("nguyengialong9x@gmail.com", "Zent Group"); // Thông tin người gửi
    $mail->AddReplyTo("nguyengialong9x@gmail.com","Zent Group");// Ấn định email sẽ nhận khi người dùng reply lại.
    $mail->AddAddress($email_recive, $name);//Email của người nhận
    //$mail->AddCC($email_recive, $name);//Email của người nhận
    $mail->isHTML(true);
    $mail->Subject = $subject; //Tiêu đề của thư
    $mail->MsgHTML($contents); //Nội dung của bức thư.
    // $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
    // Gửi thư với tập tin html
    $mail->Body= "Chào bạn $name.Đơn hàng của bạn đã được đặt.";
    $mail->AltBody = "Chào bạn $name.Đơn hàng của bạn đã được đặt."; //Nội dung rút gọn hiển thị bên ngoài thư mục thư.
    //$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach

    //Tiến hành gửi email và kiểm tra lỗi
    if(!$mail->Send()) {
        echo "Có lỗi khi gửi mail: ". $mail->ErrorInfo;
        return false;
    } else {
        echo "<span style='display: block; margin: auto;text-align: center;color:green;'>Success<span>";
        return true;

    }
}
?>