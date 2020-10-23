<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php form</title>
    <style>
        body{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        form{
            display: flex;
            flex-direction: column;
            width: 500px;
        }
        form input{
            height: 40px;
        }
        form label{
            height: 40px;
        }
    </style>
</head>
<body>
    
    <form action="" method="post">

        <label for="mail">E-mail</label>
        <input type="email" name="mail" id="mail" placeholder="email@Ex.com" value="<?php $_POST["mail"] ?? '' ?>">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <textarea name="message" id="textArea" cols="30" rows="10"><?php $_POST["mail"] ?? 'Message...' ?></textarea>

        <input type="submit" value="Submit">
    </form>
    <?php
        require_once("./function.php");
        
        var_dump($_POST);
        $finalPost = TrimedDataPost($_POST);
        if(is_array($finalPost)){
            if(filter_var($finalPost["mail"], FILTER_VALIDATE_EMAIL)){
                echo "le mail est bon";

                $body = [
                    'Messages' => [
                        [
                        'From' => [
                            'Email' => $finalPost["mail"],
                            'Name' => "Envoyeur du mail"
                        ],
                        'To' => [
                            [
                            'Email' => $finalPost["mail"],
                            'Name' => "Ellyas"
                            ]
                        ],
                        'Subject' => "Greetings from Mailjet.",
                        'HTMLPart' => $finalPost["message"]
                        ]
                    ]
                ];
            }
        }
        
        
         
        $ch = curl_init();
         
        curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json')
        );
        curl_setopt($ch, CURLOPT_USERPWD, "38448c3c0f9cc0c4ebc7add99fe30744:a6b44d33a0a0d10d0d552b3a85504b30");
        $server_output = curl_exec($ch);
        curl_close ($ch);
         
        $response = json_decode($server_output);
        var_dump($response);
        if ($response->Messages[0]->Status == 'success') {
            echo "Email sent successfully.";
        }
    ?>

</body>
</html>