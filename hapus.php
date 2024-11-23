<?php
    include "koneksi.php";

    //baca id data yg akan dihapus
    $id = $_GET['id'];

    //hapus data
    $hapus = mysqli_query($konek, "delete from nama where id='$id'");

    //jika berhasil terhapus menampilkan pesan
    //kembali kehalaman data
    if($hapus)
    {
        echo "
            <script>
                alert('Data BERHASIL terhapus');
                location.replace('data.php');
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Data GAGAL terhapus');
                location.replace('data.php');
            </script>
        ";
    }
?>