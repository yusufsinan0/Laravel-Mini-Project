<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Destek Sistemi</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('assets/login/css/login.css') }}" rel="stylesheet">

    <style>

    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <h1>Kayıt Ol</h1>
            <div class="input-box">
                <input type="text" name="name" placeholder="Ad-Soyad" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="text" name="phone" placeholder="Telefon Numarası" required>
                <i class='bx bx-phone'></i>
            </div>

            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bx-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Şifre" required>
                <i class='bx bx-lock-alt'></i>
            </div>

            <div class="input-box">
                <input type="password" name="passwordCheck" placeholder="Şifre Tekrarı" required>
                <i class='bx bx-lock-alt'></i>
            </div>

            <div class="remember">
                <label for="#">
                 </label>
                <a href="#">Şifreni mi Unuttun?</a>
            </div>
            <button type="submit" class="btn">Kayıt Ol</button> <!-- Doğru form gönderim butonu -->
            <div class="register">
                <p>Hesabın Yok mu? <br> <a href="{{route('login')}}">Giriş Yap</a></p>
            </div>
        </form>
    </div>
</body>
</html>
