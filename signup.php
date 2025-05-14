<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب جديد</title>
    <style>
        body { font-family: Arial; background: #333; color: #fff; text-align: center; padding: 50px; }
        input { margin: 10px; padding: 10px; width: 80%; }
        button { padding: 10px 20px; background: red; color: #fff; border: none; }
        a { color: #ccc; text-decoration: none; display: block; margin-top: 10px; }
    </style>
</head>
<body>

    <?php
    if(isset($_GET['error'])){
        if($_GET['error']=="emptyfields"){
            echo '<p style="color:red"> Fill in all fields!</p>';
        }
        else if($_GET['error']=="invalidemail"){
            echo '<p style="color:red"> Invalid  e-mail!</p>';
        }
        else if($_GET['error']=="invaliduid"){
            echo '<p style="color:red"> Invalid Username!</p>';
        }
        else if($_GET['error']=="passwordcheck"){
            echo '<p style="color:red"> Your passwords do not match!</p>';
        
        }else if($_GET['error']=="usertaken"){
            echo '<p style="color:red"> Username is already taken!</p>';
        }
    }
    else if(isset($_GET['signup']) && $_GET['signup']=="success"){
        echo '<p style="color:green"> Sign up Success</p>';
    }
    ?>
    <h2>إنشاء حساب جديد</h2>
    <form id="signupForm" action="includes/signup.inc.php" method="POST">
        <input type="text" name="uid" placeholder="اسم المستخدم" ><br>
        <input type="email" name="mail" placeholder="البريد الإلكتروني" ><br>
        <input type="password" name="pwd" placeholder="كلمة المرور" ><br>
        <input type="password" name="pwd-repeat" placeholder="تاكيد كلمه المرور"> <br>
        <button type="submit" name="signup-submit">إنشاء الحساب</button>
    </form>
    <a href="login.php">لديك حساب؟ تسجيل الدخول</a>
    <script>
        function goToHome(event) {
            event.preventDefault();
            window.location.href = "index.html";
        }
    </script>
</body>
</html>