<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');
require_once __DIR__ . '/vendor/autoload.php';

<<<<<<< HEAD
$channelAccessToken = '/UTV8SXGohA1/hcm4aVtvy9NZnTDhlXmJlPWZmZumDk1cmfb7ZdRViABc9Gg4FJSCDd5HtgyWy11XZrzMWuWLn6UzRiaVR9q/DHCD2hzL4AeFhSqSjKdjsgb3p796e7jUporksmv98PZamht+46wrwdB04t89/1O/w1cDnyilFU=';
$channelSecret = '26652f6a60c066305f3e73eb004c5484';
=======
$channelAccessToken = '';
$channelSecret = '';
>>>>>>> ff32001 (Initial Commit)

$aimJsonPath = __DIR__ . '/versatile-lotus-308104-f424b674cce1.json';

$google_client = new Google_Client();
$google_client->setApplicationName('カレンダー予約保存ボット');
$google_client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
$google_client->setAuthConfig($aimJsonPath);

$google_service = new Google_Service_Calendar($google_client);

//$calendar_id = 'linbot440@versatile-lotus-308104.iam.gserviceaccount.com';
$calendar_id = 'yajima0401ryuzo@gmail.com';


use \Firebase\JWT\JWT;

class Zoom_Api
{
<<<<<<< HEAD
    private $zoom_api_key = '0Mp3HIKESGOEBhdkEMYGiA';
    private $zoom_api_secret = 'iSGuyWA4ubDNdMfR3pOBEgSvveN7JtniZGZF';
=======
    private $zoom_api_key = '';
    private $zoom_api_secret = '';
>>>>>>> ff32001 (Initial Commit)

    protected function sendRequest($data)
    {
        $request_url = 'https://api.zoom.us/v2/users/yajima0401ryuzo@gmail.com/meetings';
        $headers = array(
            'authorization: Bearer' . $this->generateJWTKey(),
            'content-type:application/json'
        );
        $postFields = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {
            return $err;
        }
        return json_decode($response);
    }

    public function generateJWTKey()
    {
        $key = $this->zoom_api_key;
        $secret = $this->zoom_api_secret;
        $token = array(
            "iss" => $key,
            "exp" => time() + 3600 //60 seconds as suggested
        );
        return JWT::encode($token, $secret);
    }

    public function createAMeeting($data = array())
    {
        //$post_time  = $data['start_date'];
        //$start_time = gmdate("Y-m-d\TH:i:s", strtotime($post_time));
        $start_time = $data['start_date'];
        $createAMeetingArray = array();
        if (!empty($data['alternative_host_ids'])) {
            if (count($data['alternative_host_ids']) > 1) {
                $alternative_host_ids = implode(",", $data['alternative_host_ids']);
            } else {
                $alternative_host_ids = $data['alternative_host_ids'][0];
            }
        }
        $createAMeetingArray['topic']      = $data['topic'];
        $createAMeetingArray['agenda']     = !empty($data['agenda']) ? $data['agenda'] : "";
        $createAMeetingArray['type']       = !empty($data['type']) ? $data['type'] : 2; //Scheduled
        $createAMeetingArray['start_time'] = $start_time;
        $createAMeetingArray['timezone']   = "Asia/Tokyo";
        $createAMeetingArray['password']   = !empty($data['password']) ? $data['password'] : "";
        $createAMeetingArray['duration']   = !empty($data['duration']) ? $data['duration'] : 60;
        $createAMeetingArray['settings']   = array(
            'join_before_host'  => !empty($data['join_before_host']) ? true : false,
            'host_video'        => !empty($data['option_host_video']) ? true : false,
            'participant_video' => !empty($data['option_participants_video']) ? true : false,
            'mute_upon_entry'   => !empty($data['option_mute_participants']) ? true : false,
            'enforce_login'     => !empty($data['option_enforce_login']) ? true : false,
            'auto_recording'    => !empty($data['option_auto_recording']) ? $data['option_auto_recording'] : "none",
            'alternative_hosts' => isset($alternative_host_ids) ? $alternative_host_ids : ""
        );
        return $this->sendRequest($createAMeetingArray);
    }
}







