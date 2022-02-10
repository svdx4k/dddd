
<?php include("includes/header.php"); ?>
<form action="bookchange.php" method="post">
      <p>
        <label for="id_book">id_book:</label>
        <input type="number" name="id_book" id="id_book">
    </p>
    <p>
        <label for="book_name">book_name:</label>
        <input type="text" name="book_name" id="book_name">
    </p>
    <p>
        <label for="author">author:</label>
        <input type="text" name="author" id="author">
    </p>
    <p>
        <label for="rental_price">rental_price:</label>
        <input type="text" name="rental_price" id="rental_price">
    </p>
    <p>
        <label for="kolichestvo">kolichestvo:</label>
        <input type="text" name="kolichestvo" id="kolichestvo">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="book.php" ' > <br>
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
$id_book = mysqli_real_escape_string($link, $_REQUEST['id_book']);
$book_name = mysqli_real_escape_string($link, $_REQUEST['book_name']);
$author = mysqli_real_escape_string($link, $_REQUEST['author']);
$rental_price = mysqli_real_escape_string($link, $_REQUEST['rental_price']);
$kolichestvo = mysqli_real_escape_string($link, $_REQUEST['kolichestvo']);
 
// Attempt insert query execution
$sql = "INSERT INTO book (id_book, book_name, author, rental_price, kolichestvo) VALUES ('$id_book','$book_name', '$author', '$rental_price', '$kolichestvo')";
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

$id_book = mysqli_real_escape_string($link, $_REQUEST['id_book']);
 
// Attempt delete query execution
$sql = "DELETE FROM book WHERE id_book='$id_book'";
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
$id_book = mysqli_real_escape_string($link, $_REQUEST['id_book']);
$book_name = mysqli_real_escape_string($link, $_REQUEST['book_name']);
$author = mysqli_real_escape_string($link, $_REQUEST['author']);
$rental_price = mysqli_real_escape_string($link, $_REQUEST['rental_price']);
$kolichestvo = mysqli_real_escape_string($link, $_REQUEST['kolichestvo']);
 
// Attempt update query execution
$sql = "UPDATE book SET id_book ='$id_book', book_name = '$book_name', author = '$author', rental_price = '$rental_price'  WHERE kolichestvo='$kolichestvo'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>