<?php

    include('../conn.php');

    //cusid
    $user = $_POST['uname'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];

    $sqlCheck = 'SELECT * FROM tb_user WHERE user_uname ="'.$user.'" OR user_name = "'.$name.'" OR user_mail = "'.$mail.'"';
    if($rsCheck = mysqli_query($conn,$sqlCheck)){

        if(mysqli_num_rows($rsCheck) == 0){

            $sqlInsert = "INSERT INTO tb_user(user_uname,user_pass,user_name,user_mail,user_tel,user_type) 
            VALUES('$user','$pass','$name','$mail','$tel','2')";
            
            if(mysqli_query($conn,$sqlInsert)){
                echo '
                        <script>
                            alert("สมัครสมาชิกสำเร็จ!");
                            window.history.back();
                        </script>
                    ';
            }else{
                echo '
                    <script>
                        alert("สมัครสมาชิกไม่สำเร็จ!!! โปรดลองอีกครั้ง");
                        window.history.back();
                    </script>
                ';
            }

        }else{
            echo '
                <script>
                    alert("ชื่อผู้ใช้นี้ถูกใช้งานแล้ว กรุณาลองอีกครั้ง");
                    window.history.back();
                </script>
            ';
        }

    }else{
        die('Could not connected: '.mysqli_error());
    }

    mysqli_close($conn);

?>