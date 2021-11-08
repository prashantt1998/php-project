//connection.php

<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"prashant");


if ($link)
{
    
}
else
{
    echo "disconnected";
}
?>

//connection.php xxxx



//form.php

<center><H1>BY PRASHANT SINGH</H1></center>

<?php
include "connection.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Name:- <input type="text" name="Name" value=""><br><br>
        Email:- <input type="text" name="Email" value=""><br><br>
        Designation:- <input type="text" name="Designation" value=""><br><br>
        Salary:- <input type="text" name="Salary" value=""><br><br>
        Date:- <input type="text" name="Date" value=""><br><br>
        <input type="submit" name="submit" value="submit"/><br><br>
    </form>
</body>
</html>


<?php
if(isset($_POST["submit"]))
{
    mysqli_query($link,"insert into crud values('$_POST[Name]','$_POST[Email]','$_POST[Designation]','$_POST[Salary]','$_POST[Date]')") or die(mysqli_error($link));

}

?>
<hr>
<hr>


<div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">All Users</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Salary</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $count=0;
                                            $res=mysqli_query($link,"select * from crud");
                                            while($row=mysqli_fetch_array($res))
                                            {
                                           $count=$count+1;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?></th>
                                                    <td><?php echo $row["Name"]; ?></td>
                                                    <td><?php echo $row["Email"]; ?></td>
                                                    <td><?php echo $row["Designation"]; ?></td>
                                                    <td><?php echo $row["Salary"]; ?></td>
                                                    <td><?php echo $row["Date"]; ?></td>
                                                    <td><a href="update.php?Name=<?php echo $row["Name"]; ?>">Update</a></td>
                                                    <td><a href="delete.php?Name=<?php echo $row["Name"]; ?>">Delete</a></td>                                                </tr>

                                                <?php

                                            }

                                            ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                        </form>
                    </div>

                </div>



//form.php xxxxxx




//delete.php

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="0; url=http://localhost/prashant/form.php" />
</head>
<body>
    
</body>
</html>

<?php
include "connection.php";
error_reporting(0);
$sql = "DELETE FROM crud WHERE Name='" . $_GET["Name"] . "'";
if (mysqli_query($link, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);



?>





//delete.php xxxxx



//update.php

<?php
include "connection.php";

$result = mysqli_query($link,"SELECT * FROM crud WHERE Name='" . $_GET['Name'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form action="" method="POST">
        Name:- <input type="text" name="Name" value="<?php echo $row['Name']; ?>"><br><br>
        Email:- <input type="text" name="Email" value="<?php echo $row['Email']; ?>"><br><br>
        Designation:- <input type="text" name="Designation" value="<?php echo $row['Designation']; ?>"><br><br>
        Salary:- <input type="text" name="Salary" value="<?php echo $row['Salary']; ?>"><br><br>
        Date:- <input type="text" name="Date" value="<?php echo $row['Date']; ?>"><br><br>
        <input type="submit" name="submit" value="submit"/><br><br>
    </form>

</form>
</body>
</html>

<?php
if(isset($_POST["submit"]))
{
    mysqli_query($link,"UPDATE `crud` SET `Name`='" . $_POST['Name'] . "',`Email`='" . $_POST['Email'] . "',`Designation`='" . $_POST['Designation'] . "',`Salary`='" . $_POST['Salary'] . "',`Date`='" . $_POST['Date'] . "' WHERE Name='" . $_POST['Name'] . "'");
?> <meta http-equiv="refresh" content="0; url=http://localhost/prashant/form.php" /> <?php
}

?>


//update.php xxxx