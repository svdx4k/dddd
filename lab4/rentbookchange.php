<?php include("includes/header.php"); ?>
<form action="rentbookchange.php" method="post">
      <p>
        <label for="id_rent">id_rent:</label>
        <input type="number" name="id_rent" id="id_rent">
    </p>
    <p>
        <label for="id_chitach">id_chitach:</label>
        <input type="number" name="id_chitach" id="id_chitach">
    </p>
    <p>
        <label for="id_book">id_book:</label>
        <input type="number" name="id_book" id="id_book">
    </p>
    <p>
        <label for="date_of_issue">date_of_issue:</label>
        <input type="date" name="date_of_issue" id="date_of_issue">
    </p>
    <p>
        <label for="date_return">date_return:</label>
        <input type="date" name="date_return" id="date_return">
    </p>
   
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="rentbook.php" ' > <br>
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
$id_rent = mysqli_real_escape_string($link, $_REQUEST['id_rent']);
$id_chitach = mysqli_real_escape_string($link, $_REQUEST['id_chitach']);
$id_book = mysqli_real_escape_string($link, $_REQUEST['id_book']);
$date_of_issue = mysqli_real_escape_string($link, $_REQUEST['date_of_issue']);
$date_return = mysqli_real_escape_string($link, $_REQUEST['date_return']);
 
// Attempt insert query execution
$sql = "INSERT INTO rent_book (id_rent, id_chitach, id_book, date_of_issue , date_return) VALUES ('$id_rent','$id_chitach', '$id_book', '$date_of_issue', '$date_return' )";
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

$id_rent = mysqli_real_escape_string($link, $_REQUEST['id_rent']);
 
// Attempt delete query execution
$sql = "DELETE FROM rent_book WHERE id_rent='$id_rent'";
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
$id_rent = mysqli_real_escape_string($link, $_REQUEST['id_rent']);
$id_chitach = mysqli_real_escape_string($link, $_REQUEST['id_chitach']);
$id_book = mysqli_real_escape_string($link, $_REQUEST['id_book']);
$date_of_issue = mysqli_real_escape_string($link, $_REQUEST['date_of_issue']);
$date_return = mysqli_real_escape_string($link, $_REQUEST['date_return']);

 
// Attempt update query execution
$sql = "UPDATE rent_book SET   id_chitach = '$id_chitach', id_book = '$id_book', date_of_issue = '$date_of_issue',date_return ='$date_return' WHERE id_rent = '$id_rent'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>