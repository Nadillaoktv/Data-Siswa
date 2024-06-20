<?php
session_start();
$buttonPrint = null;
$buttonHapus = null;

if(isset($_POST["btn"])) {
    $nama = $_POST["nama"];
    $nis = $_POST["nis"];
    $rayon = $_POST["rayon"];
    $dataAwal = false;
   
   if(isset($_SESSION["data_siswa"])) {
        foreach($_SESSION["data_siswa"] as $data) {
            if($data["nis"] == $nis){
                $dataAwal = true;
                break;
            }
        } 
   }
   if($dataAwal){
        echo "<h1>Data sudah ada</h1>";
   }else {
        $_SESSION["data_siswa"][] = [
            "nama" => $nama,
            "nis" => $nis,
            "rayon" => $rayon,
        ];
   }
}

if(isset($_SESSION["data_siswa"]) && !empty($_SESSION["data_siswa"])) {
    $buttonPrint = '<a href="print.php">Print Data</a>';
    $buttonHapus = '<a href="hapusall.php">Hapus semuanya</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container mt-4">
        <div class="form-container">
            <h2 class="text-center">Masukan Data Siswa</h2>  
            <form action="" method="post">
                <div class="input-container d-flex gap-2">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Siswa" required/>
                    <input class="form-control" type="number" name="nis" placeholder="Nis Siswa" required/>
                    <input class="form-control" type="text" name="rayon" placeholder="Rayon" required/>
                </div>
                <div class="btn-collapse mt-2">
                    <button class="btn btn-primary" type="submit" name="btn">Input +</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="btn-collapse mt-2">
            <button class="btn btn-primary"><a style="text-decoration: none; color: white;" href="hapusall.php">Hapus semuanya</a></button>
            <button class="btn btn-primary"><a style="text-decoration: none; color: white;" href="print.php">Print Data</a></button>
        </div>
        <br>

        <table class="table table-bordered table-stripped-columns">
            <thead>
                <tr class="table-container" style="text-align: center;">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Rayon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    $i =1;
                    
                    ?>
                    <?php if(isset($_SESSION["data_siswa"]) && is_array($_SESSION["data_siswa"]) ) :?>
                    <?php foreach($_SESSION["data_siswa"] as $key => $item) :?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $item["nama"];?></td>
                        <td><?= $item["nis"];?></td>
                        <td><?= $item["rayon"];?></td>
                        <td>
                            <button class='btn btn-danger btn-sm' type='submit'><a style="text-decoration: none; color: white;" href="hapus.php?id=<?= $key ;?>">Hapus</a></button>
                            <button class='btn btn-danger btn-sm' type='submit'><a style="text-decoration: none; color: white;" href="detail.php?id=<?= $key ;?>"> Detail </a></button>
                            <button class='btn btn-danger btn-sm' type='submit'><a style="text-decoration: none; color: white;" href="edit.php?id=<?= $key ;?>"> Edit </a></button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
            </tbody>   
        </table> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>