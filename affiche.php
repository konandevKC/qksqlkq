<?php
$servername = "localhost";
$username = "spcom_userkonan";
$password = "RXAOSZX5GJBV";
$dbname = "spcom_konan";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifiez la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
} 

$queri = "SELECT * FROM suggestions ORDER BY id_me DESC ";
$fai = mysqli_query($conn,$queri);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h1 align="center"><b>Boite à suggestions</b></h1>
<div class="card">
   
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>N°</th>
                                <th>faculté</th>
                                <th>email </th>
                                <th>messages</th>
                                <th>date de publication</th>
                                <!-- <th>Action</th> -->
                            </tr>
                            <?php
                            
                            while($a = mysqli_fetch_assoc($fai)){
            if(isset($a['id_me'])){
          
        ?>
                            <tr>
                                <td><?= $a['id_me'] ?></td>
                                <td><?= $a['email'] ?></td>
                                <td><?= $a['numr'] ?></td>
                                 <td><?= $a['messages'] ?></td>
                                 <td><?= $a['datepub'] ?></td>
                            </tr>
                            <?php
            
        }else{
   
                            ?>
                            <tr>
                                <td colspan="5">No Data Found</td>
                            </tr>
                           <?php
                           }
                        }
                           ?>
                        </table>
                    </div>
                </div>
            </div>

<?php

?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>