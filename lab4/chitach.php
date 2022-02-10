<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "1111") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "library1") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT id_chitach, PIB_name, address, email FROM `chitach`");
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Код читателя" . "<br>";
    echo"\n" . $stroka['id_chitach'] . "<br>"; 
    echo"ФИО" . "<br>";
    echo"\n" . $stroka['PIB_name'] . "<br>"; 
    echo"Адресс" . "<br>"; 
    echo"\n" . $stroka['address'] . "<br>";
    echo"Email" . "<br>";
    echo"\n" . $stroka['email'] . "<br>";
    echo"---------------------------------" . "<br>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>