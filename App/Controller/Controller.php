<?php
	namespace App\Controller;  
	
	class Controller
	{
		private $controllerName;
		private $methodName;
		private $argumentName;

		public function __construct() // explode l'url. Le premier paramètre du tableau url contient le nom du controller, le deuxième la méthode du controller, et le troisième l'argument du controller si il y en a un 
		{
			$url = htmlspecialchars($_GET['url']);
			$url = rtrim($url,'/');
			$url = explode('/',$url);

			$this->controllerName = $url[0];
			$this->methodName = $url[1];
			if(!empty($url[2]))
				$this->argumentName = $url[2];
		}

		public function searchController(){ // Cherche le controller
 
			$controllerPath = 'App\Controller\\'.$this->controllerName.'Controller.php'; // Enregistre le nom du controller dans $ControllerPath

			if(file_exists($controllerPath)){ // Vérifie si le répertoire du controller existe
				$objet = substr($controllerPath,0,-4); //Enlève le '.php'

				if(method_exists($objet, $this->methodName) AND empty($this->argumentName)){ // Vérifie si la méthode existe et si il n'y a pas d'argument
					$controllerName = 'App\Controller\\'.$this->controllerName.'Controller'; // Stocke l'endroit du controller dans $ControllerName
					$concernController = new $controllerName($this->controllerName, $this->argumentName); // Instancie le controller concerné
 
					$controllerMethod = $this->methodName; // Stocke le nom de la méthode concerné dans $ControllerMethod
					$concernController->$controllerMethod(); // Appelle la méthode concerné
				}

					else if(method_exists($objet, $this->methodName) AND !empty($this->argumentName)){ // Vérifie si la méthode existe et si il y a un argument
						
						$controllerName = 'App\Controller\\'.$this->controllerName.'Controller'; // Stocke l'endroit du controller dans $ControllerName
						$concernController = new $controllerName($this->controllerName, $this->MethodName, $this->ArgumentName); // Instancie le controller concerné

						$controllerMethod = $this->MethodName; // Stocke le nom de la méthode concerné dans $ControllerMethod
						$controllerArgument = $this->ArgumentName; // Stocke le nom de la méthode concerné dans $ControllerArgument

						$concernController->$controllerMethod($controllerArgument); // Appelle la méthode concerné avec l'argument en paramètre
					}	

						else
							die('erreur, l\'url comporte des paramètres érronés'); // Si l'url n'est pas trouvé, il affiche une erreur, et stop la suite du programme
			}
		}

		protected function render($file, $data = array()){ // Prend en paramètre le fichier (View), et l'arraye contenant les données
			require $file; // Requiet le fichier View concernée
		} 
	}
?>