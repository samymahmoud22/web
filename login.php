<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <style>
        body { font-family: Arial; background: #333; color: #fff; text-align: center; padding: 50px; }
        input { margin: 10px; padding: 10px; width: 80%; }
        button { padding: 10px 20px; background: green; color: #fff; border: none; }
        a { color: #ccc; text-decoration: none; display: block; margin-top: 10px; }
    </style>
</head>
<body>
    <?php
    if(isset($_SESSION['userId'])){
        echo '<form action="includes/logout.inc.php" method="post">
        <button type="submit" name="logout-submit">تسجيل الخروج</button>
    </form>
    <br>
    <p style="color:green">You are loged in!</p>';
    }
    else{
        echo '<h2>تسجيل الدخول</h2>
        <form id="loginForm" action="includes/login.inc.php" method="POST">
            <input type="text" name="mailuid" placeholder=" البريدالالكتروني / اسم المستخدم" required><br>
            <input type="password" name="pwd" placeholder="كلمة المرور" required><br>
            <button type="submit" name="login-submit">تسجيل الدخول</button>
        </form>
        <br>
        <a href="signup.php">إنشاء حساب جديد</a>
        <br>
        <p style="color:green">You are loged out!</p>';
    }
    ?>
    <script>
        function goToHome(event) {
            event.preventDefault();
            window.location.href = "index.html";
        }
    </script>

</body>
</html>