<html>
    <head>
        <style>
        table, th, td {
            border : 1px solid black;
        }
        </style>
    </head>
    <body>
        <table>
            <?php
            $samsung = array ("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5");
            ?>
            <tr>
                <th><b>Daftar Smartphone Samsung</b></th>
            </tr>
            <tr>
                <?php foreach ($samsung as $x) {
                    echo "<tr>";
                    echo "<td>". "$x". "</td>";
                    echo "<tr>";
                }
                ?>
            </tr>
        </table>
    </body>
</html>