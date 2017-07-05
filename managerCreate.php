<?php
    require("support.php");

    $body = <<<EOBODY
    <div class="center-justified">
    <form action="managerCreate2.php" method="post">

        <strong>Event Name: </strong>
          <div class="transbox"><input type="text" name="eventName" required="required"/></div>
          <br />
        <strong>Event ID: </strong>
          <div class="transbox"><input type="number" min="0" max="9999" name="eventID" class="trans" required="required"/></div>
          <br />
        <strong>Date: </strong>
          <div class="transbox"><input type="date" name="date" required="required"/></div>
          <br />
        <strong>Picture to upload: </strong>
          <div class="transbox"><input type="text" name="fileUpload" value="events.jpg"/></div>
          <br />
        <strong>Event Description: </strong><br>
          <textarea name="description" rows="8" cols="60" class="transbox"></textarea>
          <br><br>
        <input type="submit" name="submit" value="Submit" class="btn btn-success"/>&nbsp
        <input type="reset" value="Reset" class="btn btn-warning"/><br><br>
        <input type="button" name="return" value="Return to Main Menu" class="btn btn-primary active" onclick="window.location='managerOptions.php';"/>
    </form>
    </div>
    <br><br>
EOBODY;

    $page = generatePage($body,"<h1>Create Event</h1>");
    echo $page;
?>
