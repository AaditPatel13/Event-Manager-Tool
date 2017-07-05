<?php

require('support.php');


$title = '<br><h1> You have been successfully signed up. Enjoy! </h1>';

$body = <<< EOBODY
	<div class="text-center">
			<input type = "button" value = "Return" onclick="window.location='participantOptions.php'" class="btn btn-info">
	</div>
</html>
EOBODY;

$page = generatePage($body, $title);

echo $page;

?>
