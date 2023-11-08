<?php
    session_start();
    if(isset($_SESSION['user'])){
      $user = $_SESSION['user'];  
    }
    include('conn.php');

    $userName = $_POST['userName'];
    $pass = $_POST['pass'];
    $user_id = $user['user_id'];

    $sql = "UPDATE tb_user 
    SET user_uname = '$userName', user_pass = '$pass' 
    WHERE user_id = '$user_id'";

    if($conn->query($sql)){
        $sql = 'SELECT * FROM tb_user WHERE user_id ='.$user_id;
        $rs = $conn->query($sql);
        $row = $rs->fetch_assoc();
        $_SESSION['user'] = $row;
        header('location: account.php');    
    }
?>