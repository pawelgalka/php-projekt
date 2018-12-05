<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Lista blogów</title>
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
<?php


if (count($_GET) == 0){ // no arguments passed
    echo "<h2>Blogi</h2><br/>";
    echo "<ul>";
foreach((new DirectoryIterator("../blogi/")) as $blog){
    if ($blog->isDot()) continue;
    echo "<li> <a href='blog.php?nazwa=".$blog."' >".$blog."</a> </li>";
}
echo "</ul>";

}
else{
    $nazwa = $_GET{"nazwa"};
    $path = "../blogi/".$nazwa."/";
    if (!file_exists($path)){
        echo "blog nie istnieje";
        exit(2);
    }
    echo "Nazwa bloga: ".$nazwa."<br/>";
    $fp = fopen($path."info","r+");
//    flock($fp, LOCK_EX);
    echo "Login: ".fgets($fp,255)."<br/>";
    fgets($fp,255);
    echo "Opis: ".fgets($fp, 255)."<br/>";
//    flock($fp, LOCK_UN);
    fclose($fp);
    echo "<h2>WPISY</h2>";
    $index = 1;
    foreach ((new DirectoryIterator("../blogi/".$nazwa)) as $var){
        if ($var->isDot()) continue;
        if ($var == "info") continue;
        if (is_dir($var)) continue; //katalog komentarzy
        if (pathinfo($var, PATHINFO_EXTENSION)==null) {wpisy($var,$path,$index);
        $index++;}
    }
}


function komentarze($dir,$path){
    if (!file_exists($path.$dir.".k")){
        echo "<h4>Brak komentarzy!</h4>";
    }
    else{
        echo "<h4>Komentarze:</h4>";
        foreach ((new DirectoryIterator($path.$dir.".k/")) as $kom){
            if ($kom->isDot()) continue;
            $fp = fopen($path.$dir.".k/".$kom,"r+");
            flock($fp, LOCK_EX);
            echo "Reakcja: ".fgets($fp,255)."<br/>";
            echo "Kiedy: ".fgets($fp,255)."<br/>";
            echo "Użytkownik: ".fgets($fp,255)."<br/>";
            echo "Treść: ".fgets($fp,1024)."<br/><br/>";
            flock($fp, LOCK_UN);
            fclose($fp);
        }
    }
}

function wpisy($dir,$path, $index){
    echo "<h3>Wpis: ".$index."</h3>";
//    echo $path.$dir;
    $fp = fopen($path.$dir,"r+");
    flock($fp, LOCK_EX);
    echo "Użytkownik: ".fgets($fp,255)."<br/>";
    echo "Kiedy: ".fgets($fp,255)." ".fgets($fp,255)."<br/>";
    echo "Treść: ".fgets($fp,1024)."<br/>";
    echo "<a href='addComent.php?post=".$path.$dir."' > Dodaj komentarz do posta </a> </li>";
    echo "<br/>";
    komentarze($dir,$path);
    zalaczniki($dir,$path);
    flock($fp, LOCK_UN);
    fclose($fp);
}

function zalaczniki($dir,$path){
    echo "<h4>Załączniki:</h4>";
    foreach ((new DirectoryIterator($path)) as $file){
        if (pathinfo($file)['filename'] == $dir."1") {
            echo "<a href='".$path.$dir."1.".pathinfo($file)['extension']."'> Załącznik 1 </a> </li><br/>";
        }
        if (pathinfo($file)['filename'] == $dir."2") {
            echo "<a href='".$path.$dir."2.".pathinfo($file)['extension']."'> Załącznik 2 </a> </li><br/>";
        }
        if (pathinfo($file)['filename'] == $dir."3") {
            echo "<a href='".$path.$dir."3.".pathinfo($file)['extension']."'> Załącznik 3 </a> </li><br/>";
        }
    }
    echo "<br/>";
}
?>
</body>
</html>
