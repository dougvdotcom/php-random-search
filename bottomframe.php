<?
/*
Displaying A Random Yahoo! Search Every 30 Seconds With JavaScript And PHP
Copyright 2006 Doug Vanderweide, dba Rescue-ME
http://www.dougv.com

Distributed under the Creative Commons Attribution / Share-Alike 2.5 License
http://creativecommons.org/licenses/by-sa/2.5/

Any distribution or derivative work based on this script must include the
original source code from this work, and must retain this copyright
notice block intact.
*/

$url = "http://search.yahoo.com/search?p=" . urlencode($_GET['p']);
$pagetext = "";

/*
to use fopen, uncomment this code block
and comment out the curl codeblock below
*/

/* START fopen codeblock START
$fp = fopen($url, 'r');
while(!feof($fp)) {
	$pagetext .= fread($fp, 1024);
}
fclose($fp);
END fopen codeblock END */

/* START curl codeblock START */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$pagetext = curl_exec($ch);
curl_close($ch);
/* END curl codeblock END */

$pagetext = str_replace("<head>", "<head>\n<base target=\"_blank\">\n", $pagetext);
echo $pagetext;
?>