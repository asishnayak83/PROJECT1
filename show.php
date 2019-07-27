<?php
$server='Localhost';
$user='root';
$pass='';
$db='employee';
$con=mysqli_connect($server,$user,$pass,$db);
function showdata()
{
    global $con;
    $query="SELECT * FROM `employee`";
    $run=mysqli_query($con,$query);
    if($run == TRUE)
    {
        ?>
      <center><table border="1" width="80%">
           <tr>
           
              <td style="font-weight:bold;">FIRST NAME</td>
              <td style="font-weight:bold;">LAST NAME</td>
              <td style="font-weight:bold;">DOB</td>
              <td style="font-weight:bold;">MOBILE</td>
              <td style="font-weight:bold;">email</td>   
           </tr>
        <?php
        while($data=mysqli_fetch_assoc($run))
        {
            ?>
           
          <tr>
              <td><?php echo $data['First Name'];?></td>
              <td><?php echo $data['Last Name'];?></td>
              <td><?php echo $data['DOB'];?></td>
              <td><?php echo $data['Mobile'];?></td>
              <td><?php echo $data['email'];?></td>
         </tr>
           <?php
           
        }
        ?>
    </table></center>
     <?php
    }
    else
    {
        echo "Error !";
    }
}
?>
<html>
<head>
    
</head>
    <body>
    
    <?php showdata();?>
    
    </body>
</html>