$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            error_log($message['type']);
            switch ($message['type']) {
                case 'text':
                    if ($message['text'] === '会議') {
                        $client->replyMessage([
                            'replyToken' => $event['replyToken'],
                            'messages' => [
                                array(
                                    "type" => "template",
                                    "altText" => "this is a confirm template",
                                    "template" => array(
                                        "type" => "confirm",
                                        "text" => "ZOOM会議を設定する",
                                        "actions" => [
                                            array(
                                                "type" => "datetimepicker",
                                                "data" => "meeting", // will be included in postback action
                                                "label" => "会議時間を設定する",
                                                "mode" => "datetime", // date | time | datetime
<<<<<<< HEAD
                                                //"initial": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                                //"max": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                                //"min": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
=======
>>>>>>> ff32001 (Initial Commit)
                                            ),
                                            array(
                                                "type" => "postback",
                                                "label" => "しない",
                                                "data" => 'no'
                                            )
                                        ]
                                    )
                                )

                            ]
                        ]);
                    } else {


                        $client->replyMessage([
                            'replyToken' => $event['replyToken'],
                            'messages' => [
                                [
                                    'type' => 'text',
                                    'text' => '「会議」と入力してみてね！ZOOM会議が設定できるよ'
                                ]
                            ]
                        ]);
                    }
                    break;
                case 'location':
                    $lat = $message['latitude'];
                    $lon = $message['longitude'];
<<<<<<< HEAD
                    // $url = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=be9fee35e709e71a&lat=34.67&lng=135.52&range=5&order=4&format=json';
=======
>>>>>>> ff32001 (Initial Commit)

                    $url = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=be9fee35e709e71a&lat=' . $lat . '&lng=' . $lon . '&range=5&order=3&format=json';
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    $response = curl_exec($ch);
                    $result = json_decode($response, true);
                    curl_close($ch);

                    error_log(print_r($result, true));

                    foreach ($result['results']['shop'] as $key => $value) {
                        $shopinfo .= $value['name'] . "\n";
                        $shopinfo .= $value['urls']['pc'] . "\n\n";
                        if ($key == 2) {
                            break;
                        }
                    }


                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => $shopinfo
                            ]
                        ]
                    ]);
                    break;


                default:
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }
            break;

        case 'postback':
            error_log($event['postback']['data']);
            if ($event['postback']['data'] === 'meeting') {
                error_log(print_r($event, true));
                $date = strtotime($event['postback']['params']['datetime']);
                $start_time = date('Y-m-d\TH:i:s', $date);
                $end_time = date('Y-m-d\TH:i:s', strtotime('+1 hour', $date));
                $reply_date = date('Y年m月d日 H時i分', $date);




                $zoom_meeting = new Zoom_Api();
<<<<<<< HEAD
                //error_log(print_r($zoom_meeting->sendRequest(), true));
=======
>>>>>>> ff32001 (Initial Commit)
                try {
                    $z = $zoom_meeting->createAMeeting(
                        array(
                            'start_date' => $start_time,
                            'topic' => 'Meeting'
                        )
                    );
<<<<<<< HEAD
                    //error_log(print_r($z, true));
=======
>>>>>>> ff32001 (Initial Commit)
                    $success = $z->join_url;
                } catch (Exception $ex) {
                    echo $ex;
                }


                $google_event = new Google_Service_Calendar_Event(array(
                    'summary' => 'ZOOM会議', //予定のタイトル
                    'start' => array(
                        'dateTime' => $start_time, // 開始日時
                        'timeZone' => 'Asia/Tokyo',
                    ),
                    'end' => array(
                        'dateTime' => $end_time, // 終了日時
                        'timeZone' => 'Asia/Tokyo',
                    ),
                ));

                $google_event = $google_service->events->insert($calendar_id, $google_event);
                error_log(print_r($google_event, true));
                $client->replyMessage([
                    'replyToken' => $event['replyToken'],
                    'messages' => [
                        [
                            'type' => 'text',
                            'text' => $reply_date . 'にZOOM会議を設定してグーグルカレンダーに予定を追加しました' . $success
                        ]
                    ]
                ]);
            } else if ($event['postback']['data'] === 'no') {
                $client->replyMessage([
                    'replyToken' => $event['replyToken'],
                    'messages' => [
                        [
                            'type' => 'text',
                            'text' => 'またの機会に会議を登録してみてね！位置情報を送ると近くの飲食店を紹介できるよ！'
                        ]
                    ]
                ]);
            } else {

                $client->replyMessage([
                    'replyToken' => $event['replyToken'],
                    'messages' => [
                        [
                            'type' => 'text',
                            'text' => 'またの機会に会議を登録してみてね！位置情報を送ると近くの飲食店を紹介できるよ！'
                        ]
                    ]
                ]);
            }

            break;

        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};
