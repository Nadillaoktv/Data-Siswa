<?php 
session_start();

if(isset($_GET["id"])){
	$id = $_GET["id"];
	$value = null;
	foreach($_SESSION["data_siswa"] as $key => $data){
		if($key == $id)
		{
			$value = $data;
		}
	}


	if($value == null){
		header("Location: index.php");
		exit;
	}
}

if(isset($_POST["btn"])){
    
    $nama = $_POST["nama"];
    $nis= $_POST["nis"];
    $rayon = $_POST["rayon"];

    $_SESSION["data_siswa"][$id] = [
        "nama" => $nama,
        "nis" => $nis,
        "rayon" =>$rayon
    ];

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="form-container">
            <div class="input-container d-flex gap-2">
                <form action="" method="post">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" name="nama" id="nama" value="<?= $value["nama"];?>" required>
                        <label for="nis">NIS Siswa</label>
                        <input type="number" name="nis" id="nis" value="<?= $value["nis"];?>"  required>
                        <label for="rayon">Rayon</label>
                        <input type="text" name="rayon" id="rayon" value="<?= $value["rayon"];?>"  required>
                </form> 
            </div>
            <div class="btn-collapse mt-2">
                <button class="btn btn-primary" type="submit" name="btn" id="btn">Input Data</button>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>