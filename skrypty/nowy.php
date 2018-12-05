<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tworzenie bloga</title>
</head>

<body>
<?php

if(!file_exists("../blogi/".$_GET["name"])){
    $sem = sem_get(2);
    sem_acquire($sem);
    mkdir("../blogi/".$_GET["name"], 0777, true);
    chmod("../blogi/".$_GET["name"], 0777);
    echo "Blog o nazwie ".$_GET["name"]." został utworzony";
    sem_release($sem);

}
else{
    echo "Blog o podanej nazwie już istnieje";
    exit(1);
}

$plik = "../blogi/".$_GET{"name"}."/info";
$handle = fopen($plik,"w");
if(flock($handle, LOCK_EX)){
    chmod($plik, 0777);
    $data = $_GET["username"]."\n".md5($_GET["psw"])."\n".$_GET["description"]."\n";
    fwrite($handle, $data);
    flock($handle, LOCK_UN);
}
else{
    echo "Race condition error";
    exit(-1);
}
fclose($handle);
?>
</body>
</html>
