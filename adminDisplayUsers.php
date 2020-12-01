<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['nameSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `usersinfo` WHERE `Name` LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
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
    </head>
    <body>
        
        <form action="adminDisplayUsers.php" method="post">
            <input type="text" name="nameSearch" placeholder="Filter For Name"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
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
        
    </body>
</html>