<?php
    $email = "ernesto@agualevemogiana.com.br";
    $name = "Ernesto";
    $body = "Hey man, how are you? <br><br><a href='https://google.com'>Google</a>";
    $subject = "A New Message";
    $headers = array(
        'Authorization: Bearer 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
        ',
        'Content-Type: application/json'
    );

    $data = array(
        "personalizations" => array(
            array(
                "to" => array(
                    array(
                        "email" => $email,
                        "name" => $name
                    )
                )
            )
        ),
        "from" => array(
            "email" => "ernesto@agualevemogiana.com.br"
        ),
        "subject" => $subject,
        "content" => array(
            array(
                "type" => "text/html",
                "value" => $body
            )
        )
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send/');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
?>