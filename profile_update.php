<?php
    session_start();
    if(isset($_SESSION['user'])){
      $user = $_SESSION['user'];  
    }
    include('conn.php');

    $name = $_POST['name'] ?? null;
    $mail = $_POST['mail'] ?? null;
    $tel = $_POST['tel'] ?? null;
    $brith = $_POST['brith'] ?? null;
    $nation = $_POST['nation'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $address = $_POST['address'] ?? null;
    $personal = $_POST['personal'] ?? null;
    $user_id = $user['user_id'];

    $sql = "UPDATE tb_user SET 
                user_name = '$name', 
                user_mail = '$mail', 
                user_tel = '$tel',
                user_birth = '$brith', 
                user_region = '$nation',
                user_gender = '$gender',
                user_address = '$address',
                user_personalid = '$personal'
                WHERE user_id = '$user_id'";
    
    if($conn->query($sql)){
        $sql = 'SELECT * FROM tb_user WHERE user_id ='.$user_id;
        $rs = $conn->query($sql);
        $row = $rs->fetch_assoc();
        $_SESSION['user'] = $row;
        header('location: profile.php');
    }
?>