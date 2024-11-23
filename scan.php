<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>SCAN KARTU</title>

    <!-- membaca kartu -->
     <script>
        $(document).ready(function(){
            setInterval(function(){
                $("#cekkartu").load('bacakartu.php')
            }, 1000);
        });
     </script>
</head>
<body>
    <?php include "menu.php"; ?>

    <div class="container-fluid" style="padding-top: 5%">
        <div id="cekkartu"></div>
    </div>
    <br>

    <?php include "footer.php";?>
</body>
</html>