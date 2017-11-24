<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="semantic.css">
	</head>
	<body>
		<div class="ui grid">
			<h1 class="ui header">Your game library:</h1>
			<div class="three column row">
				<?php  
					for ($i=0; $i < count($totalfriends); $i++) {
						echo '
							<div class="column">
								<div class="ui segment">
									<img src="' . $friendspic[$i] . '">
									<h4>Friends name: ' . $friendname[$i] . '</h4>
								</div>
							</div>';


					}
				?>
			</div>
		</div>
	</body>
</html>
