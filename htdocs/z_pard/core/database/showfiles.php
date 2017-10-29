					<div id="game-container">

<?php

			if($result = $con->query("SELECT * FROM zaidimai")) {

			if($result->num_rows) {
				
				
				
				while($row = $result->fetch_assoc()) {
					
					?>

					<figure><?php
					echo "<img src=".$row['IMAGE']." />";
					?>
					<figcaption>
					<?php
					echo $row['PAV'],',  ';
					echo $row['PRICE'],'€';
					?>
					</figcaption>
					</figure>

					<br>
					
					<?php
					
				}
				
				
			}
			}
			?>
				</div>
	