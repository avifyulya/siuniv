<?php
    include "../connect.php";
    $kode = $_GET['kode'];
    $query = "SELECT kode, nama_matkul, sks, semester, matakuliah.id_dosen, nama_dosen
                FROM matakuliah LEFT JOIN dosen USING(id_dosen)
                    WHERE kode = '$kode'";
    $result = mysqli_query($connect, $query);
    $data_dosen = mysqli_fetch_assoc($result);
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
        <h1>Ubah Data Matakuliah</h1>
        <form action="update.php" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Kode : </td>
                        <td><input type="text" name="kode" value="<?php echo $data_dosen['kode']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Matakuliah : </td>
                        <td><input type="text" name="nama_matkul" value="<?php echo $data_dosen['nama_matkul']; ?>"></td>
                    </tr>
                    <tr>
                        <td>SKS : </td>
                        <td><input type="text" name="sks" value="<?php echo $data_dosen['sks']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Semester : </td>
                        <td><input type="text" name="semester" value="<?php echo $data_dosen['semester']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Dosen Pengajar : </td>
                        <td>
                            <select name="id_dosen">
                                <option value="<?php echo $data_dosen['id_dosen']; ?>"><?php echo $data_dosen['nama_dosen']; ?></option>
                                <?php
                                    $query = "SELECT * FROM dosen";
                                    $result = mysqli_query($connect, $query);
                                    while($data = mysqli_fetch_assoc($result)){
                                        echo "<option value='$data[id_dosen]'>$data[nama_dosen]</option>";
                                    }
                                ?>
                            </select>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Simpan"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
    </html>