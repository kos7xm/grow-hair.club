<?php
$sub1 = $_GET["sub1"];
$tid = $_GET["tid"];

const THANKS_URL = './thanks/thanks.php'; // ссылка на страницу "спасибо"

const HASH = '0ggWy';

$post = [
    'name' => $_POST['name'],
    'phone' => $_POST['phone'],
    'aim' => 2,
    'hash' => HASH,
    'subid1' => $sub1,
    'subid2' => $tid,
    'subid3' => "7xm",
    'subid4' => $_POST["subid4"],
    'ip' => $_SERVER['REMOTE_ADDR'],
];

$ch = curl_init("https://leadtrade.ru/api/send_lead");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

$doc = curl_exec($ch);
curl_close($ch);

$arr['name'] = $_POST['name'];
$arr['phone'] = $_POST['phone'];
$arr['sub3'] = $_POST['sub3'];
$arr['lang'] = $_POST['language'];

$url = THANKS_URL . (strrpos(THANKS_URL, '?') ? '&' : '?') .
http_build_query($arr); // добавляем параметры
header('Location: '. $url); // редирект
exit;
?>