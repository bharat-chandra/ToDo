<?php
$errors="";
error_reporting(0);
require("common.php");
if(isset($_SESSION['id'])){
$user_id = $_SESSION['id'];
}
if(isset($_POST['submit'])){
    $task=$_POST['task'];
    if(empty($task)){
        $errors="You must fill the task";
        
    }else{
        mysqli_query($con, "INSERT INTO taks (user_id,task,time) VALUES ('$user_id','$task',NOW())");
    header('location:index.php?id='.$user_id);
        
    }
    
}
if(isset($_GET['del_task'])){
    $id=$_GET['del_task'];
    mysqli_query($con,"DELETE FROM taks WHERE id=$id");
    header('location:index.php?id='.$user_id);
}
if(isset($_SESSION['id'])){
$taks= mysqli_query($con,"SELECT * FROM taks where user_id='$user_id' ");
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Todo list 📝</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width , initial-scale=1">
        <style>
            body {
                color:black;
                margin:0;
                font-family: 'Architects Daughter', cursive;
                font-size: 15px;
                background: url(img/bg.jpg);
                background-repeat: no-repeat;  /* Background Image Will not repeat */
                background-attachment: fixed;  /* Background Image will stay fixed */
                background-size: cover; 
            }
            .mainhead{
                font-size: 30px;
                font-family: 'Black Ops One', cursive;
            }
            .heading{
                width: 50%;
                margin: 30px auto;
                text-align: center;
                color: #6B8E23;
                background: #FFF8DC;
                border-radius: 20px;
            }
            form{
                width: 50%;
                margin: 30px auto;
                border-radius: 5px;
                padding: 10px;
                background: #FFF8DC;
                border: 1px solid #6B8E23;
            }
            form p{
                color: red;
                margin:0px;
            }
            .task_input{
                width: 73%;
                height: 15px;
                padding: 10px;
                border: 2px solid #6B8E23;
            }
            .add_btn{
                height: 39px;
                background: #FFF8DC;
                color:#6B8E23;
                border-radius: 5px;
                border:2px solid #6B8E23;
                padding: 5px 20px;
            }
            table{
                width: 50%;
                margin: 30px auto;
                border-collapse: collapse;
                
            }
            @media (max-width:873px){
                    form{width:100%;}
                .heading{
                    width: 100%;
                }
                table{
                    width: 100%;
                }
            }
            @media (max-width:440px){
                    form{width:100%;}
                .task_input{
                    width: 60%;
                }
                .add_btn{
                margin-left: 20px;
            }
            }
            @media (max-width:353px){
                    form{width:100%;}
                .task_input{
                    width: 60%;
                }
                .add_btn{
                margin-left:0px;
            }
            }
            @media (max-width:301px){
                    form{width:100%;}
                .task_input{
                    width: auto;
                }
                .add_btn{
                margin: auto;
            }
            }
            tr{
                border-bottom: 1px solid #cbcbcb;
               
            }
            th,td{
                border:none;
                height: 30px;
                padding: 2px;
            }
            tr:hover{
                background: #E9E9E9;
            }
            .task{
                text-align: left;
                
            }
            .delete{
                text-align: center;
            }
            .delete a{
                color: white;
                background: #a52a2a;
                padding: 1px 6px;
                border-radius: 3px;
                text-decoration: none;
            }
            </style>
    </head>
    <body>
        <div class="heading">
            <h2 class="mainhead" style="padding-top:10px">WHAT TO DO 🤔📝</h2> 
            <?php
            if(!isset($_SESSION['email'])){
        include("signup.php");
            }
            elseif(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                include("signup.php?msg=".$msg);
            }
            else{
            $logout = True;    
            ?>
            <form action="logout.php" method="POST" >
                <div class="form-group"><button class="btn btn-success form-control">logout</button></div>
            </form>
           <?php }
        ?>
       </div>
        <?php
        if($logout){?>
            <form method="post" action="index.php">
                <?php if(isset($errors)){?>
                <p><?php echo $errors; ?></p>  
                <?php }?>
                <input type='text' name="task" class="task_input">
                <button type="submit" class="add_btn" name="submit">Add task</button>
            </form> 
            <table>
                <thead>
                    <tr>
                        <th>N</th>  
                         <th>task</th>
                         <th>Action</th></tr>
                </thead>
                <tbody>

                <?php 

                    $i=1;
                    while ($row=mysqli_fetch_array($taks)){
                    ?><tr>
                    <td><?php echo $i;?></td>
                <td class="task"><?php echo $row['task']." <span style=\"color:red\"><b>| @</b></span> ".$row['time'];?></td>
                <td class="delete">
                    <a href="index.php?del_task=<?php echo $row['id'];?>">x</a>
                </td>
                </tr>
                    <script type="text/javascript">console.log("done");</script>
                <?php $i++; } 
                    ?>

                </tbody>
            </table>
      <?php } ?>
    </body>
</html>










