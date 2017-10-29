<?php
include 'core/init.php'; 
admin_protect();
include 'includes/overall/header.php'; 

$query2 = "SELECT * FROM `kategorijos`";
$result2 = mysqli_query($con, $query2);
?>

<h1> Admin page </h1>
<br> 	
<?php
include 'core/database/showfiles.php';
?>

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
            echo "<td>".$res['GENRE']."</td>";
			echo "<td>".$res['IMAGE']."</td>"; 			
            echo "<td><a href=\"editform.php?gameid=$res[gameid]\">Edit</a> | <a href=\"delete.php?gameid=$res[gameid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
		
		
		}
        ?>
		
	<br><br>	
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0" style="margin-top:30px;">

            <tr> 
                <td>Pavadinimas</td>
                <td><input type="text" name="PAV"></td>
            </tr>
            <tr> 
                <td>Kūrėjas</td>
                <td><input type="text" name="DEV"></td>
            </tr>
            <tr> 
                <td>Žanras</td>
                <td><input type="text" name="GENRE"></td>
            </tr>
			<tr> 
                <td>Nuotrauka</td>
                <td><input type="text" name="IMAGE"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Pridėti"></td>
            </tr>
        </table>
    </form>
</body>





<?php
include 'includes/overall/footer.php';
?>