<?php

    include('../../conn.php');

    $sql = 'SELECT * FROM tb_user WHERE user_id LIKE "%'.$_GET['str'].'%" OR user_uname LIKE "%'.$_GET['str'].'%" OR user_name LIKE "%'.$_GET['str'].'%" ORDER BY user_id DESC';
    $result = mysqli_query($conn,$sql);

    while($col = mysqli_fetch_array($result)){
        echo '
            <tr>
                <td>'.$col[0].'</td>
                <td>'.$col[1].'</td>
                <td>'.$col[2].'</td>
                <td>'.$col[3].'</td>
                <td>'.$col[4].'</td>
                <td>'.$col[5].'</td>
            </tr>
        ';
    }

    mysqli_close($conn);

?>