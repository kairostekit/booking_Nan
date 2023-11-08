<?php

    include('../../conn.php');

    $str = $_GET['str'];

    $sql = 'SELECT * FROM tb_book JOIN tb_user ON tb_book.user_id = tb_user.user_id
    WHERE tb_book.book_id = "'.$str.'" OR tb_user.user_name LIKE "%'.$str.'%"
    ORDER BY tb_book.book_id DESC';
    $result = mysqli_query($conn,$sql);

    while($col = $result->fetch_assoc()){
        echo '
            <tr>
                <td>#'.$col['book_id'].'</td>
                <td>'.$col['user_name'].'</td>
                <td>'.$col['book_man'].'</td>
                <td>'.$col['book_child'].'</td>
                <td>'.$col['book_in'].'</td>
                <td>'.$col['book_out'].'</td>
                <td>'.$col['book_total'].'</td>
                <td class="'.($col['book_status'] == 1 ? 'primary' : ($col['book_status'] == 2 ? 'success' : 'warning')).'">'.($col['book_status'] == 1 ? 'จอง' : ($col['book_status'] == 2 ? 'เข้าพักแล้ว' : 'รอชำระเงิน')).'</td>
            </tr>
        ';

    }   

?>