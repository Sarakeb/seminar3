
<!DOCTYPE html>
<html lang = "en">
<!DOCTYPE html>
<head>
    <title>Tasty Recipes - pancakes</title>  
       <link href="resources/css/reset.css" rel ="stylesheet" type="text/css">
    <link href="resources/css/index.css" rel="stylesheet" type="text/css">
    
</head>
<body> 
   
    <?php include 'showNav.php';?>
      
    <h1>Pancakes</h1>
<div class="box">
    
        <img src="resources/images/pankaka.jpg" alt="Pankakor">
        <h3>Prep: 10 min | Total: 30 min | Servings: 4</h3>
        <h3>Ingredients</h3>
        <p>1 cup all-purpose flour<br>
        2 tablespoons sugar<br>
        2 tablespoon baking powder<br>1/2 teaspoon salt teaspoon salt<br>
        1 large egg, slightly beaten <br>
        2 tablespoons vegetable oil <br>
       3/4 cup milk<br>
        <h3>Steps to Make It</h3>
        <p>Combine the flour, sugar, baking powder, and salt. Whisk or stir to blend thoroughly.<br>
        Stir in egg, oil, and the milk. Mix lightly, just enough to blend.<br>

        Cook the pancakes on a hot, well-greased griddle. Flip the pancakes when <br>
        you see bubbles breaking all over the tops, and then continue cooking <br>
        until the underside is browned. <br>
</p>


 <?php

//själva kommentar boxen.
if(!empty($ctr) && $username!= '') {
    echo'
        <h3>Add a public comment</h3>
        <div class="comments">
            <form action="showComments.php" method = "POST">
                <label>Comment</label>
                 <input type="text" id="comment" name="comment" placeholder="Your comments...">
                <input type="submit" value="submit">
                <input type="hidden" value = "pancake" name = "holderMod">
            </form>
        </div>';
}
        
 else {
                echo '<h4>Log in to write a comment</h4><br>';
            }
            ?>
        
        <h4>Comment section</h4>
        <hr>
        <div id = "commentbox">
            <?php
               
            $commentInfo = $ctr->getcommentInfo('pancakes');  // ladda tidigare skrivna kommentarer
                $info = $ctr->getInfo('pancakes'); 
            
                $namn = $ctr->getUsername();  //ange namn
               
            $k = 0;
                foreach ($commentInfo as $value) {
              //explode — Split a string by a string, explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] ) : array
                    $text = explode(',', $value, 2)[1];  
                    // if(strpos($value, $_SESSION['uname']) !== false) {
                   if(strpos($text, $namn) !== false) {
                     echo $value;
                     /* list($comment, $user) = explode('hidden', $value);   
            $Data[$i++] = trim($user);*/
                    $timestamp = $info[$k];
                    $k++;
                    
                    
                    
                   echo '
                        <div id = "comments">
                            <form method = "POST" action="showDeletedComments.php">
                                <input type="submit" value="Delete" name = "Delete">
                                <input type="hidden" value="'.$timestamp.'" name="timestamp">
                                    <!-- länkas till databsen.-->
                                <input type="hidden" value = "pancake" name = "holderMod">
                            </form>
                        </div>';
                    }

                 
                }
            ?>
        </div>   
    </div>
</body>
</html>