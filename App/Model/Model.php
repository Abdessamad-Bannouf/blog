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

		protected function selectFilter($ColumnsNames = array(),$Table,$filterValues = false)
		{
			$columns = implode(",", $ColumnsNames);

			if($filterValues)
				$sql = "SELECT ".$columns." FROM ".$Table." WHERE '$filterValues'";

				else
					$sql = "SELECT ".$columns." FROM ".$Table."";
			
			$filter = $this->dbConnect()->query($sql);


			return $filter;
		}

		protected function selectAll($columnsNames = array(),$table)
		{
			$sql = "SELECT".$columnsNames."FROM".$table;
			$all = $this->dbConnect($sql);

			return $all;
		}

		protected function join($table,$alias1,$tableJoin,$aliasJoin,$id,$idJoin)
		{
			$sql = "SELECT * FROM ".$table." AS ".$alias1." JOIN ".$tableJoin." AS ".$aliasJoin." ON ".$alias1.".".$id."=".$aliasJoin.".".$idJoin. " WHERE ".$alias1.".".$id."=".$tableJoin."";
			$join = $this->dbConnect($sql);
			
			return $join; 
		}

		protected function requestInsert($table,$columnsNames = array(),$columnsValues = array())
		{			
			$values = "'";
			$columns = implode(",", $columnsNames);
			$values .= implode("','", $columnsValues);
			$values .= "'";

			$Sql = 'INSERT INTO '.$table.' ('.$columns.') VALUES('.$values.')';

			$add = $this->dbConnect()->prepare($Sql);

			for($i=0;$i<count($columnsNames);$i++)
			{
				$valueBind[$i] = ":";
				$valueBind[$i] .= $columnsValues[$i];

				$add->bindValue($valueBind[$i],$columnsNames[$i],\PDO::PARAM_STR);
				
			}
			
			$this->requestExecute($add);
			
			return true;
		}

		protected function requestDelete($table,$columnName,$columnValue) 
		{

			$sql = 'DELETE FROM '.$table.' WHERE '.$columnName.'=:'.$columnName.'';

			$delete = $this->dbConnect()->prepare($sql);
			$delete->bindValue($columnName,$columnValue,\PDO::PARAM_INT);

			$this->requestExecute($delete);

			return $delete;		
		}

		protected function requestModify($table,$columnsNames = array(),$columnsValues = array(),$datasModify = array())
		{
			for($i=0;$i<count($columnsNames);$i++)
			{
				$qql = 'UPDATE '.$table.' SET '.$columnsNames[$i].'="'.$datasModify[$i].'" WHERE '.$columnsNames[0].'="'.$datasModify[0].'"';
				$modify[$i] = $this->dbConnect()->prepare($qql);
				$modify[$i]->bindValue($columnsNames[$i],$columnsValues[$i],\PDO::PARAM_INT);
			}

			$this->requestExecute($modify);

			return $modify;
		}

		protected function requestExecute($SQLRequest)
		{	
			/* POUR LA REQUEST MODIFY */
			if(is_array($SQLRequest))
			{
				for($i=0;$i<count($SQLRequest);$i++)
				{ 
					$requestExecute = $SQLRequest[$i]->execute();
				}
			}

				else
					$requestExecute = $SQLRequest->execute();
		}
	}
?>