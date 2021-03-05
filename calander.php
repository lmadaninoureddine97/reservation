
<?php
include "database/db-calander.php";
if(file_exists("database/db-calander.php")){
    echo "exist";
}else{
    echo "not exist";
}
function build_calendar($month,$year){
    // $connect=mysqli_connect("localhost","root","","reservation");
    // $stmt=$connect->prepare("SELECT * FROM reserve WHERE MONTH(date)=? AND YEAR(date)=?");
    // $stmt->bind_param('ss',$month,$year);
    // $reserving=array();
    // if($stmt->execute()){
    //     $resul=$stmt->get_result();
        // if($resul->num_rows>0){
        //     while($row=$resul->fetch_assoc()){
        //         $reserving[]=$row['date'];
        //     }
          
        //    $stmt->close();
        // }
        
    // }

    $daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    // What is the first day of the month in question?
$firstDayOfMonth = mktime(0,0,0,$month,1,$year);

// How many days does this month contain?
$numberDays = date('t',$firstDayOfMonth);

// Retrieve some information about the first day of the
// month in question.
$dateComponents = getdate($firstDayOfMonth);

// What is the name of the month in question?
$monthName = $dateComponents['month'];

// What is the index value (0-6) of the first day of the
// month in question.
$dayOfWeek = $dateComponents['wday'];
// Create the table tag opener and day headers 
$datetoday = date('Y-m-d'); 
$calendar = "<table class='table table-bordered'>"; 
$calendar .= "<center><h2>$monthName $year</h2>"; 
$calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m',mktime(0,0,0,$month-1,1,$year))."&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."' >Previous month </a>";

$calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>curent month </a>";

$calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m',mktime(0,0,0,$month+1,1,$year))."&year=".date('Y',mktime(0,0,0,$month+1,1,$year))."' >Next month </a></center><br>";

$calendar .= "<tr>"; 
// Create the calendar headers 
foreach($daysOfWeek as $day) { 
     $calendar .= "<th class='header'>$day</th>"; 
} 
// Create the rest of the calendar
// Initiate the day counter, starting with the 1st. 
$currentDay = 1;
$calendar .= "</tr><tr>";
// The variable $dayOfWeek is used to 
// ensure that the calendar 
// display consists of exactly 7 columns.
if($dayOfWeek > 0) { 
    for($k=0;$k<$dayOfWeek;$k++){ 
        $calendar .= "<td class='empty'></td>"; 
    } 
}
$month = str_pad($month, 2, "0", STR_PAD_LEFT);
while ($currentDay <= $numberDays) { 
    //Seventh column (Saturday) reached. Start a new row. 
    if ($dayOfWeek == 7) { 
        $dayOfWeek = 0; 
        $calendar .= "</tr><tr>"; 
    } 
    $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT); 
    $date = "$year-$month-$currentDayRel"; 
    $dayname = strtolower(date('l', strtotime($date))); 
    $eventNum = 0; 
    $today = $date==date('Y-m-d')? "today" : "";
 $today=$date==date('Y-m-d')?"today":"";
 if($date<date('Y-m-d')){
     $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
 }elseif(in_array($date,$reserving)){
    $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>déja reserver</button>";    
 }
 
 else{
    $calendar.="<td class='$today'><h4>$currentDay</h4><a href='reserve.php?date=".$date."' class='btn btn-success btn-xs'>reserver</a>";

 }
    $calendar .="</td>"; 
    //Increment counters 
    $currentDay++; 
    $dayOfWeek++; 
} 
//Complete the row of the last week in month, if necessary 
if ($dayOfWeek != 7) { 
    $remainingDays = 7 - $dayOfWeek; 
    for($l=0;$l<$remainingDays;$l++){ 
        $calendar .= "<td class='empty'></td>"; 
    } 
} 

$calendar .= "</tr>"; 
$calendar .= "</table>";
echo $calendar;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="calandar.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body> 
 <div class="container"> 
  <div class="row"> 
   <div class="col-md-12"> 
   
     <?php 
      $dateComponents = getdate(); 
      $month = $dateComponents['mon']; 
      $year = $dateComponents['year']; 
      echo build_calendar($month,$year); 
     ?> 

   </div> 
  </div> 
 </div> 
</body>
</html>