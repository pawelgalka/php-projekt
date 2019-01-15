<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Dodanie komentarza</title>
</head>

<body>
<?php
$semafor = fopen("semafor_do_nowego_komentarza", "r+");
if (flock($semafor, LOCK_EX))
{
$path = $_GET['post'].".k/";
if(!file_exists($path)){
    mkdir($_GET['post'].".k", 0777, true);
    chmod($_GET['post'].".k", 0777);

}

$ilosc = 0;
foreach ((new DirectoryIterator($path)) as $var){
    if ($var->isDot()) continue;
    $ilosc++;
}

	$fp = fopen($path.strval($ilosc),"w+");
    chmod($path.strval($ilosc), 0777);
    $data = $_GET['reaction']."\n".date("Y-m-d H:i:s")."\n".$_GET['nickname']."\n".$_GET['comment']."\n";
    fwrite($fp,$data);
    fclose($fp);
    flock($semafor, LOCK_UN);
}
else{
    echo "Race condition error";
    exit(-1);
}


?>
</body>
</html>
