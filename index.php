<?php

const HEROKU_DIRS = ['.', '..', '.composer', '.heroku', '.profile.d', 'vendor'];
 foreach(array_diff(scandir('.', SCANDIR_SORT_ASCENDING), HEROKU_DIRS) as $v):
    if(is_dir($v)) echo '<br><a target="_blank" href="'.$v.'">'.$v.'</a>';
 endforeach;
