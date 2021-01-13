<?php

echo "
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');

    *{box-sizing: border-box;}

    body{
    font-family: 'Nunito', sans-serif;
    background-color: #343434;
    color: seashell;
    margin: 0;
    }
</style>
";

require_once './form.php';

$form = new Form();
$form->finishForm();

// echo $form->getForm();
$form2 = new Form2();
$form2->finishFormWithRadioAndCheckbox();

$form3 = new Form2("violet");
$form3->finishFormWithRadioAndCheckbox();

$form3->funct->funct2();

$functi = function (){
    echo 'HAHA <br>';
}


?>
