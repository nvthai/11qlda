
<?php
$var_value = "";


if(isset($_GET['signup']))
{
    $var_value = $_GET['signup'];
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Remind</title>
        <link rel="shortcut icon" href="assets/img/ico-tab.png">
        <link rel="stylesheet" href="css/main.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
    </head>
    <body class="background-all-login">
        
        <div class="mot-hang" >
            <img src="img/logo1.png" alt="image"/>
            <a class="button-login" href="login.php" style="text-decoration:none;">
                Log in 
            </a>
        </div>
        <div class="mot-hang">
            <div class="mot-hang-30" style="height:10px;">
                
            </div>
            <div class="mot-hang-70" style="text-align:center;">
                <img alt="image" src="img/logo2.svg" style="height: 55px;"/>
                <div class="mot-hang" style="    color: white;
    font-size: 65px;
    white-space: nowrap;">
                    Reach students and parents <br /> where they are.
                </div>
                
                <div class="mot-hang" style="color: white;
    margin-top: 70px; font-size: 21px; font-family: monospace;
    letter-spacing: -0.5px; margin-bottom: 10px;">
                    Free for teachers. Always
                </div>
                <div class='mot-hang' style="margin-top:19px;">
                    <span class='button-signup'>
                           Sign up
                    </span>
                    
                    
                </div>
                <div class='mot-hang-50' style="margin-left:25%;margin-top:30px;color:white;">
                    <span class='mot-hang-50' style="font-size:20px;font-weight:bold;">
                        15 seconds
                    </span>
                    <span class='mot-hang-50' style="font-size:20px;font-weight:bold;">
                        1 in 5 teachers
                    </span>
                    <span class='mot-hang-50' >
                        to sign up
                    </span>
                    <span class='mot-hang-50'>
                        in the U.S use Remind
                    </span>
                </div>
            </div>        
        </div>
        <?php
            if($var_value == "true")
            {
                echo "<script type=\"text/javascript\"> alert(\"Opend Sign Up\") </script>";
            }
        ?>
        
    </body>
   
    
    
</html>
