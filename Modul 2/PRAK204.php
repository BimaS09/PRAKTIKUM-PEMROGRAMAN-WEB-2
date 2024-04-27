<html>
    <head>
        <title>PRAK204</title>
    </head>
    <body>
        <?php
        $nilai = "";
        if(isset($_POST["nilai"])) $nilai = $_POST["nilai"];
        $hasil = 0; 
        ?>
        <form action=" " method="POST">
            Nilai : <input type="text" name="nilai" value="<?php echo $nilai;?>"><br>
            <button type="submit" name="konversi">Konversi</button>
        </form>
        <?php
            if($nilai == 0) {
                $hasil = "Nol";
            } elseif($nilai > 0 && $nilai < 10) {
                $hasil = "Satuan";
            }elseif($nilai > 10 && $nilai < 20) {
                $hasil = "Belasan";
            }elseif($nilai  == 10 || $nilai >= 20 && $nilai < 100) {
                $hasil = "Puluhan";
            }elseif($nilai >= 100 && $nilai < 1000) {
                $hasil = "Ratusan";
            }else {
                $hasil = "Anda Menginput Melebihi Limit Bilangan";
            }
            if(!empty($_POST["nilai"]) || $nilai==0){
                echo "<b>Hasil: $hasil</b>";
            }
        ?>
    </body>
</html>