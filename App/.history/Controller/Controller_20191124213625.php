<?php
	namespace App\Controllers;
	
	class Controller
	{
		private $ControllerName;
		private $MethodName;
		private $ArgumentName;

		public function __construct() // explode l'url. Le premier paramètre du tableau url contient le nom du controller, le deuxième la méthode du controller, et le troisième l'argument du controller si il y en a un 
		{
			$url = htmlspecialchars($_GET['url']);
			$url = rtrim($url,'/');
			$url = explode('/',$url);

			$this->ControllerName = $url[0];
			$this->MethodName = $url[1];
			if(!empty($url[2]))
				$this->ArgumentName = $url[2];			
		}

		public function SearchController() // Cherche le controller
		{	 
			$ControllerPath = 'App\Controllers\\'.$this->ControllerName.'Controller.php'; // Enregistre le nom du controller dans $ControllerPath

			if(file_exists($ControllerPath)) // Vérifie si le répertoire du controller existe
			{	
				$objet = substr($ControllerPath,0,-4); //Enlève le '.php'

				if(method_exists($objet, $this->MethodName) AND empty($this->ArgumentName)) // Vérifie si la méthode existe et si il n'y a pas d'argument
				{	
					$ControllerName = 'App\Controllers\\'.$this->ControllerName.'Controller'; // Stocke l'endroit du controller dans $ControllerName
					$ConcernController = new $ControllerName($this->ControllerName, $this->MethodName); // Instancie le controller concerné

					$ControllerMethod = $this->MethodName; // Stocke le nom de la méthode concerné dans $ControllerMethod
					$ConcernController->$ControllerMethod(); // Appelle la méthode concerné
				}

					else if(method_exists($objet, $this->MethodName) AND !empty($this->ArgumentName)) // Vérifie si la méthode existe et si il y a un argument
					{	
						$ControllerName = 'App\Controllers\\'.$this->ControllerName.'Controller'; // Stocke l'endroit du controller dans $ControllerName
						$ConcernController = new $ControllerName($this->$ControllerName, $this->$MethodName, $this->ArgumentName); // Instancie le controller concerné

						$ControllerMethod = $this->MethodName; // Stocke le nom de la méthode concerné dans $ControllerMethod
						$ControllerArgument = $this->ArgumentName; // Stocke le nom de la méthode concerné dans $ControllerArgument

						$ConcernController->$ControllerMethod($ControllerArgument); // Appelle la méthode concerné avec l'argument en paramètre
					}	

						else
							die('erreur, l\'url comporte des paramètres érronés'); // Si l'url n'est pas trouvé, il affiche une erreur, et stop la suite du programme
			}
		}

		protected function Render($File, $Data = array()) // Prend en paramètre le fichier (View), et l'arraye contenant les données
		{
			require $File; // Requiet le fichier View concernée
		}
	}
?>