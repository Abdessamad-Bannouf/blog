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

		protected function SelectFilter($ColumnsNames = array(),$Table,$filterColumns = array(), $FilterValues = array())
		{
			$columns = implode(",", $ColumnsNames);
			$columnsFilterColumn = implode(",", $filterColumns);
			$columnsFilterValue = implode(",",$FilterValues);

			for($i=0; $i<count($filterColumns); $i++){
				$Sql = "SELECT ".$columns." FROM ".$Table." WHERE ".$columnsFilterColumn."='$columnsFilterValue'";
			}
			
			$filter = $this->dbConnect()->query($Sql);

			return $filter;
		}

		protected function SelectAll($columnsNames = array(),$table)
		{
			$Sql = "SELECT".$columnsNames."FROM".$table;
			$All = $this->dbConnect($Sql);

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
			$Values = "'";
			$Columns = implode(",", $columnsNames);
			$Values .= implode("','", $columnsNames);
			$Values .= "'";

			$Sql = 'INSERT INTO '.$table.' ('.$Columns.') VALUES('.$Values.')';

			$add = $this->dbConnect()->prepare($Sql);

			for($i=0;$i<count($columnsNames);$i++)
			{
				$valueBind[$i] = ":";
				$valueBind[$i] .= $columnsValues[$i];

				$add->bindValue($valueBind[$i],$columnsNames[$i],\PDO::PARAM_STR);
				
			}
			
			$this->RequestExecute($add);
			
			return true;
		}

		protected function RequestDelete($table,$columnName,$columnValue) 
		{

			$Sql = 'DELETE FROM '.$table.' WHERE '.$columnName.'=:'.$columnName.'';

			$Delete = $this->dbConnect()->prepare($Sql);
			$Delete->bindValue($columnName,$columnValue,\PDO::PARAM_INT);

			return $Delete;		
		}

		protected function RequestModify($table,$columnsNames = array(),$columnsValues = array(),$datasModify = array())
		{
			for($i=0;$i<count($columnsNames);$i++)
			{
				$Sql = 'UPDATE '.$table.' SET '.$columnsNames[$i].'="'.$datasModify[$i].'" WHERE '.$columnsNames[0].'="'.$datasModify[0].'"';
				$Modify[$i] = $this->dbConnect()->prepare($Sql);
				$Modify[$i]->bindValue($columnsNames[$i],$columnsValues[$i],\PDO::PARAM_INT);
			}

			return $Modify;
		}

		protected function RequestExecute($SQLRequest)
		{	
			/* POUR LA REQUEST MODIFY */
			if(is_array($SQLRequest))
			{
				for($i=0;$i<count($SQLRequest);$i++)
				{ 
					$RequestExecute = $SQLRequest[$i]->execute();
				}
			}

				else
					$RequestExecute = $SQLRequest->execute();
		}
	}
?>