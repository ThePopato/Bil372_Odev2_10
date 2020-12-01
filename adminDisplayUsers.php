<?php

if(isset($_POST['search']))
{
	if(!empty($_POST['filterBox'])) {
        $selected = $_POST['filterBox'];
		$valueToSearch = $_POST['searchValue'];
		// search in all table columns
		// using concat mysql function
		$query = "SELECT * FROM `usersinfo` WHERE `".$selected."` LIKE '%".$valueToSearch."%'";
		$search_result = filterTable($query);
    } 
}
 else {
    $query = "SELECT * FROM `usersinfo`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect('localhost', 'root', '', 'odev2');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
        <form action="adminDisplayUsers.php" method="post">
			<br><br><br>
			<label for="FilterBox">Choose a filter:</label>
			<select name="filterBox" class="form-control" id="filterBox">
				<option value="Name">Name</option>
				<option value="LastName">Lastname</option>
				<option value="Title">Title</option>
				<option value="City">City</option>
				<option value="Country">Country</option>
				<option value="Affiliation">Affiliation</option>
				<option value="phone">Phone Number</option>
				<option value="Address">Address</option>
			</select>
			<br><br>
			<input type="text" class="form-control" name="searchValue" placeholder="Filter For Name"><br>
			<input type="submit" class="button" name="search" value="Filter"><br><br><br>


            <table class="table table-striped">
                <tr>
                    <th>Title</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Affiliation</th>
					<th>Primary email</th>
					<th>Secondary email</th>
					<th>Phone number</th>
					<th>Fax number</th>
					<th>Address</th>
					<th>City</th>
					<th>Country</th>
				</tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['Title'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['LastName'];?></td>
                    <td><?php echo $row['Affiliation'];?></td>
                    <td><?php echo $row['primary_email'];?></td>
                    <td><?php echo $row['secondary_email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['fax'];?></td>
                    <td><?php echo $row['Address'];?></td>
                    <td><?php echo $row['City'];?></td>
                    <td><?php echo $row['Country'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        </div>
    </body>
</html>