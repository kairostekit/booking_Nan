<?php

    session_start();
    include('conn.php');

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $sql = 'SELECT * FROM tb_user WHERE user_uname = "'.$uname.'" AND user_pass = "'.$pass.'"';
    if($rs = $conn->query($sql)){
        if($rs->num_rows > 0) {
            $row = $rs->fetch_assoc();
            if($row['user_type'] == 1) {
                header('location: admin/book.php');
                $_SESSION['user'] = $row;
            }else {
                header('location: index.php');
                $_SESSION['user'] = $row;
            }
        }else {
            echo '
                <script>
                    window.history.back();
                </script>
            ';
        }
    }else {
        echo 'Query failed';
    }



?>