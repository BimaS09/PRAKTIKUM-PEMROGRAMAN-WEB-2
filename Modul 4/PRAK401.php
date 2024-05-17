<html>
    <head>
        <title>PRAK401</title>
    </head>
    <body>
        <form method="post">
            Panjang: <input type="text" name="panjang" value="<?php echo isset($_POST['panjang']) ? htmlspecialchars($_POST['panjang']) : ''; ?>"><br>
            Lebar: <input type="text" name="lebar" value="<?php echo isset($_POST['lebar']) ? htmlspecialchars($_POST['lebar']) : ''; ?>"><br>
            Nilai: <input type="text" name="nilai" value="<?php echo isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : ''; ?>"><br>
            <input type="submit" name="submit" value="Cetak">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $panjang = intval($_POST['panjang']);
            $lebar = intval($_POST['lebar']);
            $nilai = explode(' ', $_POST['nilai']);
            if (count($nilai) != $panjang * $lebar) {
                echo "Panjang nilai tidak sesuai dengan ukuran matriks";
            } else {
                echo "<table border='1' cellspacing='0' cellpadding='5'>";
                for ($i = 0; $i < $panjang; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $lebar; $j++) {
                        echo "<td>" . htmlspecialchars($nilai[$i * $lebar + $j]) . "</td>";
                    }echo "</tr>";
                }echo "</table>";}}?>
    </body>
</html>