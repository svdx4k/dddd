<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "1111") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "library1") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT book_name, author, rental_price, kolichestvo FROM `book`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Название" . "<br>";
    echo"\n" . $stroka['book_name'] . "<br>"; 
    echo"Автор" . "<br>"; 
    echo"\n" . $stroka['author'] . "<br>";
    echo"Стоимомть аренды" . "<br>";
    echo"\n" . $stroka['rental_price'] . "<br>";
    echo"Количество" . "<br>";
    echo"\n" . $stroka['kolichestvo'] . "<br>";
    echo"---------------------------------" . "<br>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>