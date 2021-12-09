<?php
require_once("DB.php");



?>
<!DOCTYPE html>
<html>
    <head><title>VIEW TABLE DATA</title>
      <link rel="stylesheet" href="style.css"> 
</head>
    <body>
        <h2 class="success"><?php echo @$_GET["id"]?></h2>
        <div class=" ">
            <form class="success" action="view_table_data.php" method="get">
                <input type="text" placeholder="search by name or ssn" name="search">
                <input type="submit" name="SearchButton" value=" search record">
        </form>
        </div>
        <?php
        if(isset($_GET["SearchButton"]))
        {
            $Search=$_GET["search"];
            $sql="SELECT * FROM emp_record WHERE ename=:searcH or ssn=:searcH";
            $stmt=$ConnectingDB->prepare($sql);
            $stmt->bindValue(':searcH',$Search);
            $stmt->execute();
            while($DataRows= $stmt->fetch())
            {
                $ID         =        $DataRows["id"];
                $ENAME      =        $DataRows["ename"];
                $SSN       =        $DataRows["ssn"];
                $DEPARTMENT =        $DataRows["dept"];
                $SALARY     =        $DataRows["salary"];
                $ADDRESS    =        $DataRows["adr"];
                ?>
                <div>
                <table width="1000" border="5" align="center">
                <caption>View From Database</caption>
            <tr>
                <th>ID </th>
                <th> ENAME</th>
                <th> SSN</th>
                <th>DEPARTMENT </th>
                <th>SALARY </th>
                <th>ADDRESS </th>
                <th>Search Again</th>
                
            </tr>
            <tr>
        <td><?php echo $ID; ?> </td>
        <td><?php  echo $ENAME;?> </td>
        <td><?php  echo $SSN?> </td>
        <td><?php echo $DEPARTMENT; ?> </td>
        <td><?php echo $SALARY; ?> </td>
        <td><?php echo $ADDRESS; ?> </td>
        <td><a href="view_table_data.php">SearchAgain</a> </td>
       
    </tr>

                 </table>
            </div>
           <?php }
           
        }
        ?>
        <table width="1000" border="5" align="center" >
            <caption>View From Database</caption>
            <tr>
                <th>ID </th>
                <th> ENAME</th>
                <th> SSN</th>
                <th>DEPARTMENT </th>
                <th>SALARY </th>
                <th>ADDRESS </th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>
            
        </div>
       
    <?php
   
    global $ConnectingDB;
    $sql="SELECT * FROM emp_record";
    $stmt= $ConnectingDB->query($sql);
    while($DataRows=$stmt->fetch())
    {
        $ID         =        $DataRows["id"];
        $ENAME      =        $DataRows["ename"];
        $SSN       =        $DataRows["ssn"];
        $DEPARTMENT =        $DataRows["dept"];
        $SALARY     =        $DataRows["salary"];
        $ADDRESS    =        $DataRows["adr"];
    
    ?>
    <tr>
        <td><?php echo $ID; ?> </td>
        <td><?php  echo $ENAME;?> </td>
        <td><?php  echo $SSN?> </td>
        <td><?php echo $DEPARTMENT; ?> </td>
        <td><?php echo $SALARY; ?> </td>
        <td><?php echo $ADDRESS; ?> </td>
        <td><a href="update.php?id=<?php echo $ID;?>"> Update</a> </td>
        <td><a href="delete.php?id=<?php echo $ID;?>"> Delete</a> </td>
       
    </tr>
    <?php } ?>
     </table>
     <div class=" ">
            <form class="" action="insert_into_Database.php" method="post">
            <input type="submit" name="insert" value="INSERT DATA">
        </form>
        </div>
    <div>
    
    </div>
    </body>
</html>
