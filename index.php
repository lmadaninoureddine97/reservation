<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleindex.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <form action="insert.php" method="POST">
        <label for="">name</label><br>
            <input type="text" name="name"><br>
            <label for="">numero de telephone</label><br>
            <input type="text" name="numero"><br>
            <label for="">jour</label><br>
            <input type="text" name="jour"><br>
            <label for="cars">Choose une houre:</label><br>


<select name="houres" id="houres">
<option></option>
  <option value="6H-7H">6H-7H</option>
  <option value="7H-8H">7H-8H</option>
  <option value="8H-9H">8H-9H</option>
  <option value="9H-10H">9H-10H</option>
  <option value="10H-11H">10H-11H</option>
  <option value="11H-12H">11H-12H</option>
 
</select>
<br><br>
        
            <label for="">date</label><br>
            <input type="date" name="date">
            <input type="submit" name="submit" id="">

        </form>


    </div>
    <?php
include_once 'database.php';
$result = mysqli_query($database,"SELECT * FROM reservation");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="table">
  <table  class="styled-table">
  
  <thead>
        <tr>
            <th>Name</th>
            <th>numero de telephone</th>
            <th>jour</th>
            <th>heure</th>
            <th>date</th>
        </tr>
    </thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tbody>
        <tr class="active-row">
        <td><?php echo $row['nom'];?></td>
            <td><?php echo $row['numero'];?></td>
            <td><?php echo $row['jour'];?></td>
            <td><?php echo $row['heure'];?></td>
            <td><?php echo $row['date'];?></td>
        </tr>
      
        <!-- and so on... -->
    </tbody>
<?php
$i++;
}


?>
</table>
</div>
 <?php
}
else{
    echo "No result found";
}

?>

</body>
</html>