<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PHP Basics</title>
    <style>
        body {
            font-family: 'Trebuchet MS';
        }

        td {
            text-align: center;
        }

        h3 {
            color: #06C220;
        }
    </style>
</head>

<body>

    <!-- NOMOR 1 -->

    <?php
    echo "<h1> NOMOR 1.1 </h1>";

    $name = "Haikal";
    $date = date("j");
    $nameLength = strlen($name) - substr_count($name, ' ');

    echo "Nama: " . $name . "<br>";
    echo "Tanggal: " . $date . "<br> <br>";
    echo "Panjang nama: " . $nameLength . "<br>";
    echo "Panjang yang dibutuhkan: " . ($date - 2) . "<br>";

    if ($nameLength == ($date - 2)) {
        echo "<h3 style=\"color: #06C220;\">Berhasil</h3> <br>";
    } elseif ($nameLength < ($date - 2)) {
        echo "<h3 style=\"color: #026DFE;\">Sedikit lagi</h3> <br>";
    } else {
        echo "<h3 style=\"color: #D70A0A;\">Coba lagi</h3> <br>";
    }

    ?>

    <?php
    echo "<h1> NOMOR 1.2 </h1>";

    $name = "Haikaaaaaaaaaaaaaaaaaaaaaaaal";
    $date = date("j");
    $nameLength = strlen($name) - substr_count($name, ' ');

    echo "Nama: " . $name . "<br>";
    echo "Tanggal: " . $date . "<br> <br>";
    echo "Panjang nama: " . $nameLength . "<br>";
    echo "Panjang yang dibutuhkan: " . ($date - 2) . "<br>";

    if ($nameLength == ($date - 2)) {
        echo "<h3 style=\"color: #06C220;\">Berhasil</h3> <br>";
    } elseif ($nameLength < ($date - 2)) {
        echo "<h3 style=\"color: #026DFE;\">Sedikit lagi</h3> <br>";
    } else {
        echo "<h3 style=\"color: #D70A0A;\">Coba lagi</h3> <br>";
    }

    ?>

    <?php
    echo "<h1> NOMOR 1.3 </h1>";

    $name = "Haikaaaaaaaaaaaaaaaaaaaaaaaaaal";
    $date = date("j");
    $nameLength = strlen($name) - substr_count($name, ' ');

    echo "Nama: " . $name . "<br>";
    echo "Tanggal: " . $date . "<br> <br>";
    echo "Panjang nama: " . $nameLength . "<br>";
    echo "Panjang yang dibutuhkan: " . ($date - 2) . "<br>";

    if ($nameLength == ($date - 2)) {
        echo "<h3 style=\"color: #06C220;\">Berhasil</h3> <br>";
    } elseif ($nameLength < ($date - 2)) {
        echo "<h3 style=\"color: #026DFE;\">Sedikit lagi</h3> <br>";
    } else {
        echo "<h3 style=\"color: #D70A0A;\">Coba lagi</h3> <br>";
    }

    ?>

    <!-- =========================================================================================== -->

    <!-- NOMOR 2 -->

    <?php
    echo "<h1> NOMOR 2 </h1>";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projectmanager";

    //* CREATE CONNECTION
    $conn = mysqli_connect($servername, $username, $password, $database);

    //* CHECK CONNECTION
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }

    $managerName = 'Haikal';

    $sql = "UPDATE anggota 
            SET peran = 
            CASE
                WHEN nama = '$managerName' 
                    THEN 'Manager'
                WHEN nim % 2 = 0 
                    THEN 'Back-end developer'
                ELSE 'Front-end developer'
            END";

    $result = mysqli_query($conn, $sql);

    echo "<h2>List Anggota</h2>";
    echo "<table border='1'>";
    echo "
        <tr>
            <th style='width:50px'>NIM</th>
            <th style='width:80px'>Nama</th>
            <th style='width:200px'>Peran</th>
        </tr>
    ";

    $stmt = mysqli_prepare($conn, "SELECT nim, nama, peran FROM anggota");
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nim, $nama, $peran);

    while (mysqli_stmt_fetch($stmt)) {
        echo "
            <tr>
                <td>{$nim}</td>
                <td>{$nama}</td>
                <td>{$peran}</td>
            </tr>
        ";
    }

    echo "</table>";
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    ?>

    <br>

    <!-- =========================================================================================== -->

    <!-- NOMOR 3 -->

    <?php
    echo "<h1> NOMOR 3 </h1>";

    $listKota = array(
        "Lampung",              //! L
        "Riau",                 //! R
        "Jambi",                //! J
        "Bengkulu",             //! B
        "Makassar",             //! M
        "Kendari",              //! K
        "Gorontalo",            //! G
        "Samarinda",            //! S
        "Papua",                //! P
        "Nusa Tenggara Barat"   //! N
    );

    $namaDepan = 'Muhammad';
    $nameSplit = str_split($namaDepan);
    $found = false;

    echo "Nama Depan: " . $namaDepan . "<br>";

    foreach ($nameSplit as $value) {
        foreach ($listKota as $kota) {

            $firstLetter = mb_substr($kota, 0, 1);

            if (!$found && strtolower($value) === strtolower($firstLetter)) {
                echo "Kota: " . $kota;
                $found = true;
                break 2; //* Exit both nested loops when a match is found
            }
        }
    }

    if (!$found) {
        echo "Kota: Jawa Timur";
    }

    ?>

</body>

</html>