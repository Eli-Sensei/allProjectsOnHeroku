<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
        
        *{box-sizing: border-box;}
        
        body{
           font-family: 'Nunito', sans-serif;
           background-color: #343434;
           color: seashell;
           margin: 0;
        }

        div{
            height: 50px;
            width: 200px;

            border: 1px solid black;
            
        }
        a{
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
    
    
    <?php

const HEROKU_DIRS = ['.', '..', '.composer', '.heroku', '.profile.d', 'vendor'];
foreach(array_diff(scandir('.', SCANDIR_SORT_ASCENDING), HEROKU_DIRS) as $v):
    if(is_dir($v)) echo '<div><a target="_blank" href="'.$v.'">'.$v.'</a></div>';
endforeach;

?>

</body>
</html>