<h1>Tambah Data</h1>
<form action="in[ut-datadiri-tambah.php" method="POST">
    <label for="nis">Nomor Induk Siswa :</label>
    <input type="number" name="nis" placeholder="Ex.12333122"/><br>

    <label for="nama">Nama Lengkap :</label>
    <input type="text" name="nama" placeholder="Ex.Sintha Nur Wulan"/><br>

    <label for="tanggal_lahir">Tanggal Lahir :</label><br>
    <input type="date" name="tanggal_lahir"/><br>

    <label for="nilai">Nilai:</label><br>
    <input type="number" name="nilai" placeholder="Ex.80.56"/><br>

<input type="submit" name="simpan" value="Simpan Data"/>
<a href="input-datadiri.php">Kembali</a>
</form>

<?php
         include('./input-config.php');
         if($_SESSION["login"] != TRUE) {
            header('location:login.php');
      }

         if($_SESSION["role"] != "admin") {
            echo"
            <script>
            alert('Akses tidak diberikan, kamu bukan admin');
            window.location='input-datadiri.php';
            </script>
        ";
    }
      


        if( isset($_POST["simpan"]) ){
            echo $nis = $_POST["nis"];
            echo $nama = $_POST["nama"];
            echo $tanggal_lahir = $_POST["tanggal_lahir"];
            echo $nilai = $_POST["nilai"];

           //CREATE - Menambahakan Data ke Database
           $query ="
                    INSERT INTO datadiri VALUES
                    ('$nis','$nama','$tanggal_lahir','$nilai');
            ";
            $insert = mysqli_query($mysqli, $query);

            if($insert){
                echo"
                    <script>
                    alert('Data berhasil ditambahkan');
                    window.location='input-datadiri.php';
                    </script>
                ";
            }
        }
?>