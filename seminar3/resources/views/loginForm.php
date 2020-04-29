
<!DOCTYPE html>
<html>
<head>
    <title>Tasty Recipes</title>  
    <link href="resources/css/reset.css" rel ="stylesheet" type="text/css">
     <link href="resources/css/index.css" rel ="stylesheet" type="text/css">
   
</head>
<body>   
<?php include 'showNav.php';?>
    
    <h1>Login</h1> 
  
                <div class="loggedinbox">
             <div class="topnav">
                  <p><a href="registerUser.php">Click here to create an account!</a></p><br>

    <form method="post" action="showLoggedIn.php" >
      <input type="text" placeholder="Username" name="userN" required>
      <input type="text" placeholder="Password" name="passW"required>
      <button type="submit">Login</button>
    </form>
  </div>
            
            </div>
        </form>        
    </div>
</body>
</html>
