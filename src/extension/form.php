<?php

class Form{
    protected $id, $name, $formType, $message;
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
                <div id='register' class='container border border-dark'>
                <h2 class='bg-success text-white shadow-sm'>1. Registrierung</h2>
                <form method='POST' name='register' action='javascript:register()'>
            
                
                <input class='w-100 d-inline-block form-control mt-1' name='firstName' type='text' placeholder='Name' autofocus>
                <input class='w-100 d-inline-block form-control mt-1'  name='lastName' type='text' placeholder='Nachname'>
  
                <input class='form-control mt-1' name='streetAdress' type='text' placeholder='Adresse'>
                <input class='form-control mt-1' name='secondStreetAdress' type='text' placeholder='2 Adresse'> 
              
                <div class='row'>
                <div class='col-sm mt-1'>
                <input class='form-control' name='postal' type='text' placeholder='Postanschrift' pattern='\d*' minlength='5' maxlength='5'>
                </div>
                <div class='col-sm mt-1'>
                <input class='form-control' name='city' type='text' placeholder='Stadt'>
                </div>
                </div>
                <div class='row'>
                <div class='col-sm  mt-1'>
                <input class='form-control' name='region' type='text' placeholder='Region'>
                </div>
                <div class='col-sm  mt-1'>
                <input class='form-control' name='country' type='text' placeholder='Land'>
                </div>
                </div>


                <input class='form-control mt-1' name='userName' type='text' placeholder='Benutzername' required>
                <input class='form-control mt-1' type='password' name='password' placeholder='Passwort' pattern='^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[#?!@$%^&*-]).{8,}$' title='Mindestens 8 Zeichen: 1 x Großschreibung & 1 x Spezialcharakter'required>"
                . $_SESSION["Message"] ."<input class=' btn btn-primary mt-4' type='submit' name='submitRegister' value='Senden'>
                </div>
                </form>
                </div>
                ";
        break;
        case "signIn":
            echo "
            <div id='login' class='container border border-dark'>
            <h2 class='bg-success text-white'> Login</h2>
            <form method='POST' name='login' action='javascript:login()'>
            <div class='row mt-1'>
            <input class='form-control mt-1' name='userName' type='text' placeholder='Benutzername' autofocus>
            <input class='form-control mt-1' type='password' name='password' placeholder='Passwort' required>
            </div>"
            . $_SESSION["Message"] ."
            <input class='btn btn-primary mt-4' type='submit' name='signIn' value='Senden'>
            </form>
            </div>
            ";
        break;
        default:
        echo "Form not found";
        }
    }
}
?>