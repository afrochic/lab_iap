<?php
include_once'DBConnector.php';
include_once 'user.php';
$con=new DBConnector;

if (isset($_POST['btn-login'])){
     $uname=$_POST['username'];
     $pass=$_POST['password'];
     $instance=User::create();
     $instance->setPassword($password);
     $instance->setUsername($username);

     if($instance->isPasswordCorrect()){
     	$instance->login();
     	$con->closeDatabase();
     	$instance->createUserSession();
     }else{
     	$con->closeDatabase();
     	header("location:login.php");
          }
     }
     ?>
     <!DOCTYPE html>
     <html>
           <head>
     	<title>login page</title>
     	<script type="text/javascript"src="validate.js"></script>
          <link rel="stylesheet" type="text/css" href="validate.css">
           </head>
         <body>
         	<form method="post" name="login" id="login" action="<?=$_SERVER['PHP_SELF']?>">
         	  <table align="center">
         	  	<tr><td><input type="text" name="username" required placeholder="Username"/></td>
                    </tr>
                    <tr><td><input type="password" name="password" required placeholder="Password"/></td>
                    </tr>
     			<tr>
     				<td><button type="submit" name="btn-login"><strong>LOGIN</strong></button></td>
     			</tr>
         	  </table>
         		
         	</form>
     
         </body>
     </html>