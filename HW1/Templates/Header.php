<header>
    
        <link rel="stylesheet" href="../Templates/Header.css" />
        <link rel="stylesheet" href="..\font-awesome-4.7.0\css\font-awesome.min.css"/>
        <link rel="stylesheet" href="..\font-awesome-4.7.0\css\font-awesome.css"/>
        
        <div id="overlay"></div>
        <div class='cont'>
        <div class='title'>TIMMUCCHI</div>
        </div>

        <div class='cont'>
            <?php 
                if($login == true){
                    //se siamo loggati mostriamo home, carrello e logout:
                    echo"<div class='button'><a href='../Homepage/Homepage.php'> HOME </a></div>";
                    echo"<div class='button'><a href='../Carrello/Carrello.php'> CARRELLO </a></div>";
                    echo"<div class='button'><a href='../Ordini/Ordini.php'> ORDINI </a></div>";
                    echo"<div class='button'><a href='../Login/Logout.php'>LOGOUT</a></div>";
                    echo"<span id='username'> <i class='fa fa-user'></i>  ".$_SESSION["username"]."</span> ";
                }
                elseif ($login == false){
                    //altrimenti mostriamo solo i tasti login e registrati:
                    echo"<div class='button'><a href='../Homepage/Wellcome.php'>HOME</a></div>";
                    echo"<div class='button'><a href='../Login/Login.php'>LOGIN</a></div>"; 
                    echo"<div class='button'> <a href='../Signup/Signup.php'>REGISTRATI</a></div>";
                    }
            ?>    
        </div>
</header>