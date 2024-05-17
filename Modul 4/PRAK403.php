<html>
    <head>
        <title>PRAK403</title>
        <style>
        table, tr, td, th {
            border-collapse: collapse;
            border: 1px solid;
            padding: 5px;
            text-align: left;}
        </style> 
    </head>
    <body>
        <?php
        $mahasiswa = [
            ["no"=> 1, "nama" => "Ridho", "matkul" => ["Pemrograman 1", "Praktikum Pemrograman 1", "Pengantar Lingkungan Lahan Basah", "Arsitektur Komputer"], "sks"=>[2, 1, 2, 3]],
            ["no"=>2, "nama" => "Ratna", "matkul" => ["Basis Data 1", "Praktikum Basis Data 1", "Kalkulus"], "sks"=>[2, 1, 3]],
            ["no"=>3, "nama" => "Tono", "matkul" => ["Rekayasa Perangkat Lunak", "Analisa dan Perancangan Sistem", "Komputasi Awan", "Kecerdasan Bisnis"], "sks"=>[3, 3, 3, 3]],];
        foreach ($mahasiswa as $key => $value) {
            $mahasiswa[$key]['total'] = array_sum($value['sks']);
            $mahasiswa[$key]['ket'] = ($mahasiswa[$key]['total'] < 7) ? "Revisi KRS" : "Tidak Revisi";}?>
        <table>
            <tr bgcolor = "CCCDCC">
                <th>No</th>
                <th>Nama</th>
                <th>Mata Kuliah diambil</th>
                <th>SKS</th>
                <th>Total SKS</th>
                <th>Keterangan</th>
            </tr>
            <?php
            foreach($mahasiswa as $mhs){?>
                <tr>
                    <td><?php echo $mhs["no"]; ?></td>
                    <td><?php echo $mhs["nama"]; ?></td>
                    <td><?php echo $mhs["matkul"][0]; ?></td>
                    <td><?php echo $mhs["sks"][0]; ?></td>
                    <td><?php echo $mhs["total"]; ?></td>
                    <td bgcolor="<?php echo $mhs['total'] < 7 ? '#FF3131' : '#1AA857'; ?>"><?php echo $mhs["ket"]; ?></td>
                </tr>
                <tr>
                    <td></td><td></td>
                    <td><?php echo $mhs["matkul"][1]; ?></td>
                    <td><?php echo $mhs["sks"][1]; ?></td>
                    <td></td><td></td>
                </tr>
                <tr>
                    <td></td><td></td>
                    <td><?php echo $mhs["matkul"][2]; ?></td>
                    <td><?php echo $mhs["sks"][2]; ?></td>
                    <td></td><td></td>
                </tr>
                <?php
                if(!empty($mhs['matkul'][3])){?>
                <tr>
                    <td></td><td></td>
                    <td><?php echo $mhs["matkul"][3]; ?></td>
                    <td><?php echo $mhs["sks"][3]; ?></td>
                    <td></td><td></td>
                </tr>
                <?php
                }}?>
        </table>
    </body>
</html>