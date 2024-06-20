<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
<body>
<div class="container mt-4">
    <div class="form-container">
        <table class="table table-bodered table-stripped-colums">
            <tr class="table-container" style="text-align: center;">
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">Rayon</th>
                <th scope="col">Aksi</th>
            </tr>
            <?php if(isset($_SESSION["data_siswa"]) && is_array($_SESSION["data_siswa"]) ) :?>
            <?php foreach($_SESSION["data_siswa"] as $key => $item) :?>
            <tr>
                <td><?= $item["nama"];?></td>
                <td><?= $item["nis"];?></td>
                <td><?= $item["rayon"];?></td>
                <td>
                    <button class='btn btn-danger btn-sm'><a style="text-decoration: none; color: white;" href="hapus.php?id=<?= $key ;?>">Hapus</a></button>
                    <button class='btn btn-danger btn-sm'><a style="text-decoration: none; color: white;" href="detail.php?id=<?= $key ;?>"> Detail </a></button>
                    <button class='btn btn-danger btn-sm'><a style="text-decoration: none; color: white;" href="edit.php?id=<?= $key ;?>"> Edit </a></button>
                </td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
        </table>
        <button  class="btn btn-primary" type="button" id="btn">Print</button>
            <script>
            document.getElementById('btn').addEventListener('click', function(){
                    window.print();
                })
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>

</div>
    
</body>
</html>