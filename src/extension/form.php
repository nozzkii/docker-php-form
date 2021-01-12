<?php

class Form{
    protected $id, $name, $formType;
    public static $numberOfForms;

    public function __construct($propName, $propFormType){
        $this->id = uniqid('form_id');
        $this->name = $propName;
        $this->formType = $propFormType;
        Form::$numberOfForms++;
        $this->select($this->formType);
    }



    public function select($propType){
        switch($propType){
        case "register":
                echo "
                <form method='POST' name='register' action='received.php'>
                <input name='firstName' type='text' placeholder='Name'>
                <input name='lastName' type='text' placeholder='Nachname'>
                <input name='streetAdress' type='text' placeholder='Adresse'>
                <input name='secondStreetAdress' type='text' placeholder='2 Adresse'> 
                <input name='city' type='text' placeholder='Stadt'>
                <input name='region' type='text' placeholder='Region'>
                <input name='country' type='text' placeholder='Land'>
                <input name='postal' type='text' placeholder='Postanschrift' pattern='\d*' minlength='5' maxlength='5'>
                <input name='userName' type='text' placeholder='Benutzername' required>
                <input type='password' name='password' placeholder='Passwort' pattern='^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$' minlength='' required>
                <input type='submit' name='submitRegister' value='Senden'>
                </form>
                ";
        break;
        case "signIn":
            echo "
            <form method='POST' action='account.php'>
            <input name='userName' type='text' placeholder='Benutzername'>
            <input type='password' name='password' required>
            <input type='submit' name='submit' value='Senden'>
            </form>
            ";
        break;
        default:
        echo "Form not found";
        }
    }
}

?>