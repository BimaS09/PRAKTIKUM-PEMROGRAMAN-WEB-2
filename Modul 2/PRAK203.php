<html>
    <head>
        <title>PRAK203</title>
    </head>
    <body>
        <form action="" method="post">
            <label for="">Nilai :</label>
            <input type="text" name="nilai"><br>
            <label for="">Dari :</label><br>
            <input type="radio" name="suhuawal" id="celcius0" value="celcius">Celcius<br>
            <input type="radio" name="suhuawal" id="fahrenheit0" value="fahrenheit">Fahrenheit<br>
            <input type="radio" name="suhuawal" id="reamur0" value="reamur">Reamur<br>
            <input type="radio" name="suhuawal" id="kelvin0" value="kelvin">Kelvin<br>
            <label for="">Ke :</label><br>
            <input type="radio" name="suhuakhir" id="celcius1" value="celcius">Celcius<br>
            <input type="radio" name="suhuakhir" id="fahrenheit1" value="fahrenheit">Fahrenheit<br>
            <input type="radio" name="suhuakhir" id="reamur1" value="reamur">Reamur<br>
            <input type="radio" name="suhuakhir" id="kelvin1" value="kelvin">Kelvin<br>
            <button type="submit" name="submit">Konversi</button>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $nilai = $_POST['nilai'];
            $suhuawal = $_POST['suhuawal'];
            $suhuakhir = $_POST['suhuakhir'];
            $hasil = 0;
            switch ($suhuawal) {
                case 'fahrenheit':
                    $nilai = ($nilai - 32) * 5/9;
                    break;
                case 'reamur':
                    $nilai = $nilai * 5/4;
                    break;
                case 'kelvin':
                    $nilai = $nilai - 273.15;
                    break;
                default:
                    break;
            }
            switch ($suhuakhir) {
                case 'fahrenheit':
                    $hasil = $nilai * 9/5 + 32;
                    echo "<b>Hasil Konversi: $hasil &#176 F</b>";
                    break;
                case 'reamur':
                    $hasil = $nilai * 4/5;
                    echo "<b>Hasil Konversi: $hasil &#176 Re</b>";
                    break;
                case 'kelvin':
                    $hasil = $nilai + 273.15;
                    echo "<b>Hasil Konversi: $hasil K</b>";
                    break;
                default:
                    $hasil = $nilai; 
                    echo "<b>Hasil Konversi: $hasil &#176 C</b>"; 
                    break;
            }
        }
        ?>
    </body>
</html>