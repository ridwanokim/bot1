<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = 'kDRYfwvjdR7v+cQxRr/rUnspzHUjHSMUkRyAx2FfOpibBDM3oHANA45BLF5R1CRIPOWQTKQrHXXqTFo+6aOnVFYu3PM6N50LRRNAP+PBhaUJiReXBSMysw+bLSXh+TYpiDrIwRbww0zouR0VXs5ZCgdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = 'e314c464981ab09cf75d205a1132cd84
';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];

//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='Hi')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo'
									)
							)
						);
				
	}
	if($pesan_datang=='tes')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array (
  'type' => 'template',
  'altText' => 'This is a buttons template',
  'template' => 
  array (
    'type' => 'buttons',
    'thumbnailImageUrl' => 'https://example.com/bot/images/image.jpg',
    'imageAspectRatio' => 'rectangle',
    'imageSize' => 'cover',
    'imageBackgroundColor' => '#FFFFFF',
    'title' => 'Menu',
    'text' => 'Please select',
    'defaultAction' => 
    array (
      'type' => 'uri',
      'label' => 'View detail',
      'uri' => 'http://example.com/page/123',
    ),
    'actions' => 
    array (
      0 => 
      array (
        'type' => 'postback',
        'label' => 'Buy',
        'data' => 'action=buy&itemid=123',
      ),
      1 => 
      array (
        'type' => 'postback',
        'label' => 'Add to cart',
        'data' => 'action=add&itemid=123',
      ),
      2 => 
      array (
        'type' => 'uri',
        'label' => 'View detail',
        'uri' => 'http://example.com/page/123',
      ),
    ),
  ),
)
							)
						);
				
	}

}
 
$result =  json_encode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json',$result);


$client->replyMessage($balas);

?>
