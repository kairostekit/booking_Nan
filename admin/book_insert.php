<?php
    
    include('../conn.php');
    $id = $_POST['id'];
    $stat = $_POST['stat'];

    $status = $stat+1;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';

    $mail = new PHPMailer(true);

    



    $sql = "UPDATE tb_book SET book_status = '$status' WHERE book_id = $id";
    if(mysqli_query($conn,$sql)){
        // if($status == 2) {
        //     try {
        //         // การตั้งค่า SMTP
        //         $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        //         $mail->isSMTP();                   
        //         $mail->Host       = 'smtp.gmail.com';
        //         $mail->SMTPAuth   = true;
        //         $mail->Username   = 'youremail@example.com';  
        //         $mail->Password   = 'yourpassword';         
        //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
        //         $mail->Port       = 587;                                
            
        //         // ส่งจาก
        //         $mail->setFrom('youremail@example.com', 'Mailer');
            
        //         // ส่งถึง
        //         $mail->addAddress($_POST['mail']);
            
        //         // หัวเรื่องและเนื้อหาข้อความ
        //         $mail->isHTML(true);
        //         $mail->Subject = "การจองห้องพัก";
        //         $mail->Body    = "การชำระเงินจองห้องพักของคุณได้รับการยืนยันแล้ว";
            
        //         $mail->send();
        //         echo 'Email sent successfully';
        //     } catch (Exception $e) {
        //         echo "Error sending message: {$mail->ErrorInfo}";
        //     }
        // }
        
        echo '
            <script>
                alert("เปลี่ยนสถานะสำเร็จ!!");
                window.history.back();
            </script>
        ';

    }else{
        die('Could not connected: '.mysqli_error());
    }

    mysqli_close($conn);
?>