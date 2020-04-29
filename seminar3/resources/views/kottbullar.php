<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Tasty Recipes - meatballs</title>  
    <link href="resources/css/reset.css" rel ="stylesheet" type="text/css">
    <link href="resources/css/index.css" rel="stylesheet" type="text/css">
  
    
</head>
<body>  
    <?php 
include 'showNav.php';
?>
   
    <h1>Meatballs</h1> 
    <div class="box">
       
      <img src="resources/images/kottbull.jpg" alt="kottbullar">
        <h3> Total:45 min |Prep: 15 min | cook: 40 min | yeald: 4 Servings </h3>
        <h3>Ingredients</h3>

        <p>1 pound lean ground beef<br>
        1 egg<br>
       2 tablespoons water<br>
        1/2 cup bread crumbs<br>
        11/4 cup onion (minced)<br>
        1/2 teaspoon salt<br>
       1/8 teaspoon pepper<br>
        </p>
        <h3>Steps to Make It</h3>
        <p>Gather the ingredients.<br>
        Preheat oven to 350 F<br>
       In a large bowl combine the egg, water, bread crumbs, onion, <br>
       salt, and pepper and combine. Add the ground beef <br>
       that has been broken into chunks, and mix gently, <br>
       but thoroughly,with your hands to combine.<br>
       </p>
            
       
            <?php

if(!empty($ctr) && $username != '') {
    echo'
        <h3>Add a public comment</h3>
        <div class="comments">
            <form action="showComments.php" method = "POST">
                <label>Comment</label>
                <input type="text" id="comment" name="comment" placeholder="Your comments...">
                <input type="submit" value="submit">
                <input type="hidden" value = "meatball" name = "holderMod">
            </form>
        </div>';
}
        
 else {
                echo '<h4>Log in to write a comment</h4><br>';
            }
            ?>
        <h4>Comment section</h4>
        <hr>
        <div id = "commentlist">
         
            
            <?php
                $commentInfo = $ctr->getcommentInfo('meatballs');   // ladda tidigare skrivna kommentarer
                $info = $ctr->getInfo('meatballs'); 
                $namn = $ctr->getUsername() ;//ange namn
               
                $k = 0;
                ///från sem2
                foreach ($commentInfo as $value) {
                    //explode — Split a string by a string, explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] ) : array
                    $text = explode(',', $value, 2)[1];
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
                                <input type="hidden" value = "meatball" name = "holderMod"> 
                            </form>
                        </div>'; 
                    }

                   
                }
            ?>   
        </div>
    </div>
</body>
</html>
