<?php
    include "../connect.php";

    $id_dosen = $_GET['id_dosen'];

    $query = "SELECT * FROM dosen WHERE id_dosen = $id_dosen";
    
    $result = mysqli_query($connect, $query);

    $row = mysqli_fetch_assoc($result);
    
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
    <form action="update.php" method="post">
    <table>
    <tr>
        <td><label for="nama">Nama dosen</lable></td>
        <td>:</td>
        <td><input type ="text" name="nama_dosen" id="nama" value="<?php echo $row['nama_dosen']; ?>" ></td>
    </tr>
    <tr>
        <td><label for="no_telp">No. Telepon</lable></td>
        <td>:</td>
        <td><input type ="text" name="telp" id="no_telp" value="<?php echo $row['telp11']; ?>" ></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="hidden" name="id_dosen" value="<?php echo $row['id_dosen']; ?>"></td>
        <td><input type="submit" value="Simpan" name="btnSimpan"></td>
    </tr>
    </table>
</form>
</body>
</html>