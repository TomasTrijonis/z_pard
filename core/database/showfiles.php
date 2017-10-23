<?php

			if($result = $con->query("SELECT * FROM zaidimai")) {

			if($result->num_rows) {
				
				
				
				while($row = $result->fetch_assoc()) {
					
					echo $row['PAV'],' ---- ';
					echo $row['PRICE'],'€';
					?>
					<br>
					<?php
					
				}
				
				
			}
			}
			?>