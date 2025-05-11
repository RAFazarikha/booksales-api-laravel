<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 40px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Tekan Tombol di bawah</h1>

    <a href="{{ route('author') }}" class="button">Halaman Author</a>
    <a href="{{ route('genre') }}" class="button">Halaman Genre</a>

</body>
</html>
