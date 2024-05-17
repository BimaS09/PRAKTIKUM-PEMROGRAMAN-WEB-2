<html>
    <head>
        <title>PRAK402</title>
        <style>
            table, tr, td, th {
                border: solid 1px black;
                border-collapse: collapse;
                padding: 5px;}
        </style>
    </head>
    <body>
        <?php
        $students = [
            ["Nama" => "Andi", "NIM" => "2101001", "Nilai UTS" => 87, "Nilai UAS" => 65],
            ["Nama" => "Budi", "NIM" => "2101002", "Nilai UTS" => 76, "Nilai UAS" => 79],
            ["Nama" => "Tono", "NIM" => "2101003", "Nilai UTS" => 50, "Nilai UAS" => 41],
            ["Nama" => "Jessica", "NIM" => "2101004", "Nilai UTS" => 60, "Nilai UAS" => 75]];
        function calculateFinalScore($uts, $uas) {
            return (0.4 * $uts) + (0.6 * $uas);}
        function getLetterGrade($finalScore) {
            if ($finalScore >= 80) {
                return 'A';
            } elseif ($finalScore >= 70) {
                return 'B';
            } elseif ($finalScore >= 60) {
                return 'C';
            } elseif ($finalScore >= 50) {
                return 'D';
            } else {
                return 'E';}}
        foreach ($students as &$student) {
            $student["Nilai Akhir"] = calculateFinalScore($student["Nilai UTS"], $student["Nilai UAS"]);
            $student["Huruf"] = getLetterGrade($student["Nilai Akhir"]);}
        unset($student);
        echo "<table style='width: 600px'>";
        echo "<tr style='text-align: left; background-color: lightgrey;'>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>";
        foreach ($students as $student) {
            echo "<tr>
                <td>{$student['Nama']}</td>
                <td>{$student['NIM']}</td>
                <td>{$student['Nilai UTS']}</td>
                <td>{$student['Nilai UAS']}</td>
                <td>{$student['Nilai Akhir']}</td>
                <td>{$student['Huruf']}</td>
            </tr>";}
        echo "</table>"; ?>
    </body>
</html>