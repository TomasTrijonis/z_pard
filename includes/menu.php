        <nav>
            <ul>
		
		<?php	if($showGenre = $con->query("SELECT * FROM kategorijos")) {

			if($showGenre->num_rows) {
				
				
				
				while($zanras = $showGenre->fetch_assoc()) {
					
					?><li>
					<a href='<?php echo $zanras['zanras']; ?>.php'><?php
					echo $zanras['zanras'];
					?></a><li>					

					
					<?php
					

				

				}
				
				
			}
			} ?>

            </ul>
        </nav>