<?php
include_once'DBConnector.php';
include_once 'user.php';
$con=new DBConnector;

if (isset($_POST['btn-save'])){
     $first_name=$_POST['first_name'];
     $last_name=$_POST['last_name'];
     $city_name=$_POST['city_name'];

     $user= new User($first_name,$last_name,$city_name);
     $res=$user->save();
     $roo=$user->readAll();


 if($res){
          echo"save operation was successful   ";
}else{
          echo "an error occured!!!";
     }

  if ($roo->num_rows > 0) {
            echo "<table>
                      <tr>
                         <th> Name </th>
                           <th> city </th>
                       </tr>";
   while($row = $roo->fetch_assoc()) {
            echo "<tr>
                     <td>" . $row["first_name"]. "  " . $row["last_name"]. "</td>
                         <td>".$row["city_name"]. "</td>
                   </tr>";
                                            }
            echo "</table>";
} else {
            echo "0 results";
        }
}

?>
<html> 
     <head>
     	<title>lab 1</title>
     </head>
     <body>
     	<form method="post">
     		<table align="center">
     			<tr>
     				<td><input type="text" name="first_name" required placeholder="First Name"/></td>
     			</tr>
     			<tr>
     				<td><input type="text" name="last_name" required placeholder="Last Name"/></td>
     			</tr>
     			<tr><td><input type="text" name="city_name" required placeholder="City Name"/></td>
     			</tr>
     			<tr>
     				<td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
     			</tr>
     		</table>
     	</form>
     </body>
</html>