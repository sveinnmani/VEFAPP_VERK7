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
					//echo '<div class="ui three column grid"></div>';
					for ($i=0; $i < count($gameName); $i++) {						
						echo '
							<div class="column">
								<div class="ui segment">
									<img src="' . $bannerName[$i] . '">
									<h4>Game name: ' . $gameName[$i] . '</h4>
									<h5>Total hours Played: ' . round($playtime[$i]/60) . '</h5>
								</div>
							</div>';


					}
					//echo '</div>';
				?>
			</div>
		</div>
	</body>
</html>
