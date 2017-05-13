<?php
define ('HOSTNAME', 'https://yioop.com/s/news');

$rss="?f=rss&q=query+terms&limit=0&num=100";
$json="?f=json&q=query+terms&limit=0&num=100";


{

    $element= $_REQUEST["f"];
    $query= $_REQUEST["h"];
	$postvars ='';
	$postvars .='?'.urlencode('f').'='.urlencode($element).'&'.urlencode('q').'='.urlencode($query).'&'.urlencode('num').'='.urlencode(100);
	
	$url = HOSTNAME.$postvars;
    $session = curl_init($url);

	
}

curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
$xml_string = curl_exec($session);

if($element =="json")
{
header("Content-Type: text/json");


echo json_encode($xml_string);
}
else
{
header("Content-Type: application/rss+xml");


echo ($xml_string);

}


curl_close($session);
?>