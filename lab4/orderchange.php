<?php include("includes/header.php"); ?>
<form action="orderchange.php" method="post">
      <p>
        <label for="id_order">id_order:</label>
        <input type="number" name="id_order" id="id_order">
    </p>
    <p>
        <label for="id_chitach_">id_chitach:</label>
        <input type="number" name="id_chitach" id="id_chitach">
    </p>
    <p>
        <label for="id_book">id_book:</label>
        <input type="number" name="id_book" id="id_book">
    </p>
    <p>
        <label for="kolichestvo">kolichestvo:</label>
        <input type="number" name="kolichestvo" id="kolichestvo">
    </p>
   
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="order.php" ' > <br>
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
$id_order = mysqli_real_escape_string($link, $_REQUEST['id_order']);
$id_chitach = mysqli_real_escape_string($link, $_REQUEST['id_chitach']);
$id_book = mysqli_real_escape_string($link, $_REQUEST['id_book']);
$kolichestvo = mysqli_real_escape_string($link, $_REQUEST['kolichestvo']);
 
// Attempt insert query execution
$sql = "INSERT INTO orderr (id_order, id_chitach, id_book, kolichestvo) VALUES ('$id_order','$id_chitach', '$id_book', '$kolichestvo' )";
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

$id_order = mysqli_real_escape_string($link, $_REQUEST['id_order']);
 
// Attempt delete query execution
$sql = "DELETE FROM orderr WHERE id_order='$id_order'";
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
$id_order = mysqli_real_escape_string($link, $_REQUEST['id_order']);
$id_chitach = mysqli_real_escape_string($link, $_REQUEST['id_chitach']);
$id_book = mysqli_real_escape_string($link, $_REQUEST['id_book']);
$kolichestvo = mysqli_real_escape_string($link, $_REQUEST['kolichestvo']);

 
// Attempt update query execution
$sql = "UPDATE orderr SET  id_chitach = '$id_chitach', id_book = '$id_book', kolichestvo = '$kolichestvo' WHERE id_order = '$id_order'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>