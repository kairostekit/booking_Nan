<?php

    include('../conn.php');

    $cusId = $_POST['cus_id'];
    $cusUse = $_POST['uname'];
    $cusPass = $_POST['pass'];
    $cusName = $_POST['name'];
    $cusMail = $_POST['mail'];
    $cusTel = $_POST['tel'];

    $sql = "UPDATE tb_user
    SET user_uname = '$cusUse', user_pass = '$cusPass', user_name = '$cusName', user_mail = '$cusMail', user_tel = '$cusTel'
    WHERE user_id = $cusId
    ";

    if(mysqli_query($conn,$sql)){

        echo '
            <script>
                alert("แก้ไขข้อมูลสำเร็จ");
                window.history.back();
            </script>
        ';

    }else{
        die('Colud not connected: '.mysqli_error());
    }

    mysqli_close($conn);

?>