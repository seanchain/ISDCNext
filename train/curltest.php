<?php
$url = "http://www.baidu.com";
$curl = curl_init($url);
curl_exec($curl);
curl_close($curl);

?>
