<?php
require_once("DB.php");
$sal_err=" ";
if(isset($_POST["Submit"])){
    if(!empty($_POST["Ename"])&&!empty($_POST["SSN"]))
    {
        $Ename=$_POST["Ename"];
        $SSN=$_POST["SSN"];
        $dept=$_POST["dept"];
        $sal=$_POST["sal"];
        $Address=$_POST["Address"];
        global $ConnectingDB;//hree globsal is done with previous version you can even remove global
        $sql="INSERT INTO emp_record(ename,ssn,dept,salary,adr)VALUES(:enamE,:ssN,:depT,:salarY,:addreS)";
        $stmt=$ConnectingDB->prepare($sql);//here we use conncetiongdb as an object
        $stmt->bindValue(':enamE',$Ename);
        $stmt->bindValue(':ssN',$SSN);
        $stmt->bindValue(':depT',$dept);
        $stmt->bindValue(':salarY',$sal);
        $stmt->bindValue(':addreS',$Address);
        $Execute=$stmt->execute();
     if($Execute)
     {
     echo'<span class="success" >record has been added successfully<span>';
     //echo "executed successfuly";
     }
     else
     {
         echo "oops smething went wrong";
     }

    }else
    {
        echo '<span class="FieldInfoHeading"> please input at least emp name and social security number </span>';
    }
   
}

?>
<!DOCTYPE html>
<html>
    <head><title>INSERT INTO DATABASE</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
    <?php
    ?>
    <div>
    <form action="Insert_into_Database.php" method="post">
       
    <fieldset>
        <span class= "FieldInfo">EMPLOYEE NAME :</span>
        <br>
        <input type="text" name="Ename" values="employee name"> 
        <br>
        <span class= "FieldInfo">SOCIAL SECURITY NUMBER:</span>
        <br>
        <input type="text" name="SSN" values=""> 
        <br>
        <span class= "FieldInfo">DEPARTMENT :</span>
        <br>
        <input type="text" name="dept" values=""> 
        <br>
        <span class= "FieldInfo">SALARY:</span>
        <br>
        <input type="text" name="sal" values="">
        <br>
        <span class= "FieldInfo">ADDRESS:</span>
        <br>
        <textarea name="Address" rows="8 " cols="80 "></textarea>
        <br>
        <input type="submit" name="Submit" value="Submit Your Record">
    </fieldset>

    </form>
    </div>
    </body>
</html>
