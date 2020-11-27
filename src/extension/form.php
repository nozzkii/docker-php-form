<?php

class Form
{

    protected $name;
    protected $id;
    public static $numberOfForms = 0;
    protected $formType;

    function __construct($paraName, $paraForm){
        $this->name = $paraName;
        $this->formType = $paraForm;
        $this->id = uniqid('form_id_');
        Form::$numberOfForms++;
        $this->displayForm($this->formType);
    }   

    public function __get($property){
        return " Value of " . $property . " is " . $this->$property; 
    }

    public function __set($args, $value){
        
        switch($args){
            case 'formType':
                $this->formType=$value;
            case 'name':
                $this->name=$value;
            default:
                echo $args . 'not found';
        }
        echo "you have set a value";
    }

    public function displayForm($formType = 'Contact'){ 
        switch($formType){
            case 'contact':
                echo '<form action="received.php" method="POST">
                <div class="form-group">
                <label>First Name *</label>
                <input type="text" name="firstName" required>
                </div>
                <div class="form-group">
                <label>Last Name *</label>
                <input type="text" name="lastName" required>
                </div>
                <div class="form-group" required>
                <label>Age *</label>
                <input type="number" name="age" required>
                </div>
                <div class="form-group">
                <label>EMAIL *</label>
                <input type="email" name="email" required>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="SEND" required>
                </form>';
            break;
            case 'upload':
                echo 'upload form';
            break;
            default:
                echo "nothing found";
        }
    }


    
}   