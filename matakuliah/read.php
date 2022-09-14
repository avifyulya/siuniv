<?php
    include "../connect.php";

    $query = "SELECT kode, nama_matkul, sks, semester, nama_dosen
            FROM matakuliah LEFT JOIN dosen
            USING (id_dosen)
            ORDER BY kode";

    $result = mysqli_query($connect, $query);

    $num  = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border='1'>
        <tr>
        <th>NO.</th>
        <th>Kode</th>
        <th>Matakuliah</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Dosen Pengajar</th>
        <th colspan=2>Aksi</th>

        </tr>
<?php
    if($num>0){
        $no = 1;
        while ($data = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td> <?php echo $no; ?> </td>
                <td> <?php echo $data['kode'] ?></td>
                <td> <?php echo $data['nama_matkul'] ?></td>
                <td> <?php echo $data['sks'] ?></td>
                <td> <?php echo $data['semester'] ?></td>
                <td><?php
                    if($data['nama_dosen']!= NULL){
                        echo $data['nama_dosen'];
                    }else {echo "-";}
                    ?></td>
                <td> <a href= 'form-update.php?kode=<?php echo $data['kode']?>'>Edit</a></td>
                <td> <a href= 'delete.php?kode=<?php echo $data['kode']?>' onclick='return confirm("Apakah Anda yakin ingin menghapus data?")'>Delete</a></td>
            </tr>
        <?php
        $no++;
        }
    }
    else{
        echo "<tr> <td colspan= '7' > Tidak ada data </td><tr>";
    }
?>
</table>
<a href="/siuniv/dosen/read.php">Data Dosen</a><br>
<a href="form-create.php">Tambah Data </a><br>
</body>
</html>
