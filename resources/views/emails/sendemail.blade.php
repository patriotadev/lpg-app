<!DOCTYPE html>
<html>
<head>
    <title>LPG App</title>
</head>
<body>
    <h3>Halo, {{ $data['name'] }} 👋</h3>
   
    <p>Selamat! akun Anda berhasil terdaftar dengan credential berikut ✅</p>
    <p>Email    : {{ $data['email'] }}</p>
    <p>Password : {{ $data['password'] }}</p>


    <p>Mohon untuk menjaga kerahasiaan akun Anda demi keamanan data pengguna</p>

    <p>Terima kasih.</p>
</body>
</html>