<?php
include 'core\init.php'; 
admin_protect();
include 'includes/overall/header.php'; 

$query2 = "SELECT * FROM `kategorijos`";
$result2 = mysqli_query($con, $query2);
?>

<h1> Admin page </h1>
<br> 	


<br>

	<?php
		include('core/database/connect.php');
		$result = $con->prepare("SELECT * FROM kategorijos ORDER BY genre_id DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td><?php echo $row['zanras']; ?></td>
		<td><a href="editform_kat.php? id=<?php echo $row['genre_id']; ?>"> edit </a></td>
	</tr>
	<?php
		}
	?>
</tbody>
</table>


<body>
    	<br>	
     <?php
			$result = mysqli_query($con, "SELECT * FROM kategorijos ORDER BY genre_id DESC")
	 ?>
	
    <table width='70%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Žanras</td>	
            <td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['zanras']."</td>";
            	
            echo "<td><a href=\"editform_kat.php?genre_id=$res[genre_id]\">Redaguoti</a> | <a href=\"delete_kat.php?genre_id=$res[genre_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
		
		
		}
        ?>
		
	<br><br>	
    <form action="add_kat.php" method="post" name="form1">
        <table width="35%" border="0" style="margin-top:30px;">
		<br>
		<br>
            <tr>
                <td>Įveskite žanro pavadinimą</td>
                <td><input type="text" name="zanras"></td>
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
