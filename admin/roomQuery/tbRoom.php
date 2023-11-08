<?php        
            
    include('../../conn.php');

    $sql = 'SELECT * 
    FROM tb_room 
    JOIN tb_room_img 
    ON tb_room.room_id = tb_room_img.room_id 
    WHERE tb_room.room_id LIKE "'.$_GET['str'].'%"
    OR room_name LIKE "%'.$_GET['str'].'%"
    GROUP BY tb_room.room_id 
    ORDER BY tb_room.room_id DESC 
    ';
    if($result = mysqli_query($conn,$sql)){
        while($col = mysqli_fetch_array($result)){
            echo '
                <tr>
                    <td>'.$col[0].'</td>
                    <td>'.$col['room_name'].'</td>
                    <td>'.$col['room_price'].'</td>
                    <td>'.($col['room_sale'] ?? '-').'</td>
                    <td>'.$col['room_total'].'</td>
                    <td><img src="../asset/images/'.$col['room_img_path'].'"></td>
                </tr>
            ';
        }
    }else{
        die('Cloud not connected: '.mysqli_error());
    }
?>