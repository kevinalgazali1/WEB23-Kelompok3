<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 6</title>
    <style>
        body{
            background-color: #1a1c22;
            color: #f7f7f7;
            display: flex;
            justify-content: center;
        }
        .container{
            display: flex; 
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #580ef6;
            width: 650px;
            padding: 1.4rem;
            border-radius: 10px;
            border: 1px solid #f7f7f7;
            margin-top: 2rem;
        }

        .content {
        display: inline-block;
        width: 150px;
        margin-right: 10px;
        }
        input {
            padding: .2rem;
            margin-top: 1rem;
        }
        input:focus {
            background-color: lightblue;
            opacity: 0.9;
        }
        form {
            margin-bottom: 1.4rem;
        }

    </style>
</head>
<body>
    <div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $usia = $_POST["usia"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $bahasa = isset($_POST["bahasa"]) ? $_POST["bahasa"] : [];

        // Membangun kalimat berdasarkan data yang diisi
        $output = "Halo! Perkenalkan nama saya $nama, saya berumur $usia tahun, saya lahir pada tanggal ";

        $parts = explode('-', $tanggal_lahir);
        $tanggal = $parts[2];
        $bulan = date("F", strtotime($tanggal_lahir));
        $tahun = $parts[0];

        $output .= "$tanggal $bulan tahun $tahun, ";
        
        if ($jenis_kelamin == "laki-laki") {
            $output .= "saya berjenis kelamin Laki-laki";
        } else {
            $output .= "saya berjenis kelamin Perempuan";
        }
        
        if (!empty($bahasa)) {
            $output .= " dan saat ini saya menguasai bahasa pemrograman: " . implode(", ", $bahasa) . ".";
        } else {
            $output .= " dan saat ini saya belum menguasai bahasa pemrograman apapun.";
        }
    }

    ?>
    <h2>Form Perkenalan Diri</h2>
    <table>
        <form method="POST">
        <tr>
                <td><label for="nama">Nama Lengkap</label></td>
                <td><span>: </span><input type="text" id="nama" name="nama" placeholder="Masukkan nama" required></td>
            </tr>
            <tr>
                <td><label for="usia">Usia</label></td>
                <td><span>: </span><input type="number" id="usia" name="usia" placeholder="Masukkan usia" required></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><span>: </span><input type="text" id="email" name="email" placeholder="Masukkan email" required></td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Tanggal lahir</label></td>
                <td><span>: </span><input type="date" id="tanggal_lahir" name="tanggal_lahir" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin </td>
                <td><span>: </span>
                    <input type="radio" id="laki" name="jenis_kelamin" value="laki-laki">
                    <label for="laki">Laki-Laki</label>
                    <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan">
                    <label for="perempuan">Perempuan</label>
                </td>
            <tr>
            <tr>
                <td>Bahasa yang dikuasai </td>
                <td><span>: </span>
                    <input type="checkbox" id="java" name="bahasa[]" value="Java">
                    <label for="laki">Java</label>
                    <input type="checkbox" id="phyton" name="bahasa[]" value="Phyton">
                    <label for="laki">Phyton</label>
                    <input type="checkbox" id="html" name="bahasa[]" value="HTML">
                    <label for="laki">HTML</label>
                    <input type="checkbox" id="css" name="bahasa[]" value="CSS">
                    <label for="laki">CSS</label>
                    <input type="checkbox" id="js" name="bahasa[]" value="JavaScript">
                    <label for="laki">JavaScript</label>
                    <input type="checkbox" id="php" name="bahasa[]" value="PHP">
                    <label for="laki">PHP</label>
                </td>
            <tr>
                <td><input type="submit" value="kirim"></td>
            </tr>
    </form>
    </table>

    <?php
    if (isset($output)) {
        echo "<p>$output</p>";
    }
    ?>
    </div>
</body>
</html>