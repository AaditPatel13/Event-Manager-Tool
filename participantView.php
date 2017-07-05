<?php
    require("support.php");
    require("database.php");

    session_start();
    $name = "";
    $Id = "";
    $date = "";
    $description = "";
    $db = new database("events");
    $database = $db->connectToDB();
    $sqlQuery = sprintf("select eventName, eventID, description, date from events where eventID = ");
    echo "<br><h1>Events that you are attending</h1><br/>";
    $body = '';

    function view($ele, $array, $str, $database){
    	$str .= $ele;
    	$result = mysqli_query($database, $str);


    	while($temp = $result->fetch_assoc()){
			     array_push($array, $temp);
		  }

      echo "<fieldset>";
  		echo "<legend><h3>".$array[0]["eventName"]." </h3></legend>";
  		echo "<strong>Id: </strong>".$array[0]["eventID"]."<br/>";
  		echo "<strong>Date: </strong>".$array[0]["date"]."<br/>";
  		echo "<strong>Description: </strong>".$array[0]["description"]."<br/>";
  		echo "</fieldset> <br/> <br/>";
    }


     $array = Array();
     $tempArr = Array();
     if(!isset($_SESSION['viewIDs'])){
        echo "<h2><strong>No Events to View</strong></h2>";
     }

    if(isset($_SESSION['viewIDs'])){
        $tempArr = $_SESSION['viewIDs'];
     }

     for($i = 0; $i < count($tempArr); $i++){
     	view($tempArr[$i], $array, $sqlQuery, $database);
     }

     $body .= "<div class='text-center'>";
     $body .= "<input type = \"button\" value = \"Back\" class=\"btn btn-warning\" onclick=\"window.location='participantOptions.php'\">";
     $body .= "</div>";


     $page = generatePage($body);

     echo $page;

?>
