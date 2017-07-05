<?php
    require("support.php");

    session_start();

    if(isset($_POST["signup"])){
        header("Location: participantSignUp.php");
    } elseif(isset($_POST["view"])){
        header("Location: participantView.php");
    } elseif(isset($_POST["return"])){
        header("Location: main.php");
    }

    $body = <<< EOBODY
    <div class="text-center">
        <form action="participantOptions.php" method="post">
            <input type="submit" name="signup" value="Sign Up For Events" class="btn btn-success"/><br><br>
            <input type="submit" name="view" value="View My Events" class="btn btn-info"/><br><br>
            <input type="submit" name="return" value="Log Out" class="btn btn-danger"/>
        </form>
    </div>
EOBODY;

    $page = generatePage($body,"<br><h1>Welcome!</h1><br>");
    echo $page;
?>
