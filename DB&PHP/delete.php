<?php
require_once("DB.php");
$SearchQueryParameter=$_GET["id"];
if(isset($_POST["Submit"])){
  
        $Ename=$_POST["Ename"];
        $SSN=$_POST["SSN"];
        $dept=$_POST["dept"];
        $sal=$_POST["sal"];
        $Address=$_POST["Address"];
        global $ConnectingDB;//hree globsal is done with previous version you can even remove global
        $sql="DELETE FROM emp_record where id =$SearchQueryParameter";
        $Execute=$ConnectingDB->query($sql);//here we use conncetiongdb as an object  
     if($Execute)
     {
     echo'<span class="success" >record has been deleted successfully<span>';
     //echo "executed successfuly";
     echo '<script>window.open("view_table_data.php?id=record deleted sucessfully","_self")</script>';
     }
     else
     {
         echo "oops smething went wrong";
     }
}

?>
<!DOCTYPE html>
<html>
    <head><title>DELETE TABLE DATA</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
    <?php
    $ConnectingDB;
    $sql="SELECT * FROM emp_record where id='$SearchQueryParameter'";
    $stmt=$ConnectingDB->query($sql);
    while($DataRows= $stmt->fetch())
    {
        $ID         =        $DataRows["id"];
        $ENAME      =        $DataRows["ename"];
        $SSN       =        $DataRows["ssn"];
        $DEPARTMENT =        $DataRows["dept"];
        $SALARY     =        $DataRows["salary"];
        $ADDRESS    =        $DataRows["adr"];
    }
    
    ?>
    <div>
    <form action="delete.php?id=<?php echo $SearchQueryParameter;?>" method="post">
       
    <fieldset>
        <span class= "FieldInfo">EMPLOYEE NAME :</span>
        <br>
        <input type="text" name="Ename" value="<?php echo $ENAME; ?>"> 
        <br>
        <span class= "FieldInfo">SOCIAL SECURITY NUMBER:</span>
        <br>
        <input type="text" name="SSN" value="<?php echo $SSN; ?>"> 
        <br>
        <span class= "FieldInfo">DEPARTMENT :</span>
        <br>
        <input type="text" name="dept" value="<?php echo $DEPARTMENT; ?>"> 
        <br>
        <span class= "FieldInfo">SALARY:</span>
        <br>
        <input type="text" name="sal" value="<?php echo $SALARY ?>">
        <br>
        <span class= "FieldInfo">ADDRESS:</span>
        <br>
        <textarea name="Address" rows="8 " cols="80 " ><?php echo $ADDRESS; ?></textarea>
        <br>
        <input type="submit" name="Submit" value="Delete Your Record">
    </fieldset>

    </form>
    </div>
    </body>
</html>