<?php
    require("support.php");

    if(isset($_POST["managerLogin"])){
        header("Location: managerLogin.php");
    } elseif(isset($_POST["participantLogin"])){
        header("Location: participantLogin.php");
    } elseif(isset($_POST["signUp"])){
        header("Location: signUp.html");
    }

    $body = <<<EOBODY
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <ul class="nav nav-tabs">
          <li><a data-toggle="tab" href="#signUp"><h4>Sign up for free!</h4></a></li>
          <li class="active"><a data-toggle="tab" href="#managerLogin"><h4>Event Manager Login</h4></a></li>
          <li><a data-toggle="tab" href="#participantLogin"><h4>Participant Login</h4></a></li>
        </ul>

        <div class="tab-content">
          <div id="signUp" class="tab-pane fade">
            <div class="text-center">
            <br />
                <h4>General Information</h4>
                <br />
                <form action="processSignUp.php" method="post" id="signUpForm">
                    <fieldset>
                        <strong>First Name: </strong>
                            <input type="text" name="firstName" placeholder="First Name" required="required"/><br /><br />
                        <strong>Last Name: </strong>
                            <input type="text" name="lastName" placeholder="Last Name" required="required"/><br><br>
                        <strong>Email: </strong>&emsp;&emsp;&nbsp
                            <input type="email" name="email" placeholder="email@email.com" required="required"/><br><br>
                        <strong>Phone: </strong>
                            <input  maxlength="3" size="3" type="text" id="phoneFirstPart" name="phoneFirstPart" required="required"/>
                            - <input maxlength="3" size="3" type="text" id="phoneSecondPart" name="phoneSecondPart" required="required"/>
                            - <input maxlength="4" size="4" type="text" id="phoneThirdPart" name="phoneThirdPart" required="required"/>&emsp;
                        <strong>Age: </strong><input type="text" id="age" name="age" required="required" size="4"/>&nbsp&nbsp&nbsp&nbsp<br><br>
                        <strong>Password: &emsp;&emsp;</strong><input type="password" id="password" name="password" required="required"/><br><br>
                        <strong>Confirm Password: </strong><input type="password" id="confirmPW" name="confirmPW" required="required"/><br><br><br>
                        <strong>Account type: </strong>&emsp;&emsp;
                            <input type="radio" name="accType" value="Participant" checked="checked"/>&nbsp<strong>Participant</strong>&emsp;
                            <input type="radio" name="accType" value="Manager"/>&nbsp<strong>Manager</strong><br><br><br>
                        <input type="submit" name="submit" value="Sign Up" class="btn btn-success" onsubmit="validateForm()" />&nbsp
                        <input type="reset" value="Reset" class="btn btn-warning"/><br><br>
                    </fieldset>
                </form>
          </div>
          </div>
          <div id="managerLogin" class="tab-pane fade in active">
              <br /><br /><br />
              <div class="text-center">
              <form action="managerLogin.php" method="post">
                  <strong>Email: </strong><input type="email" name="email" placeholder="email@email.com"/><br><br>
                  <strong>Password: </strong><input type="password" name="password"/><br><br><br>
                  <input type="submit" name="submit" class="btn btn-success" value="Submit"/><br><br>
              </form>
              </div>
          </div>
          <div id="participantLogin" class="tab-pane fade">
              <br /><br /><br />
              <div class="text-center">
              <form action="participantLogin.php" method="post">
                  <strong>Email: </strong><input type="email" name="email" placeholder="email@email.com"/><br><br>
                  <strong>Password: </strong><input type="password" name="password"/><br><br><br>
                  <input type="submit" name="submit" class="btn btn-success" value="Submit"/><br><br>
              </form>
              </div>
          </div>
        </div>
        <script src="signUp.js"></script>
EOBODY;


    $page = generatePage($body,"<br><h1>Event Organizer</h1><h3>Plan and Join Events Near You!</h3>");
    echo $page;
?>
