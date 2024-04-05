<html>
    <head>
        <style>
        table, td {
            border : 1px solid black;
        }
        th {
            border : 1px solid black;
            padding: 20px 0px 20px 0px;
            background-color: red;
            font-size: 24px;
        }
        </style>
    </head>
    <body>
        <table>
            <?php
            $samsung = array ("samsungGS22" => "Samsung Galaxy S22", "samsungGS22+" => "Samsung Galaxy S22+", "samsungGA03" => "Samsung Galaxy A03", "samsungGXcover5" => "Samsung Galaxy Xcover 5");
            ?>
            <tr>
                <th><b>Daftar Smartphone Samsung</b></th>
            </tr>
            <tr>
                <?php 
                foreach ($samsung as $x) {
                    echo "<tr>";
                    echo "<td>"."$x"."</td>";
                    echo "<tr>";
                }
                ?>
            </tr>
        </table>
    </body>
</html>