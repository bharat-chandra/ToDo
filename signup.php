
<html>
    <head>
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body{
                font-family: 'Architects Daughter', cursive;
                font-size: 15px;
            }
        </style>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['email']) and !isset($_GET['acc'])) {?>
        <form action="login_submit.php" method="POST" >
                <div class="form-group">email id : <input class="form-control"  type="email" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></div> 
                <div class="form-group">password : <input class="form-control"  type="password" placeholder="Password" name="password" pattern=".{6,}" required></div>
            <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo "<div class=\"form-group\"> $msg </div>";
            }
            ?>
            <?php
                  if(isset($_GET['m1'])){
                      $m1 = $_GET['m1'];
                      echo "<div class=\"form-group\">$m1 , now <a href=\"index.php\"><u>login</u></a></div>";
                      die();
                  }                        
                ?>
                <div class="form-group"><button class="btn btn-primary form-control">login</button></div>
                <div class="form-group">dont have account? <a href="signup.php?acc=new">signup</a></div>
            </form>

            <?php
            }elseif(isset($_GET['acc'])) { ?>
            <form action="signup_submit.php" method="POST" >
                <div class="form-group">email id : <input class="form-control"  type="email" placeholder="Email" name="email"  required></div> 
                <div class="form-group">password : <input class="form-control"  type="password" placeholder="Password" name="password" pattern=".{6,}" required></div>
                <div class="form-group"><button class="btn btn-primary form-control">signup</button></div>
            </form>
                <?php } ?>
    </body>
</html>
