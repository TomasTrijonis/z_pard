					<div id="game-container">

<?php
//$join= $con->query;
			if($result = $con->query("SELECT c.* , p.* FROM zaidimai c, kategorijos p WHERE c.genre_id=p.genre_id")) {

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
					?><br><?php
					echo $row['zanras'],',  ';
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
	