<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "1111") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "library1") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT id_rent, id_chitach, id_book, date_of_issue, date_return FROM `rent_book`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Код аренды" . "<br>";
    echo"\n" . $stroka['id_rent'] . "<br>"; 
    echo"Код читателя" . "<br>"; 
    echo"\n" . $stroka['id_chitach'] . "<br>";
    echo"Код книги" . "<br>";
    echo"\n" . $stroka['id_book'] . "<br>";
    echo"Дата взятия книги" . "<br>";
    echo"\n" . $stroka['date_of_issue'] . "<br>";
    echo"Дата возврата" . "<br>";
    echo"\n" . $stroka['date_return'] . "<br>";
    echo"---------------------------------" . "<br>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>