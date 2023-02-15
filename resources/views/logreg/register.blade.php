<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <center>
        <img src="img/icon2.png" style="box-shadow: 2px 2px 10px;"><br><br>
        <strong>SELAMAT DATANG DI ADMIN SCHOOL GALLEY<br> SMKN 2 BANJARMASIN</strong>  <br><br>
    <form action="/progis" method="POST" class="form">
        @csrf 
        <div class="kotak" style="box-shadow: 2px 2px 10px;">
            <br><br>
        <input type="text" class="masuk" name="name" placeholder="Username" > 
        <br><br>
        <input type="email" class="masuk" name="email" placeholder="Email"> 
        <br><br>
        <input type="password" class="masuk"  name="password" placeholder="Password"> 
        <br><br>
        <input type="password" class="masuk"  name="confirm_password" placeholder="Konfirmasi Password" > 
        <br>
        <input type="submit" value="Register" style="border-radius: 50px; width: 110px; margin-top: 20px;"><br>
        <a href="/" class="mt-2">Login</a>
        </div>
        </div>
    </form>
       </center>
</body>
</html>