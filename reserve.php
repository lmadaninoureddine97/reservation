<?php

if(isset($_GET['date'])){
    $date=$_GET['date'];
}
if(isset($_POST['submit'])){
    $nom=$_POST['name'];
    $numero=$_POST['numero'];
    $date;
    $connect=mysqli_connect("localhost","root","","reservation");

   
    $stmt = $connect->prepare("INSERT INTO reserve (nom, numero, dat) VALUES (?,?,?)");


            $stmt->bind_param('sss', $nom, $numero, $date);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>reservation Successfull</div>";
           
          
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">reserve for time:<?php echo date('d/m/Y',strtotime($date));?></h1><hr>
        <div class="row">
           <div class="col-md-5 col-md-offset-3">
               <?php
               echo isset($msg)?$msg:''?>
               <form action="" method="POST" autocomplete="off">
                   <div class="form-group">
                       <label for="">votre nom</label>
                       <input type="text" class="form-control" name="name">
                   </div>
                   <div class="form-group">
                       <label for="">numero de telephone</label>
                       <input type="text" class="form-control" name="numero">
                   </div>
                   <button class="btn btn-primary" type="submit" name="submit">submit</button>
               </form>
           </div> 
        </div>
    </div>
</body>
</html>