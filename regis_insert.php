<?php

    session_start();
    include('conn.php');

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];    

    $sqlInsert = 'INSERT INTO tb_user(user_uname, user_pass, user_name, user_mail, user_tel, user_type) 
    VALUES("'.$uname.'", "'.$pass.'", "'.$name.'", "'.$mail.'", "'.$tel.'", 1)';

    $sqlCheck = 'SELECT * FROM tb_user WHERE user_uname = "'.$uname.'"';

    if($rs = $conn->query($sqlCheck)){
        if($rs->num_rows == 0) {
            
           if($rs = $conn->query($sqlInsert)){

                $lastId = $conn->insert_id;
                echo $lastId;
                echo $sql = 'SELECT * FROM tb_user WHERE user_id = '.$lastId;
                $rs = $conn->query($sql);
                $row = $rs->fetch_assoc();
                echo $row['user_name'];

                $_SESSION['user'] = $row;
                header('location: index.php');

           }else {
                echo 'Insert failed';
           }
        }else {
            echo '
                <script>
                    alert("มีชื่อผู้ใช้งานนี้แล้ว");
                    window.history.back();
                </script>
            ';
        }
    }else {
        echo 'Query failed';
    }



?>