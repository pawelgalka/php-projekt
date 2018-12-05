<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tworzenie bloga</title>
</head>

<body>

<div id="pozostale_cwiczenia">
    Menu:
    <ul>
        <li><a href="createBlog.php">Nowy blog</a></li>
        <li><a href="addPost.php">Nowy wpis</a></li>
        <li><a href="blog.php">Wszystkie blogi</a></li>
    </ul>
</div>

<h1 id="title">Formularz tworzenia bloga</h1>

<form action="../skrypty/nowy.php">
    <label for="name"><b>Nazwa bloga</b></label><br/>
    <input type="text" placeholder="Enter name" name="name" required="required"/><br/>
    <label for="username"><b>Nazwa użytkownika</b></label><br/>
    <input type="text" placeholder="Enter Username" name="username" required="required"/><br/>
    <label for="psw"><b>Hasło</b></label><br/>
    <input type="password" placeholder="Enter Password" name="psw" required="required"/><br/>
    <label for="description"><b>Opis bloga</b></label><br/>
    <textarea name="description" cols="30" rows="10"></textarea><br/>
    <input type="submit"/><br/>
    <input type="reset"><br/>
</body>
</html>