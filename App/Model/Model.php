<?php
	namespace App\Model;

	class Model
	{
		private $host;
		private $dbName;
		private $userName;
		private $password;
		protected $myConnexion;

		protected function dbConnect()
	    {
			try
			{
				$this->myConnexion = new \PDO("mysql:host=".Host.";dbname=".DBName.";charset=utf8",UserName,Password);
			}

			catch(\PDOException $e)
			{
				echo 'erreur de connexion à la base'.$e->getMessage();
			}

			return $this->myConnexion;
		}

		protected function selectFilter($columnsNames = array(),$Table,$filterValues = false)
		{
			$columns = implode(",", $columnsNames);

			if($filterValues)
				$sql = "SELECT ".$columns." FROM ".$Table." WHERE $filterValues";

				else
					$sql = "SELECT ".$columns." FROM ".$Table."";
			
			$filter = $this->dbConnect()->query($sql);

			return $filter;
		}

		protected function selectAll($columnsNames = array(),$table)
		{
			$sql = "SELECT ".$columnsNames." FROM ".$table;
			$all = $this->dbConnect()->query($sql);
      
			return $all;
		}

		protected function join($table,$alias1,$tableJoin,$aliasJoin,$id,$idJoin)
		{
			$sql = "SELECT * FROM ".$table." AS ".$alias1." JOIN ".$tableJoin." AS ".$aliasJoin." ON ".$alias1.".".$id."=".$aliasJoin.".".$idJoin. " WHERE ".$alias1.".".$id."=".$aliasJoin.".".$idJoin."";
			var_dump($sql);
			$join = $this->dbConnect()->query($sql);
			
			return $join; 
		}

		protected function requestInsert($table,$columnsNames = array(),$columnsValues = array())
		{			
			$values = "'";
			$columns = implode(",", $columnsNames);
			$values .= implode("','", $columnsValues);
			$values .= "'";

			$sql = 'INSERT INTO '.$table.' ('.$columns.') VALUES('.$values.')';

			$add = $this->dbConnect()->prepare($sql);

			for($i=0;$i<count($columnsNames);$i++)
			{
				$add->bindValue(':'.$columnsNames[$i],$columnsValues[$i],\PDO::PARAM_STR);
			}
			
			$this->requestExecute($add);
			
			return $add;
		}

		protected function requestDelete($table,$columnName,$columnValue) 
		{

			$sql = 'DELETE FROM '.$table.' WHERE '.$columnName.'= :'.$columnName.'';

			$delete = $this->dbConnect()->prepare($sql);
			$delete->bindValue(':'.$columnName,$columnValue,\PDO::PARAM_INT);

			$this->requestExecute($delete);

			return $delete;		
		}

		protected function requestModify($table,$columnsNames = array(),$columnsValues = array(),$filterColumn, $filterValue)
		{
			$setValuesNames = "";
			
			for($i=0;$i<count($columnsNames);$i++)
			{
				if($i == count($columnsNames)-1){
					$setValuesNames = $setValuesNames.$columnsNames[$i].' = :'.$columnsNames[$i].'';
					break;
				}

				$setValuesNames = $setValuesNames.$columnsNames[$i].' = :'.$columnsNames[$i].', ';
			}

			$sql = 'UPDATE '.$table.' SET '.$setValuesNames.' WHERE '.$filterColumn.' = :'.$filterColumn.'';		

			$modify = $this->dbConnect()->prepare($sql);

			for($i=0;$i<count($columnsNames);$i++)
			{
				$modify->bindValue(':'.$columnsNames[$i],$columnsValues[$i],\PDO::PARAM_STR);				
			}

			$modify->bindValue(':'.$filterColumn,$filterValue,\PDO::PARAM_INT);

			$this->requestExecute($modify);

			return $modify;
		}

		protected function requestExecute($SQLRequest)
		{			
			$RequestExecute = $SQLRequest->execute();
		}
	}
?>