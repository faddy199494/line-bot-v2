<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'aI6AYtOEJPlTbuEKf7flM4Jka3bdntTfLQvO7KdOlOEPHS2TQp4GsPaeiJUgiKbte+2NfNmoi+rEj/gNv8XSmVUjnBJ3iHGQ0GD7fdPnjuoyQmtWkl/kX0ghKN1JCXIDsD1fRHxF2cq+gMLyy8yIxwdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'c73ca4673f2d4ebf1b07f86fac5431c0';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

$jsonFlex = [
  "type": "bubble",
  "hero": {
    "type": "image",
    "url": "https://sv1.picz.in.th/images/2019/06/06/1z3MvD.jpg",
    "size": "full",
    "aspectRatio": "1:1",
    "aspectMode": "cover",
    "action": {
      "type": "uri",
      "label": "line@",
      "uri": "https://line.me/R/ti/p/@sny7726x"
    }
  },
  "body": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "📢 ยินดีต้อนรับสู่ SLOT889TH 🔔",
        "weight": "bold",
        "align": "center",
        "size": "sm"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "lg",
        "spacing": "sm",
        "contents": [
          {
            "type": "box",
            "layout": "baseline",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "😍สมัครได้เเล้ววันนี้ฟรี 100 Credit😍",
                "wrap": true,
                "color": "#666666",
                "size": "sm",
                "align": "center",
                "flex": 5
              }
            ]
          }
        ]
      }
    ]
  },
  "footer": {
    "type": "box",
    "layout": "vertical",
    "spacing": "sm",
    "contents": [
      {
        "type": "button",
        "style": "link",
        "height": "sm",
        "action": {
          "type": "uri",
          "label": "สมัครสมาชิก",
          "uri": "https://line.me/R/ti/p/@sny7726x"
        },
        "color": "#03FF0C",
        "style": "secondary"
      },
      {
        "type": "button",
        "style": "link",
        "height": "sm",
        "action": {
          "type": "uri",
          "label": "เข้าเว็บไซต์",
          "uri": "http://srw889th.com/"
      },
        "color": "#FB0101",
        "style": "secondary"
      },
      {
        "type": "spacer",
        "size": "sm"
      }
    ],
    "flex": 0
  }
}
];


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
