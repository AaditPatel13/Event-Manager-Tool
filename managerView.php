<?php
    require("support.php");
    require("database.php");

    session_start();

    $db = new database("events");
	  $database = $db->connectToDB();

    $sqlQuery = sprintf("select * from {$db->getTable()}");
	  $result = mysqli_query($database, $sqlQuery);

    if($result){
        $numberOfRows = mysqli_num_rows($result);
 	 	if ($numberOfRows == 0) {
			$body = "<h2>No entries exists in the table.</h2>";
		} else {
      $body = "";
      $body .= "<table align=\"center\" border=\"1\">";
      $body .= "<tr><th>Picture</th><th>Event ID</th><th>Event Name</th><th>Date</th><th>Description</th></tr>";
      $check = 0;

			while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		     	$eventID = $recordArray["eventID"];
                $eventName = $recordArray["eventName"];
                $date = $recordArray["date"];
                $description = $recordArray["description"];
                $picture = $recordArray["picture"];
                $image = "<img src=\"data:image/jpeg;base64,".base64_encode($picture)."\"width=\"150\" height=\"150\"/>";
                $email = $recordArray["email"];

                if($_SESSION["email"] == $email){
                    $check ++;
                    $body .= "<tr><td>$image</td><td>$eventID</td><td>$eventName</td><td>$date</td><td>$description</td></tr>";
                }
     		}
			$body .= "</table><br><br>";
            if($check == 0){
                $body .= "<h1>No entry exists in the database for the specified Manager.</h1><br>";
            }
		}
		mysqli_free_result($result);
    } else{
        $body = "Retrieving records failed.".mysql_error($database);
    }

    $button = <<<EOBODY
    <div class="text-center">
    <form action="managerOptions.php" method="post">
        <input type="submit" value="Back to Manager Options" class="btn btn-warning"/>
    </form>
    </div>
EOBODY;



    $page = generatePage($body.$button."<br><br>","<br><h1>Viewing Manager Events</h1>");
    echo $page;

?>
