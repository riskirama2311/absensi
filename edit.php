<!--proses penyimpanan data-->
<?php 
    include "koneksi.php";

    //membaca id data yang akan diedit
    $id = $_GET['id'];

    //membaca data berdasarkan id
    $cari = mysqli_query($konek, "select * from nama where id='$id'");
    $hasil = mysqli_fetch_array($cari);

    //jika tombol diklik
    if(isset($_POST['btnSimpan']))
    {
        //baca isi inputan data
        $nokartu = $_POST['nokartu'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        //simpan kedalam tabel
        $simpan = mysqli_query($konek, "update nama set nokartu='$nokartu', nama='$nama', alamat='$alamat' where id='$id'");

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
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>TAMBAH DATA</title>
</head>
<body>

    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>TAMBAH DATA</h3>

        <!-- form untuk input -->
        <form method="POST">
            <div class="form-group">
                <label>No.Kartu</label>
                <input type="text" name="nokartu" id="nokartu" placeholder="Nomor Kartu" class="form-control" style="width: 200px"
                value="<?php echo $hasil['nokartu']; ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control" style="width: 400px"
                value="<?php echo $hasil['nama']; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" style="width 400px">
                <?php echo $hasil['alamat']; ?></textarea>
            </div>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">SIMPAN</button>
        </form>
    </div>
</body>
</html>