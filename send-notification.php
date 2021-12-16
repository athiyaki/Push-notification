


<?php
define('API_KEY','AAAAmiGa9SQ:APA91bHlinsDihvX11ilUoG421npExwRpob_Z3cRcSYJQMH_LyP2JgxbbbPVsK9hGZ4SMVkLOmHHi182wygMQ6wPKXdUSeBloVjLLZpMSYKQLQE28Z_J8WoS7WlDoqrKnUasbto8oPYF');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
 $token='3IY4TbuS3pUCKyhbjb:APA91bHuYNyvyGBrA4MmprpFV2oaUDf_rF614nvopTRPNL0ph5sceZ3WFWyyU5MX8sxfxkB8S5o3-Sc2r9jCyJcmLf_olIL6hyo33O4bUBSaCvP4EIda32Or1KbFsA_QLi7rP8jjMH2C';

    $notification = [
            'title' =>'title',
            'body' => 'body of message.',
            'icon' =>'myIcon', 
            'sound' => 'mySound'
        ];
        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

        $fcmNotification = [
            // 'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization:  key=' . API_KEY,
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        // curl_close($ch);


        if ($result === FALSE) 
{
die('FCM Send Error: ' . curl_error($ch));
}
else
{
    curl_close($ch);
    print_r($result);
    return $result;
}


