<?php
require_once('./LINEBotTiny.php');
require_once('hottopeper.php');

$channelAccessToken = '';
$channelSecret = '';

$inputString = file_get_contents('php://input');
error_log($inputString);

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            error_log($message['type']);
            switch ($message['type']) {
                case 'text':
                    file_put_contents('text.txt', print_r($message['type']), true);
                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => $message['text']
                            ]
                        ]
                    ]);
                    break;
                case 'location':

                    $lat = $message['latitude'];
                    $lon = $message['longitude'];
                    error_log($lon);
                    $result = hottopeper();
                    error_log($result);

                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'message' => [
                            [
                                'type' => 'text',
                                //'text' => $shopinfo['name']
                                'text' => $result['results']['shop']['0']['name'] . $result['results']['shop']['0']['urls']['pc']
                            ]
                        ]
                    ]);
                    break;
                default:
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }
            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};
