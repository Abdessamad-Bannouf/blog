<?php 
    namespace App\Classes\Form;

    class Validate 
    {
        private $Passed;
        private $Errors;
        private $Db;

        public function Check ($Source, $Items = array()) // Prend en paramètre le form, et l'array contenant les vérification comme le min/max/require
        {
            foreach($Items as $Item => $Rules) // Parcourt le tableau (2 dim) pour avoir le nom de chaque array qui représente 1 input chacun
            {
                foreach($Rules as $Rule => $RuleValue) // Parcourt le tableau pour avoir la valeur de chaque input
                {              
                    $Value = $Source[$Item]; // Stocke la valeur dans $Value    $Source[$item] = $_POST[$item];

                    if($Rule === 'Required' AND empty($Value)) // Si l'attribut est égal à Required et que l'input est vide, alors il renvoie une erreur 
                        $this->AddError("{$Item} is required");

                        else if(!empty($Rule)) // Sinon si l'attribut n'est pas vide
                        {   
                            switch($Rule) // Dans le cas où l'attribut 
                            {
                                case 'Min': 
                                    if(strlen($Value) < $RuleValue) // Si la valeur de l'input possède une valeur inférieure à celle proscrite dans la valeur 'Min' de l'array
                                        $this->AddError("{$Item} devrait être de {$RuleValue} caractères minimums"); // Ajoute une erreur
                                break;

                                case 'Max':
                                    if(strlen($Value) > $RuleValue) // Si la valeur de l'input possède une valeur supérieure à celle proscrite dans la valeur 'Min' de l'array
                                        $this->AddError("{$Item} devrait être de {$RuleValue} caractères minimums"); // Ajoute une erreur
                                break;

                                case 'Unique':
                                break;
                            }
                        }


                }
            }
                if(empty($this->Errors)) // SI il n'y a pas d'erreur, $this->Passed == true
                    $this->Passed = true;

            return $this;          
        }

        private function AddError($Errors) // Ajoute une erreur dans le tableau $this-Errors
        {
            $this->Errors[] = $Errors;
        }

        public function Errors() // Retourne les erreurs
        {
            return $this->Errors;
        }

        public function Passed() // Retourne l'attribut $Passed si le formulaire est bien passé
        {
            return $this->Passed;
        }
    }
?>