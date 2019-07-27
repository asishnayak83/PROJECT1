<?php

?>
<html>
<head>
    <title>MyForm</title>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript"  src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style>
    .panel-body
        {
           height:auto;
            width: auto;
            background-color:lightgreen;
        }
    .pawan
        {
            color: darkblue;
            font-size: 20px;
            font-weight: bolder;
            font-family: Bookman Old Style;
        }
        .maruti
        {
            color: darkmagenta;
            font-size: 25px;
            font-weight: bolder;
            font-family: Bookman Old Style;  
        }
    </style>
    </head>
    <body>
     <center><h3 style="color:darkgray;">Employee Registration Form<br><br></h3></center>
        <script type="text/javascript">
        function myfunction()
            {
            var name1=document.getElementById("Name").value;
            var name2=document.getElementById("Name2").value;
            var mob=document.getElementById("mobileno.").value;
            var emailId=document.getElementById("Email").value;
            var pattern=/^[a-zA-Z0-9][a-zA-Z0-9._]*@gmail[.]com$/;  
            if(name1=="")
                {
                    document.getElementById("message1").innerHTML="** Please enter the First Name";
                    document.getElementById("message1").style.color="Red";
                    return false;
                }
            else
                {
            for(i=0;i<name1.length;i++)
                {
                    ch=name1.charAt(i);
                    if(!(ch>='a' && ch<='z') && !(ch>='A' && ch<='Z'))
                        {
                            document.getElementById("message1").innerHTML="Invalid First Name";
                            document.getElementById("message1").style.color="Red";
                            return false;
                        }
                    else
                        {
                        document.getElementById("message1").innerHTML="Valid";
                        document.getElementById("message1").style.color="Green";    
                        }
                }
            }
            if(name2=="")
                {
                    alert(document.getElementById("message2").innerHTML="** Please enter the Last Name");
                    document.getElementById("message2").style.color="Red";
                    return false;
                }
            else
                {
            for(j=0;j<name2.length;j++)
                {
                    ch1=name2.charAt(j);
                    if(!(ch1>='a' && ch1<='z') && !(ch1>='A' && ch1<='Z'))
                        {
                            document.getElementById("message2").innerHTML="Invalid Last Name";
                            document.getElementById("message2").style.color="Red";
                            return false;
                        }
                    else
                        {
                        document.getElementById("message2").innerHTML="Valid";
                        document.getElementById("message2").style.color="Green";
                        }
                }
                }
            if(mob=="")
                {
                alert(document.getElementById("message").innerHTML="** please enter the mobile number");
                    document.getElementById("message").style.color="Red";
                return false;
                }
            if(isNaN(mob))
                {
                alert(document.getElementById("message").innerHTML="** please enter numeric value");
                    document.getElementById("message").style.color="Red";
                return false;
                }
            if((mob.length>10) || (mob.length<10))
                {
                alert(document.getElementById("message").innerHTML="** Mobile number should be 10 digits only");
                    document.getElementById("message").style.color="Red";
                return false;
                }
            if((mob.charAt(0)!=9) && (mob.charAt(0)!=8) && (mob.charAt(0)!=7) && (mob.charAt(0)!=6))
                {
                  alert(document.getElementById("message").innerHTML="** Mobile number should Start with 9 or 8 or 7 or 6 only");
                    document.getElementById("message").style.color="Red";
                return false;  
                }
            else
               {
              document.getElementById("message").innerHTML="Valid";
              document.getElementById("message").style.color="Green";
               }
            if(pattern.test(emailId))
                {
                document.getElementById("messages").innerHTML="Nice email";
                document.getElementById("messages").style.color="Green";
                }
            else
                {
                    alert(document.getElementById("messages").innerHTML="Invalid email");
                     document.getElementById("messages").style.color="Red";
                    return false;
                }
                <!--   -->
             
             }
        
        </script>
        <center><div class="container">
    <form  onsubmit="return myfunction()" action="simpleProject.php" method="post">
        First Name
        <input type="text" name="Fname" id="Name" value="" ><br>
        <span id="message1"></span><br>
        Last Name
        <input type="text" name="Lname" id="Name2"value="" ><br>
        <span id="message2" ></span><br>
        DOB
          <input type="date" name="DOB" value="" required><br><br>
        Mobile
        <input type="text" name="Mobile" id="mobileno." value="" ><br>
        <span id="message" ></span><br>
        email
        <input type="email" name="email" id="Email" value="" ><br>
        <span id="messages"></span><br>
        
        <input type="submit" name="submit" value="submit">
        
    </form>
        
        </div>
            </center>
       
    </body>

</html>
<?php
require ('PHP.php');

if(isset($_POST['submit']))
{
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $DOB=$_POST['DOB'];
    $Mobile=$_POST['Mobile'];
    $email=$_POST['email'];
    

   $sql="INSERT INTO `employee`(`First Name`, `Last Name`, `DOB`, `Mobile`, `email`)VALUES('$Fname','$Lname','$DOB','$Mobile','$email')";
 
if(!mysqli_query($con,$sql))
   echo "failed";

}
?>

<!-- --> 
<?php
require ('PHP.php');
if(isset($_POST['submit']))
{
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $DOB=$_POST['DOB'];
    $Mobile=$_POST['Mobile'];
    $email=$_POST['email'];

   $sql="SELECT * FROM employee where email = '$email' ";
   $query_run=mysqli_query($con,$sql);
   while($row = mysqli_fetch_array($query_run)) 
   {
       $diff= date_diff(date_create($row['DOB']),date_create(date("Y-m-d")));
       ?>
<center>
    <div class="panel-body">
<h3 class="maruti">
<?php echo "Welcome" ." ". $row['First Name'];?></h3>
<h5 class="pawan">Your informations are listed below<br>
<?php echo "First Name :"." ".$row['First Name'];?><br>
<?php echo "Last Name :"." ".$row['Last Name'];?><br>
<?php echo "DOB :"." ".$row['DOB'];?><br>
<?php echo "Mobile :"." ".$row['Mobile'];?><br>
<?php echo "email :"." ".$row['email'];?><br>
<?php echo "You are "." ".$diff->format('%yyear %mmonth %ddays')." "." old" ?>
    </h5>
        </div>
    </center>
<?php
   }

}
?>