<?php include("includes/header.php"); ?>
<form action="chitachchange.php" method="post">
      <p>
        <label for="id_chitach">id_chitach:</label>
        <input type="number" name="id_chitach" id="id_chiatch">
    </p>
    <p>
        <label for="PIB_name">PIB_name:</label>
        <input type="text" name="PIB_name" id="PIB_name">
    </p>
    <p>
        <label for="address">address:</label>
        <input type="text" name="address" id="address">
    </p>
    <p>
        <label for="email">email:</label>
        <input type="text" name="email" id="email">
    </p>
   
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="chitach.php" ' > <br>
<br> <input class="button" value="Вернутся обратно" onClick='location.href="redirecting.php"'> <br>
</form>

<?php include("includes/footer.php"); ?>



<?php
if(isset($_POST["add"])){
$link = mysqli_connect("localhost", "root", "1111", "library1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$id_chitach = mysqli_real_escape_string($link, $_REQUEST['id_chitach']);
$PIB_name = mysqli_real_escape_string($link, $_REQUEST['PIB_name']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
 
// Attempt insert query execution
$sql = "INSERT INTO chitach (id_chitach, PIB_name, address, email) VALUES ('$id_chitach','$PIB_name', '$address', '$email' )";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}
else {}
?>


<?php
if(isset($_POST["delete"])){
$link = mysqli_connect("localhost", "root", "1111", "library1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id_chitach = mysqli_real_escape_string($link, $_REQUEST['id_chitach']);
 
// Attempt delete query execution
$sql = "DELETE FROM chitach WHERE id_chitach='$id_chitach'";
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>


<?php
if(isset($_POST["update"])){
$link = mysqli_connect("localhost", "root", "1111", "library1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$id_chitach = mysqli_real_escape_string($link, $_REQUEST['id_chitach']);
$PIB_name = mysqli_real_escape_string($link, $_REQUEST['PIB_name']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);

 
// Attempt update query execution
$sql = "UPDATE chitach SET  PIB_name = '$PIB_name', address = '$address', email = '$email' WHERE id_chitach = '$id_chitach'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>