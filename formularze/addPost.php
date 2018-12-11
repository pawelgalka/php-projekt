<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tworzenie bloga</title>
    <link rel="stylesheet" title="compact" href="styl.css" type="text/css" />
</head>

<body>
<div class="menu">
    <p>Menu:</p>
    <ul>
        <li><a href="createBlog.php">Nowy blog</a></li>
        <li><a href="addPost.php">Nowy wpis</a></li>
        <li><a href="blog.php">Wszystkie blogi</a></li>
    </ul>
</div>
<div id="main">
    <h1 id="title">Formularz tworzenia posta</h1>
    <div id="text">

<form action="../skrypty/wpis.php" method="post" enctype="multipart/form-data" target="_blank">
	<label for="username"><b>Nazwa użytkownika</b></label><br/>
    <input type="text" placeholder="Enter Username" name="username" required="required">
	</input><br/>
	<label for="psw"><b>Hasło</b></label><br/>
    <input type="password" placeholder="Enter Password" name="psw" required="required">
	</input><br/>
	<label for="post"><b>Treść posta:</b></label><br/>
	<textarea name="post" cols="40" rows="5"></textarea><br/>
	<label for="date">Data:</label>
	<input type="text" name="data" pattern="\d{4}\-\d{2}\-\d{2}" value=<?php echo date("Y-m-d")?>
    </input><br/>
    <label for="time">Czas:</label>
	<input type="text" name="time" pattern="\d{2}\:\d{2}" value=<?php echo date("H:i")?>
    </input><br/>
    <label for="time">Załączniki (maksymalnie 3):</label><br/>
    <input type="file" name="1">
    </input><br/>
    <input type="file" name="2">
    </input><br/>
    <input type="file" name="3">
    </input><br/>
	<input type="submit"/>
	</input><br/>
	<input type="reset">
	</input><br/>
</form>
    </div>
</div>

</body>
</html>