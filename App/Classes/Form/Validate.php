<?php 
namespace App\Classes\Form;

class Validate 
{
    private $passed;

    private $errors = null;

    public function check($source, $items = array()) // Prend en paramètre le form, et l'array contenant les vérification comme le min/max/require
    {
        foreach($items as $item => $rules) // Parcourt le tableau (2 dim) pour avoir le nom de chaque array qui représente 1 input chacun
        {
            foreach($rules as $rule => $ruleValue) // Parcourt le tableau pour avoir la valeur de chaque input
            {              
                $value = $source[$item]; // Stocke la valeur dans $Value    $Source[$item] = $_POST[$item];

                if($rule === 'Required' AND empty($value)) // Si l'attribut est égal à Required et que l'input est vide, alors il renvoie une erreur 
                    $this->addError("{$item} is required");

                    else if(!empty($rule)) // Sinon si l'attribut n'est pas vide
                    {   
                        switch($rule) // Dans le cas où l'attribut 
                        {
                            case 'min': 
                                if(strlen($value) < $ruleValue) // Si la valeur de l'input possède une valeur inférieure à celle proscrite dans la valeur 'Min' de l'array
                                    $this->addError("{$item} devrait être de {$ruleValue} caractères minimums".PHP_EOL); // Ajoute une erreur
                            break;

                            case 'max':
                                if(strlen($value) > $ruleValue) // Si la valeur de l'input possède une valeur supérieure à celle proscrite dans la valeur 'Min' de l'array
                                    $this->addError("{$item} devrait être de {$ruleValue} caractères maximums".PHP_EOL); // Ajoute une erreur
                            break;

                            case 'unique':
                            break;
                        }
                    }
            }
        }
            if(empty($this->errors)) // SI il n'y a pas d'erreur, $this->Passed == true
                $this->passed = true;

        return $this;          
    }

    private function addError($errors) // Ajoute une erreur dans le tableau $this-Errors
    {
        $this->errors[] = $errors;
    }

    public function errors() // Retourne les erreurs
    {
        return $this->errors;
    }

    public function passed() // Retourne l'attribut $Passed si le formulaire est bien passé
    {
        return $this->passed;
    }
}
?>