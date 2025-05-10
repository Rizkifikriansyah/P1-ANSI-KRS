<!DOCTYPE html>
<html>
<head>
    <title>Laporan KRS</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h2 align="center">Laporan Kartu Rencana Studi (KRS)</h2>
    <br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Kuliah</th>
                <th>Kelas</th>
                <th>Dosen</th>
                <th>Hari</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($krs as $k) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $k['mata_kuliah']; ?></td>
                    <td><?= $k['kelas']; ?></td>
                    <td><?= $k['dosen']; ?></td>
                    <td><?= $k['hari']; ?></td>
                    <td><?= $k['sks']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
