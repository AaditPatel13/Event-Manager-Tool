<?php
    require("support.php");

    session_start();

    if(isset($_POST["create"])){
        header("Location: managerCreate.php");
    } elseif(isset($_POST["view"])){
        header("Location: managerView.php");
    } elseif(isset($_POST["return"])){
        header("Location: main.php");
    }
    $user = $_SESSION['firstName'];

    $body = <<< EOBODY
    <div class="text-center">
      <h2>Welcome $user !</h2>
      <br /><br />
      <form action="managerOptions.php" method="post">
          <input type="submit" name="create" value="Create Event" class="btn btn-success"/><br><br>
          <input type="submit" name="view" value="View My Events" class="btn btn-info"/><br><br>
          <input type="submit" name="return" value="Log Out" class="btn btn-danger"/>
      </form>
    </div>
EOBODY;

    $page = generatePage($body,"<br><h1>Manager Options</h1>");
    echo $page;
?>
