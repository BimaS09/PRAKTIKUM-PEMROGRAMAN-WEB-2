<html>
    <head>
        <title>PRAK303</title>
    </head>
    <body>
        <form action="" method="POST">
            Batas Bawah : <input type="number" name="bawah"></br>
            Batas Atas : <input type="number" name="atas"></br>
            <button type="submit" name="submit">Cetak</button></br>
        </form>
        <?php
        if (isset($_POST['submit'])){
            $bawah = $_POST['bawah'];
            $atas = $_POST['atas'];
            $i = $bawah;
            do{
                if (($i+7)%5 == 0){
                    echo "<img src='bintang.png' width='20px' height='20px'>";
                }else{
                    echo $i;
                }
                echo "&nbsp";
                $i++;
            }while ($i <= $atas);
        }
        ?>
    </body>
</html>