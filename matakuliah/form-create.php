<?php
 include "../connect.php";

 $query = "SELECT id_dosen, nama_dosen FROM dosen";
 $result = mysqli_query($connect, $query);
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
 <h1>TAMBAH DATA </h1>
        <form action="create.php" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Kode : </td>
                        <td><input type="text" name="kode"></td>
                    </tr>
                    <tr>
                        <td>Matakuliah : </td>
                        <td><input type="text" name="nama_matkul" ></td>
                    </tr>
                    <tr>
                        <td>SKS : </td>
                        <td><input type="text" name="sks" ></td>
                    </tr>
                    <tr>
                        <td>Semester : </td>
                        <td><input type="text" name="semester" ></td>
                    </tr>
                    <tr>
                        <td>Dosen Pengajar : </td>
                        <td>
                        <select name="id_dosen">
                            <option value="">Pilih Dosen</option>
                            <?php
                            if(mysqli_num_rows($result) > 0){
                                while($data = mysqli_fetch_assoc($result)){
                                    echo "<option value='".$data['id_dosen']."'>".$data['nama_dosen']."</option>";
                                }
                            }
                            ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Simpan"></td>
                    </tr>
                </tbody>
            </table>
        </form>
 </body>
 </html>