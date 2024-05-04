<html>
    <head>
        <title>PRAK305</title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="text" required>
            <button type="submit" name="submit">Submit</button></br>
        </form>
        <?php
        if (isset($_POST['submit'])){
            $text = $_POST['text'];
            $panjang = strlen($text);
            $input = str_split($text);
            $j=0;
            $k=0;
            while ($k < $panjang){
                echo strtoupper ($input[$j]);
                for ($i=1; $i<$panjang; $i++){
                    echo strtolower ($input[$j]);
                }
                $k++;
                $j++;
            }
        }
        ?>
    </body>
</html>