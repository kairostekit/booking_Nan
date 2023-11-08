<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    
    <!-- NavBar -->
    <div class="nav">
        <nav class="active">
        <div class="logo"><img src="asset/images/logo/logo2.png"></div>
            <ul>
                <li><a href="index.php"><img src="asset/images/icons/icon _house_.png"> หน้าแรก</a></li>
                <li><a href="stay.php"><img src="asset/images/icons/icon _building_.png"> เข้าพัก</a></li>
                <li><a href="promo.php"><img src="asset/images/icons/icon _ticket_.png"> โปรโมชัน</a></li>
                <li><a href="interest.php"><img src="asset/images/icons/icon _heart_.png"> สิ่งที่หน้าสนใจ</a></li>
                <li><a href="contact.php"><img src="asset/images/icons/icon _message_.png"> ติดต่อ</a></li>
                <li><a class="social" href="https://web.facebook.com/"><img src="asset/images/icons/facebook.png"></a></li>
                <li><a class="social" href="https://line.me/th/"><img src="asset/images/icons/line.png"></a></li>
                <li><a href="login.php"><img src="asset/images/icons/icon _profile_circle2_.png"> Login</a></li>
            </ul>
        </nav>
    </div>

    <section class="login">
        <h1>สมัครผู้ใช้งาน</h1>
        <form action="regis_insert.php" method="post">
            <input type="text" name="uname" id="uname" placeholder="ชื่อผู้ใช้">
            <input type="password" name="pass" id="pass" placeholder="รหัสผ่าน">
            <input type="text" name="name" id="name" placeholder="ชื่อ-สกุล">
            <input type="text" name="mail" id="mail" placeholder="อีเมล">
            <input type="text" name="tel" id="tel" placeholder="เบอร์โทร">
            <button type="submit">สมัคร</button>
            <a href="login.php">มีแอคเคาท์ผู้ใช้งานแล้ว?</a>
        </form>
    </section>

</body>
</php>