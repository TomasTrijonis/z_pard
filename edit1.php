<?php
include 'core/init.php'; 
admin_protect();
include 'includes/overall/header.php'; 

$query2 = "SELECT * FROM `kategorijos`";
$result2 = mysqli_query($con, $query2);
?>

<h1> Admin page </h1>
<br> 	


<br>
<!--<table border="1" cellspacing="0" cellpadding="2" >
<thead>
	<tr>
		<th> Pavadinimas </th>
		<th> Leidėjas </th>
		<th> Žanras </th>
		<th> Kaina </th>
	</tr>
</thead>
<tbody>
	<?php
		include('core/database/connect.php');
		$result = $con->prepare("SELECT * FROM zaidimai ORDER BY gameid DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td><?php echo $row['PAV']; ?></td>
		<td><?php echo $row['DEV']; ?></td>
		<td><?php echo $row['GENRE']; ?></td>
		<td><?php echo $row['PRICE']; ?></td>
		<td><?php echo $row['IMAGE']; ?></td>
		<td><a href="editform.php?id=<?php echo $row['gameid']; ?>"> edit </a></td>
	</tr>
	<?php
		}
	?>
</tbody>
</table>-->


<body>
    	<br>	
     <?php
			$result = mysqli_query($con, "SELECT * FROM zaidimai ORDER BY gameid DESC")
	 ?>
	
    <table width='70%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Pavadinimas</td>
            <td>Developeris</td>
            <td>Žanras</td>
			<td>IMAGE</td>	
            <td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['PAV']."</td>";
            echo "<td>".$res['DEV']."</td>";
            echo "<td>".$res['genre_id']."</td>";
			echo "<td>".$res['IMAGE']."</td>"; 			
            echo "<td><a href=\"editform.php?gameid=$res[gameid]\">Edit</a> | <a href=\"delete.php?gameid=$res[gameid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
		
		
		}
        ?>
		
	<br><br>	
    <div id="tvarkymas">
<br><br>
<h3><a href = "edit1.php"> Tvarkyti individualias prekes </a><h3>
<h3><a href = "edit1_kat.php"> Tvarkyti redaguoti kategorijas prekes </a><h3>

<br>
<h3>Įterpkite naują prekę:</h3>
<br>
<form action="insert.php" method="POST" enctype="multipart/form-data"> 
Žaidimo pavadinimas: <input type="text" name="PAV" /> <br><br>
Kūrėjų studija: <input type="text" name="DEV" /> <br><br>

Kategorijos ID: <input type="number" name="genre_id" min="1" step="1"/>
Kaina (€): <input type="number" name="PRICE" min="0" step="0.01"/> <br><br>
Nuotrauka: <input type="file" name="fileToUpload" id="fileToUpload"> <br><br>
<input type="submit" name="submit" ><br><br>
</form>

<br><br>
</div>
</body>





<?php
include 'includes/overall/footer.php';
?>