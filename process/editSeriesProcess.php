<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
if (isset($_POST['edit'])) {

    // untuk mengoneksikan dengan database dengan memanggil file db.php
    include('../db.php');
    $id = $_GET['id'];
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $name = $_POST['name'];
    $genre = implode(", ", $_POST["genre"]);
    $realease = $_POST['realease'];
    $episode = $_POST['episode'];
    $season = $_POST['season'];
    $synopsis = $_POST['synopsis'];
    // Melakukan insert ke databse dengan query dibawah ini
    $query = mysqli_query(
        $con,
        "UPDATE series SET name = '$name', genre = '$genre', 
        realease = '$realease', episode = '$episode', season = '$season', synopsis = '$synopsis' WHERE id='$id'"
    )
        or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if ($query) {
                echo
                '<script>
                    alert("Edit Series Success"); window.location = "../page/listSeriesPage.php"
                    </script>';
            } else {
                echo
                '<script>
                    alert("Edit Series Failed");
                    </script>';
            }
            } else {
                echo
                '<script>
                    window.history.back()
                    </script>';
        }