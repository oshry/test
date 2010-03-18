<?php
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected
if($q=="Google")
  {
  $xml=("http://news.google.com/news?ned=us&topic=h&output=rss");
  echo $xml;
  }
elseif($q=="MSNBC")
  {
  $xml=("http://pheedo.msnbc.msn.com/id/3032091/device/rss");
    echo $xml;
  }

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

$x = $xmlDoc->documentElement;
echo $x->childNodes->nodeValue."ffffffffffffffff";
foreach ($x->childNodes AS $item)
  {
  print $item->nodeName . " = " . $item->nodeValue . "<br />";
  }

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0)->getElementsByTagName('title')->item(0)->childNodes->nodeValue;
echo $channel."channel";
//$channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
$channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->nodeValue;
echo"$channel_title".$channel_title."$channel_title";
$channel_link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
echo("<p><a href='" . $channel_link
  . "'>" . $channel_title . "</a>");
echo("<br />");
echo($channel_desc . "</p>");

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=2; $i++)
  {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;

  echo ("<p><a href='" . $item_link
  . "'>" . $item_title . "</a>");
  echo ("<br />");
  echo ($item_desc . "</p>");
  }
?> 