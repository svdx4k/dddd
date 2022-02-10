<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">
<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="logout.php">Выйти</a> из системы</p>
</div>
<form>
<input class="button" value="Книга" onClick='location.href="book.php" ' > <br>
<br> <input class="button" value="Читатель" onClick='location.href="chitach.php"'> <br>
<br> <input class="button" value="Заказ" onClick='location.href="order.php"'> <br>
<br> <input class="button" value="Прокат книги" onClick='location.href="rentbook.php"'> <br>
<br> <input class="button" value="Редактировать базу данных" onClick='location.href="redirecting.php"'> <br>
</form>


	
<?php include("includes/footer.php"); ?>
	
<?php endif; ?>
