<?php
	namespace App\Model;

	class Model
	{
		private $Host;
		private $DBName;
		private $UserName;
		private $Password;
		protected $MyConnexion;

		protected function dbConnect()
	    {
			try
			{
				$this->MyConnexion = new \PDO("mysql:host=".Host.";dbname=".DBName.";charset=utf8",UserName,Password);
			}

			catch(\PDOException $e)
			{
				echo 'erreur de connexion à la base'.$e->getMessage();
			}

			return $this->MyConnexion;
		}

		protected function SelectFilter($ColumnsNames = array(),$Table,$filterValues = false)
		{
			$columns = implode(",", $ColumnsNames);

			if($filterValues)
				$Sql = "SELECT ".$columns." FROM ".$Table." WHERE $filterValues";

				else
					$Sql = "SELECT ".$columns." FROM ".$Table."";
			
			$filter = $this->dbConnect()->query($Sql);

			return $filter;
		}

		protected function SelectAll($columnsNames = array(),$table)
		{
			$Sql = "SELECT ".$columnsNames." FROM ".$table;
			$All = $this->dbConnect()->query($Sql);

			return $All;
		}

		protected function Join($table,$alias1,$tableJoin,$aliasJoin,$id,$idJoin)
		{
			$Sql = "SELECT * FROM ".$table." AS ".$alias1." JOIN ".$tableJoin." AS ".$aliasJoin." ON ".$alias1.".".$id."=".$aliasJoin.".".$idJoin. " WHERE ".$alias1.".".$id."=".$tableJoin."";
			$Join = $this->dbConnect($Sql);
			
			return $Join; 
		}

		protected function RequestInsert($table,$columnsNames = array(),$columnsValues = array())
		{			
			$values = "'";
			$columns = implode(",", $columnsNames);
			$values .= implode("','", $columnsValues);
			$values .= "'";

			$Sql = 'INSERT INTO '.$table.' ('.$columns.') VALUES('.$values.')';

			$add = $this->dbConnect()->prepare($Sql);

			for($i=0;$i<count($columnsNames);$i++)
			{
				$add->bindValue(':'.$columnsNames[$i],$columnsValues[$i],\PDO::PARAM_STR);
			}
			
			$this->RequestExecute($add);
			
			return $add;
		}

		protected function RequestDelete($table,$columnName,$columnValue) 
		{

			$Sql = 'DELETE FROM '.$table.' WHERE '.$columnName.'= :'.$columnName.'';

			$delete = $this->dbConnect()->prepare($Sql);
			$delete->bindValue(':'.$columnName,$columnValue,\PDO::PARAM_INT);

			$this->RequestExecute($delete);

			return $delete;		
		}

		protected function RequestModify($table,$columnsNames = array(),$columnsValues = array(),$filterColumn, $filterValue)
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

			$Sql = 'UPDATE '.$table.' SET '.$setValuesNames.' WHERE '.$filterColumn.' = :'.$filterColumn.'';		

			$modify = $this->dbConnect()->prepare($Sql);

			for($i=0;$i<count($columnsNames);$i++)
			{
				$modify->bindValue(':'.$columnsNames[$i],$columnsValues[$i],\PDO::PARAM_STR);				
			}

			$modify->bindValue(':'.$filterColumn,$filterValue,\PDO::PARAM_INT);

			$this->RequestExecute($modify);

			return $modify;
		}

		protected function RequestExecute($SQLRequest)
		{			
			$RequestExecute = $SQLRequest->execute();
		}
	}
?>