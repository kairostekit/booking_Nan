<?php
    include('conn.php');

    $id = $_POST["id"] ?? null;
    $name = $_POST["name"] ?? null;
    $mail = $_POST["mail"] ?? null;
    $tel = $_POST["tel"] ?? null;
    $address = $_POST["address"] ?? null;
    $region = $_POST["region"] ?? null;
    $checkin = $_POST["checkin"] ?? null;
    $checkout = $_POST["checkout"] ?? null;
    $man = $_POST["man"] ?? null;
    $child = $_POST["child"] ?? null;
    $roomId = $_POST["roomId"] ?? null;
    $roomTotal = $_POST["roomTotal"] ?? null;
    $userId = $_POST["user_id"] ?? null;

    // แสดงค่าที่ได้รับจากฟอร์ม
    // echo "ID: " . $id . "<br>";
    // echo "Name: " . $name . "<br>";
    // echo "Email: " . $mail . "<br>";
    // echo "Telephone: " . $tel . "<br>";
    // echo "Address: " . $address . "<br>";
    // echo "Region: " . $region . "<br>";
    // echo "Check-in Date: " . $checkin . "<br>";
    // echo "Check-out Date: " . $checkout . "<br>";
    // echo "Number of Adults: " . $man . "<br>";
    // echo "Number of Children: " . $child . "<br>";
    // echo "Room ID: " . $roomId . "<br>";
    // echo "Total Rooms: " . $roomTotal . "<br>";
    // echo "User ID: " . $userId . "<br>";

    // die();

    $sqlInsertBook = "INSERT INTO tb_book (book_in, book_out, book_man, book_child, book_total, book_status, user_id, room_id)
                                    VALUES ('$checkin', '$checkout', '$man', '$child', '$roomTotal', '0', '$userId', '$roomId')";

    if($rsInsertBook = $conn->query($sqlInsertBook)) {
        $lastId = $conn->insert_id;
    
        $sqlInsertBookDetail = "INSERT INTO tb_book_detail (book_detail_personal, book_detail_name, book_detail_mail, book_detail_tel, book_detail_address, book_detail_region, book_id)
        VALUES ('$id', '$name', '$mail', '$tel', '$address', '$region', '$lastId')";
    
        if($rsInsertBookDetail = $conn->query($sqlInsertBookDetail)){
            header('location: payment.php?bookid='.$lastId);
        }
    }



?>