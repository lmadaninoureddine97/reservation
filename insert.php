<?php
  date_default_timezone_set('Africa/Casablanca');
 echo "<br>";
$afterSixMonth=time()+(180*24*60*60);
echo "the date of after six month is " .date('l-jS-F-Y \of H:i:s a',$afterSixMonth);
echo "<br>";
echo date("t", "F" );
include "database.php";

        if(isset($_POST['submit']))
        {	 
            $name=$_POST['name'];
            $numero=$_POST['numero'];
            $jour=$_POST['jour'];
            $heure=$_POST['houres'];
            $date=$_POST['date'];
             $sql = "INSERT INTO reservation (nom,numero,jour,heure,date)
             VALUES ('$name',' $numero',' $jour',' $heure',' $date')";
             if (mysqli_query($database, $sql)) {
                echo "New record created successfully !";
             } else {
                echo "Error: " . $sql . "
        " . mysqli_error($database);
             }
             mysqli_close($database);
        }
      
        ?>
