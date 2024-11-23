<!--proses penyimpanan data-->
<?php 
    include "koneksi.php";

    //jika tombol diklik
    if(isset($_POST['btnSimpan']))
    {
        //baca isi inputan data
        $nokartu = $_POST['nokartu'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        //simpan kedalam tabel
        $simpan = mysqli_query($konek, "insert into nama(nokartu, nama, alamat)values('$nokartu', '$nama', '$alamat')");

        //jika berhasil tersimpan tampilkan pesan tersimpan
        //kembali ke halaman data
        if($simpan)
        {
            echo "
                <script>
                    alert('Tersimpan');
                    location.replace('data.php');
                </script>
            ";
        }
        else
        {
            echo "
            <script>
                alert('Gagal Tersimpan');
                location.replace('data.php');
            </script>
        ";
        }
    }

    mysqli_query($konek, "delete from tmpkartu");
 
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>TAMBAH DATA</title>

    <!-- PEMBACAAN NOMOR KARTU -->
     <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#norfid").load('nokartu.php')
            }, 0); //0 = timer pembacaan file nokartu.php
        });
     </script>

</head>
<body>

    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>TAMBAH DATA</h3>

        <!-- form untuk input -->
        <form method="POST">
            <div id="norfid">

            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control" style="width: 400px">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" style="width 400px"></textarea>
            </div>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">SIMPAN</button>
        </form>
    </div>
</body>
</html>