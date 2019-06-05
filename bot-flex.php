<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'aI6AYtOEJPlTbuEKf7flM4Jka3bdntTfLQvO7KdOlOEPHS2TQp4GsPaeiJUgiKbte+2NfNmoi+rEj/gNv8XSmVUjnBJ3iHGQ0GD7fdPnjuoyQmtWkl/kX0ghKN1JCXIDsD1fRHxF2cq+gMLyy8yIxwdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'c73ca4673f2d4ebf1b07f86fac5431c0';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

$jsonFlex = [
      "type": "bubbleFlex",
      "name": "Bubble message 1",
      "params": {
        "header": {
          "type": "box",
          "disable": true,
          "componentProps": [
            "vertical",
            0,
            "",
            "",
            {
              "type": "uri"
            }
          ],
          "contents": []
        },
        "hero": {
          "type": "image",
          "disable": false,
          "componentProps": [
            "https://srw889th.com/pics/slot889th/S__8650796.jpg",
            "none",
            "full",
            "none",
            "none",
            "1:1",
            "cover",
            "",
            "",
            {
              "type": "uri",
              "label": "Link register",
              "uri": "https://line.me/R/ti/p/%40sny7726x",
              "disable": false,
              "mode": "datetime"
            }
          ]
        },
        "body": {
          "type": "box",
          "disable": false,
          "componentProps": [
            "vertical",
            "none",
            "md",
            "",
            {
              "type": "uri",
              "label": "Action",
              "uri": "https://line.me/R/ti/p/%40sny7726x"
            }
          ],
          "contents": [
            {
              "type": "text",
              "componentProps": [
                "â™š à¸ªà¸¡à¸±à¸„à¸£à¹€à¸¥à¸¢à¸•à¸­à¸™à¸™à¸µà¹‰à¸Ÿà¸£à¸µ â™š",
                "none",
                "none",
                "",
                "bold",
                "center",
                "none",
                "",
                "none",
                {
                  "type": "uri"
                }
              ]
            },
            {
              "type": "text",
              "componentProps": [
                "ðŸ˜ Credit 100 à¸šà¸²à¸— ðŸ˜",
                "none",
                "none",
                null,
                null,
                "center",
                null,
                "",
                "none",
                {
                  "type": "uri"
                }
              ]
            },
            {
              "type": "image",
              "disable": false,
              "componentProps": [
                "https://media.tenor.co/images/038350fd12d6b84d653ae64704601e2f/tenor.gif",
                "none",
                "none",
                null,
                null,
                "none",
                "none",
                "",
                null,
                {
                  "type": "uri"
                }
              ]
            }
          ]
        },
        "footer": {
          "type": "box",
          "disable": false,
          "componentProps": [
            "vertical",
            "none",
            "",
            "",
            {
              "type": "uri"
            }
          ],
          "contents": [
            {
              "type": "spacer",
              "componentProps": [
                "xxl"
              ]
            },
            {
              "type": "button",
              "componentProps": [
                {
                  "type": "uri",
                  "label": "à¸ªà¸¡à¸±à¸„à¸£à¸ªà¸¡à¸²à¸Šà¸´à¸",
                  "uri": "https://line.me/R/ti/p/%40sny7726x",
                  "mode": "datetime"
                },
                "none",
                "",
                "none",
                "primary",
                "#D90D0D",
                "none"
              ]
            },
            {
              "type": "button",
              "componentProps": [
                {
                  "type": "uri",
                  "label": "à¹€à¸‚à¹‰à¸²à¹€à¸§à¹‡à¸šà¹„à¸‹à¸•à¹Œ",
                  "uri": "https://srw889th.com/",
                  "mode": "datetime"
                },
                "none",
                "",
                "none",
                "primary",
                null,
                null
              ]
            }
          ]
        },



if ( sizeof($request_array['events']) > 0 ) {
    foreach ($request_array['events'] as $event) {
        error_log(json_encode($event));
        $reply_message = '';
        $reply_token = $event['replyToken'];


        $data = [
            'replyToken' => $reply_token,
            'messages' => [$jsonFlex]
        ];

        print_r($data);

        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
        
    }
}

echo "OK";




function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

?>
