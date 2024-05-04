<html>
    <head>
        <title>PRAK301</title>
    </head>
    <body>
        <form action="" method="POST">
            Jumlah Peserta : <input type="number" name="jumlah"></br>
            <input type="submit" name="submit" value="Cetak">
        </form>
        <?php
        if (isset($_POST['submit'])){
            $jumlah = $_POST['jumlah'];
            $i=1;
            while ($i <= $jumlah){
                if ($i%2 == 0){
                    echo "<h2><font color='green'>Peserta Ke-$i</font></br>";
                } else {
                    echo "<h2><font color='red'>Peserta Ke-$i</font></br>";
                }
                $i++;
            }
        }
        ?>
    </body>
</html>