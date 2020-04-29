<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="Kalender.php">Kalender</a></li>
    <li class="abc">
          <div>
            <a href="kottbullar.php">Köttbullar</a>
            <a href="pankakor.php">Pankaor</a>
            
        </div>
    <li class = "login">
      
       
        <?php
            use classes\Controller\Controller;
            $ctr = Controller::accessController();
            if(!empty($ctr)) {
                $username = $ctr->getUsername();
                if($username != '')
                {
                  /*
                    echo '
                      */
                }

                else
                    echo '<a href="showLoginForm.php">LOGIN</a>';
            }

            else
                echo '<a href="showLoginForm.php">log in</a>';
        ?>
        <a href="showLoginForm.php"> log out</a>
    </li>  
</ul>