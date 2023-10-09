<?php
session_start();
include "../includes/dbconnection.php";
include "includes/admin.header.php"; 
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col">
            <h1>Main page</h1>
            <?php 
                if (isset($_SESSION['username'])) {
                    echo '<h4>You are logged in as '. $_SESSION['username']. ' as admin</h4>';
                } else {
                    echo '<h4>You are not logged in</h4>';
                }
            ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <div class="table">
        <?php 
// Get the current date
$date = getdate();

// Get the value of day, month, year
$mday = $date['mday'];
$mon = $date['mon'];
$wday = $date['wday'];
$month = $date['month'];
$year = $date['year'];


$dayCount = $wday;
$day = $mday;

while($day > 0) {
	$days[$day--] = $dayCount--;
	if($dayCount < 0)
		$dayCount = 6;
}

$dayCount = $wday;
$day = $mday;

if(checkdate($mon,31,$year))
	$lastDay = 31;
elseif(checkdate($mon,30,$year))
	$lastDay = 30;
elseif(checkdate($mon,29,$year))
	$lastDay = 29;
elseif(checkdate($mon,28,$year))
	$lastDay = 28;

while($day <= $lastDay) {
	$days[$day++] = $dayCount++;
	if($dayCount > 6)
		$dayCount = 0;
}	

// Days to highlight
$day_to_highlight = array(8, 9, 10, 11, 12, 22,23,24,25,26);

echo("<tr>");
echo("<th colspan='7' align='center'>$month $year</th>");
echo("</tr>");
echo("<tr>");
	echo("<td class='red bg-yellow'>Sun</td>");
	echo("<td class='bg-yellow'>Mon</td>");
	echo("<td class='bg-yellow'>Tue</td>");
	echo("<td class='bg-yellow'>Wed</td>");
	echo("<td class='bg-yellow'>Thu</td>");
	echo("<td class='bg-yellow'>Fri</td>");
	echo("<td class='bg-yellow'>Sat</td>");
echo("</tr>");

$startDay = 0;
$d = $days[1];

echo("<tr>");
while($startDay < $d) {
	echo("<td></td>");
	$startDay++;
}

for ($d=1;$d<=$lastDay;$d++) {
	if (in_array( $d, $day_to_highlight))
		$bg = "bg-green";
	else
		$bg = "bg-white";
	// Highlights the current day	
	if($d == $mday)
		echo("<td class='bg-blue'><a href='#' title='Detail of day'>$d</a></td>");
	else 
		echo("<td class='$bg'><a href='#' title='Detail of day'>$d</a></td>");


	$startDay++;
	if($startDay > 6 && $d < $lastDay){
		$startDay = 0;
		echo("</tr>");
		echo("<tr>");
	}
}
echo("</tr>");
?>
    </div>
</div>