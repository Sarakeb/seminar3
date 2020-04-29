<!DOCTYPE html>
<html>
<head>
    <title>Tasty Recipes</title>  
    <link href="resources/css/reset.css" rel ="stylesheet" type="text/css">
     <link href="resources/css/index.css" rel ="stylesheet" type="text/css">
   
</head>
<body>   
    
    
   <?php include 'showNav.php';?>
    
    <h1>Create an account</h1> 
       <div class="loggedinbox">
             <div class="topnav">
     
        <form method="POST" action="registerUser.php" >
          
                
                 <input type="text" placeholder="Username" name="userN" required>
                <input type="text" placeholder="Password" name="passW"required>
                <button type="submit">Sign UP</button>
         
            </div>
           
            </div>
        </form>        
   
</body>
</html>