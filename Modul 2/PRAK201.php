<html>
    <head>
        <title>PRAK201</title>
    </head>
    <body>
        <form action="" method="post">
            <label for="name1">Nama: 1</label>
            <input type="text" id="name1" name="name1"><br>
            <label for="name2">Nama: 2</label>
            <input type="text" id="name2" name="name2"><br>
            <label for="name3">Nama: 3</label>
            <input type="text" id="name3" name="name3"><br>
            <button type="submit" name="submit">Urutkan</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $name1 = $_POST['name1'];
            $name2 = $_POST['name2'];
            $name3 = $_POST['name3'];
            $names = [$name1, $name2, $name3];
            sort($names);
            foreach ($names as $name) {
                echo "$name<br>";
            }
        }
        ?>
    </body>
</html>