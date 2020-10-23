<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Zone</title>
</head>
<body>
    <h1>Time Zone</h1>
    <?php
    function select_Timezone($selected = '') {
        $OptionsArray = timezone_identifiers_list();
        foreach($OptionsArray as $v){
            date_default_timezone_set($v);
            $tz [strstr($v, "/", true)][strstr($v, "/")] = "<h2>" . date('l jS \of F Y h:i:s A')  ."</h2>";
        }
        var_dump($tz);
        $select= '<select name="SelectContacts">';

        return $select;
    }

    echo select_Timezone() . '<br>';
    ?>
</body>
</html>