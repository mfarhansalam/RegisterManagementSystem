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

                @yield('content')

            </td>
        </tr>
    </table>

    <p class="text-center">Keahlian Bootcamp<br>123 Jalan ABC, Taman Mulia, 53210 Kuala Lumpur.</p>

</body>

</html>