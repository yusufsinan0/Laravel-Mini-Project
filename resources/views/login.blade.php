<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuıllanıcı Destek Sistemi</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{asset('assets/login/css/login.css')}}" rel="stylesheet">

    <style>

    </style>
</head>
<body>
    <div class="container">
        <form action="{{route('login.post')}} " method="POST">
            @csrf
            <h1>Giriş Yap</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email">
                <i class='bx bx-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Şifre">
                <i class='bx bx-lock-alt' ></i>
            </div>
            <div class="remember">
                <label for="#">
                 </label>
                <a href="#">Şifreni mi Unuttun ? </a>
            </div>
            <button class="btn">Giriş Yap</button>
            <div class="register">
                <p>Hesabın Yok mu ?  <br> <a href="{{route('register')}}">Kayıt Ol</a></p>
            </div>
        </form>
    </div>
</body>
</html>
