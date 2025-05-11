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
            color: #000000;
        }

        img.cover {
            width: 60px;
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Genre</th>
                <th>Deskripsi</th>
        </thead>
        <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td>{{ $genre['name'] }}</td>
                    <td>{{ $genre['description'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
