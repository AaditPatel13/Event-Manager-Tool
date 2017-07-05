<?php
    require("support.php");
    require("database.php");

    session_start();

    $title = "";
    $body = "";

    $eid = Array();

    function comp($ele,$array) {
      global $title;

        for($i = 0; $i < count($array); $i++){
            if($array[$i]["eventID"] == $ele){
                array_push($_SESSION['viewIDs'], $ele);
                echo "<fieldset>";
                echo "<legend>";
                echo "<h2><strong>".$array[$i]["eventName"]. "</strong></h2>";
                echo "</legend>";
                echo "<br/>";
                $photo = $array[$i]["picture"];
                echo '<img src="data:image/jpeg;base64,'.base64_encode($photo).'"/>';
                echo "<br/><br/>"; 
                echo "<div id = \"info\">";
                echo "<strong>Id: </strong>".$array[$i]["eventID"];
                echo "<br/>";
                echo "<strong>Date: </strong>".$array[$i]["date"]; 
                echo "<br/>";
                echo "<strong>Description: </strong>".$array[$i]["description"];
                echo "<br/>";
                echo "</div>";
                echo "</fieldset>";
                break;
            } else {
            }
        }
    }
    $array = Array();
    $db = new database("eventIDs");
    $database = $db->connectToDB();
    $sqlQuery = sprintf("select * from events");
    $result = mysqli_query($database, $sqlQuery);
    while($temp = $result->fetch_assoc()){
        array_push($array, $temp);
    }  

    $eventIDs = explode(",", $_POST['eventIDs']);


    for($i = 0; $i < count($eventIDs); $i++){
        comp($eventIDs[$i], $array);
        echo "<br/> <br/>";
    }

    $body = <<<EOBODY
  <div class="text-center">
      <input type = "submit" name = "Sign Up" onclick="window.location='signupSubmit.php'" class="btn btn-success">
      <input type = "button" value = "Back" name = "Back" onclick="window.location='participantSignUp.php'" class="btn btn-warning">
  </div>

EOBODY;

echo generatePage($body, $title);

?>
