
<?php
include 'core/init.php'; 
admin_protect();
include 'includes/overall/header.php'; 

$sql = 'SELECT * 
		FROM mokejimai';
		
$query = mysqli_query($con, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($con));
}


?>

<h1> Admin page </h1>
<br> 	



<form method="post">
	
	Ieškokite užsakymo pagal telefono numerį<br/>
	<input type="text" name="search"/>
	<input type="submit" name="submit" value="Search"/>
	
	
	</form>
	<br>
	
	<?php

if(isset($_POST['submit'])){
	
	$search = $con->real_escape_string($_POST['search']);
	
	$resultSet = $con->query("SELECT * from mokejimai WHERE TEL LIKE '$search%' ");
	
	if ($resultSet->num_rows > 0) {
		while($rows = $resultSet->fetch_assoc())
		{
			$order_id = $rows['order_id'];
			$TEL = $rows['TEL'];
			
			echo "Uzsakymo id: $order_id<br />Telefono numeris: $TEL<br/>";
			
		}}else {
			
		}
}
?>

<style>
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>


<body>
	<table class="data-table">
		<caption class="title">Esami užsakymai</caption>
		<thead>
			<tr>
				<th>NO</th>
				<th>ŽAIDIMAS</th>
				<th>KAINA</th>
				<th>TELL</th>
				<th>MOKESTIS</th>
				<th>Ištrinti</th>
				
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 0;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{	$no++;
			$order_id  = $row['order_id'] == 0 ? '' : number_format($row['order_id']);
			echo '<tr>
					<td>'.$order_id.'</td>
					<td>'.$row['GAMES'].'</td>
					<td>'.$row['PRICE'].'</td>
					<td>'.$row['TEL'].'</td>
					<td>'.$row['PAYMENT'].'</td>
					<td> <a href="delete_uz.php?order_id='.$row['order_id'].'">Delete</a></td>";  
				</tr>';
			$total += $row['order_id'];
			
		}?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">TOTAL</th>
				<th><?=number_format($no)?></th>
			</tr>
		</tfoot>
	</table>
	

<?php
include 'includes/overall/footer.php';
?>
