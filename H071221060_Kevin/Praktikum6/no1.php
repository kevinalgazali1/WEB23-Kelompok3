<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 6</title>
    <style>
        body {
            background-color: #504A3A;
            color: #2e2828;
        }
        form {
            margin-top : 2rem;
            margin-bottom: 2rem;
        }
        input {
            padding: 0.5rem;
            border-radius: 10px;
            border: 1px solid black
        }
        td {
            background-color: #fff;
            padding-top: .5rem;
        }

        th {
            background-color: lightcoral;
            padding: 0.6rem;
        }
        button {
            background-color: #fef4f4;
            cursor: pointer;  
        }
        button:hover {
            background-color: #2e2828;
            color: #fef4f4;
        }
        .container {
            background-color: #f65151;
            width: 400px;
            border: 1px solid #fef4f4;
            border-radius: 10px;
            margin-bottom:10px;
        }

        </style>
</head>
<body>
    <center>
    <div class="container">
        <form method="GET">
            <input name="input" type="text" placeholder="Masukkan tipe" required>
            <button type="submit">Submit</button>
        </form>
    </div>

    <?php
    $data = [
        [
            "nama_barang" => "HP",
            "harga" => 3000000,
            "stok" => 10,
            "jenis" => "Elektronik"
        ],
        [
            "nama_barang" => "Jeruk",
            "harga" => 5000,
            "stok" => 20,
            "jenis" => "Buah"
        ],
        [
            "nama_barang" => "Kemeja",
            "harga" => 5000,
            "stok" => 9,
            "jenis" => "Pakaian"
        ],
        [
            "nama_barang" => "Apel",
            "harga" => 5000,
            "stok" => 5,
            "jenis" => "Buah"
        ],
        [
            "nama_barang" => "Celana",
            "harga" => 5000,
            "stok" => 10,
            "jenis" => "Pakaian"
        ],
        [
            "nama_barang" => "Laptop",
            "harga" => 50000,
            "stok" => 30,
            "jenis" => "Elektronik"
        ],
        [
            "nama_barang" => "Semangka",
            "harga" => 5000,
            "stok" => 2,
            "jenis" => "Buah"
        ],
        [
            "nama_barang" => "Kaos",
            "harga" => 5000,
            "stok" => 1,
            "jenis" => "Pakaian"
        ],
        [
            "nama_barang" => "VGA",
            "harga" => 2000000,
            "stok" => 0,
            "jenis" => "Elektronik"
        ]
    ];
    
    $filteredData = [];
    
    if (isset($_GET['input'])) {
        $tipe = strtolower($_GET['input']);
    
        foreach ($data as $item) {
            if (strtolower($item['jenis']) === $tipe) {
                $filteredData[] = $item;
            }
        }
    }
    echo "<table border='2'><tr>";
    echo "<th>Nama</th>";
    echo "<th>Harga</th>";
    echo "<th>Stok</th>";
    echo "</tr>";

    if (isset($_GET['input'])) {  // Menggunakan $_GET untuk memeriksa input
        $tipe = strtolower($_GET['input']);

        foreach ($filteredData as $barang) {
            echo "<tr>
                <td>" . $barang['nama_barang'] . "</td>
                <td>" . $barang['harga'] . "</td>
                <td>" . $barang['stok'] . "</td>
            </tr>";
        }
    }
    echo "</table>";
    ?>
    </center>
</body>
</html>