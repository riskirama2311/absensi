<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>REKAP ABSEN</title>
</head>
<body>

    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>REKAP ABSENSI</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: red; color: white;">
                    <th style="width: 10px; text-align: center">No.</th>
                    <th style="text-align: center">Nama</th>
                    <th style="text-align: center">Tanggal</th>
                    <th style="text-align: center">Jam Masuk</th>
                    <th style="text-align: center">Jam Istirahat</th>
                    <th style="text-align: center">Jam Kembali</th>
                    <th style="text-align: center">Jam pulang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    //baca tabel db absensi dan realisasi dengan tabel nama berdasarkan nokartu untuk tanggal hari ini

                    //baca tanggal saat ini
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');

                    //filter absensi berdasarkan tanggal saat ini
                    $sql = mysqli_query($konek, "select b.nama, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_kembali, 
                    a.jam_pulang from absensi a,nama b where a.nokartu=b. nokartu and a.tanggal='$tanggal'");

                    $no = 0;
                    while($data = mysqli_fetch_array($sql))
                    {
                        $no++;
                ?>
                <tr>
                    <td> <?php echo $no;?> </td>
                    <td> <?php echo $data['nama'];?> </td>
                    <td> <?php echo $data['tanggal'];?> </td>
                    <td> <?php echo $data['jam_masuk'];?> </td>
                    <td> <?php echo $data['jam_istirahat'];?> </td>
                    <td> <?php echo $data['jam_kembali'];?> </td>
                    <td> <?php echo $data['jam_pulang'];?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>