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
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background-color: #007BFF;
            color: white;
        }

        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #eaeaea;
        }

        tr:hover {
            background-color: #f1f1f1;
            color: #000000
        }

        img.cover {
            width: 60px;
            height: auto;
            border-radius: 4px;
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
    <h1>Daftar Buku</h1>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Genre</th>
                <th>Penulis</th>
                <th>Cover</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['description'] }}</td>
                    <td>Rp {{ $book['price'] }}</td>
                    <td>{{ $book['stock'] }}</td>
                    <td>{{ $book['genre_id']}}</td>
                    <td>{{ $book['author_id'] }}</td>
                    <td><img class="cover" src="{{ $book['cover_photo'] }}" alt="{{ $book['cover_photo'] }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="button">Kembali</a>
</body>
</html>
