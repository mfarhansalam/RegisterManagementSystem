<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        body {
            background-color: #ddd;
        }

        table {
            width: 90%;
            margin: auto;
            max-width: 800px;
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 10px;
            font-family: arial;
            padding: 20px;
        }

        h1 {
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td>
                <h1>Akaun anda bakal luput</h1>

                {{ $name }}

                <p>Akaun anda di Bootcamp.test bakal luput tarikh. Sila perbaharui keahlian anda dengan membuat bayaran di halaman berikut :</p>

                <p>Tarikh Luput Keahlian : {{ $expire_at }}</p>

                <p><a href="{{ route('signup') }}">Bayar Yuran Keahlian Sekarang</a></p>

                <p>Sistem Keahlian Bootcamp</p>
            </td>
        </tr>
    </table>
</body>

</html>