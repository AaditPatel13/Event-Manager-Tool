<?php

function generatePage($body, $title="") {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Event Organizer</title>
    </head>

    <body>
      <div class="container">
        <div class="text-center">
          $title
        </div>
        <br /><br />
          $body
      </div>
    </body>
</html>
EOPAGE;

    return $page;
}
// <div class="jumbotron text-center">  --> Centers text in a grey jumbotron elements
?>
