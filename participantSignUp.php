<?php
    require("support.php");
    require("database.php");
    session_start();


     $db = new database("events");
     $database = $db->connectToDB();
     $sqlQuery = sprintf("select eventName, date, eventID from {$db->getTable()}");
     $result = mysqli_query($database, $sqlQuery);
     $top = "";
     $array = Array();
     $body = "";
     $error = "";
     $title = "";
     $_SERVER["yolo"] = 5;

     if(isset($_POST['submit'])){
     	$_SERVER["eventIDs"] = $_POST['eventIDs'];
     }

        if($result){
            $numberOfRows = mysqli_num_rows($result);

            if ($numberOfRows == 0) {
                $error = "<br><h2>No entries exists in the table.</h2>";
            } else {
            	while($temp = $result->fetch_assoc()){
					        array_push($array, $temp);
				      }

              $title = "<br><h1> Events </h1>";
      				$top .= "<form action = \"eventPage.php\" method = \"post\">";
      				$top .= "<table align='center' border = \"1\"><tr><th>Event Name</th><th>Date</th><th>ID</th></tr>";

      				for($i = 0; $i < count($array); $i++){
                $id = $array[$i]["eventID"];
					      $top .= "<tr><td>".$array[$i]["eventName"]."</td>";
                $top .= "<td>".$array[$i]["date"]."</td>";
					      $top .= "<td>".$array[$i]["eventID"]."</td></tr>";
				      }
				      $top .= "</table><br><br>";
            }
        }


        $body = <<<EOBODY
        <div class="text-center">
          <form action="eventPage.php" method="post">
              <input type="button" value="Back" name = "back" onclick="window.history.back();" class="btn btn-warning">&emsp;
              <input type="text" value="1,2,3" name = "eventIDs">&emsp;
              <input type="submit" value="Submit" name = "submit" class="btn btn-success">
          </form>
          <br><br>
          Enter the IDs of the events that you are interested in seperated by a comma
          <br><br>
        </div>
EOBODY;

    if($error != ""){
    	echo $error;
    }else{
		$page = generatePage($top.$body, $title);
    echo $page;

    }


 ?>
