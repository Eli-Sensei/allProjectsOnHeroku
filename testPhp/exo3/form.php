<?php

class Form  
{
    public function __construct()
    {
        $this->beginForm();
    }

    ///////////////////////////////////// geteur seteur ////////////////////////////////////////

    public function getForm()
    {
        return $this->beginForm() . $this->setText() . $this->setText() . $this->setSubmit() . $this->endForm();
    }

    /////////////////////////////////////// méthodes /////////////////////////////////////////////

    public function beginForm()
    {
        echo '
            <form>
                <fieldset style="display: flex; flex-direction: column;">
        ';
    }

    public function setText($color = "white")
    {
        echo '
            <textarea cols="30" rows="10"  style="background-color: ' . $color . ';"></textarea>
        ';
    }

    public function setSubmit()
    {
        echo '
            <input type="submit" value="Submit">
        ';
    }

    public function endForm()
    {
        echo '
                </fieldset>
            </form>
        ';
    }

    public function finishForm()
    {
        $this->setText();
        $this->setText();
        $this->setSubmit();
        $this->endForm();
    }

}




class Form2 extends Form
{

    private $color;
    public function __construct($color = "white")
    {

        parent::__construct();
        $this->color = $color;
    }

    // méthodes

    public function setRadio()
    {
        echo '<input type="radio">';
    }
    public function setCheckbox()
    {
        echo '<input type="checkbox">';
    }

    public function finishFormWithRadioAndCheckbox()
    {
        $this->setText($this->color);
        $this->setText($this->color);
        $this->setRadio();
        $this->setCheckbox();
        $this->setSubmit();
        $this->endForm();
    }

    public function funct()
    {
        function funct2()
        {
            echo "prout <br>";

            function funct3()
            {
                echo "pet <br>";
            }
        }
    }
}


