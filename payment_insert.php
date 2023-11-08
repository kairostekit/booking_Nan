<?php

    session_start();
    include('conn.php');

    $bookId = $_POST['book_id'];

    $file = $_FILES['file']['tmp_name'];
    $target = 'asset/images/slip/' . $_FILES['file']['name'];
    if(move_uploaded_file($file, $target)) {
        $sql = "INSERT INTO slip VALUES(null,'$target','$bookId')";
        if($conn->query($sql)) {
            $sql = 'UPDATE tb_book SET book_status = 1 WHERE book_id = '.$bookId;
            if($conn->query($sql)) {
                echo '
                    <script>
                        alert("ชำระเงินสำเร็จ");
                        window.location = "booklist.php";
                    </script>
                
                ';
            }
        }
    }else {
        echo '
            <script>
                alert("ท่านยังไม่ทำการชำระเงิน");
                window.location = "booklist.php";
            </script>
        
        ';
    }


?>