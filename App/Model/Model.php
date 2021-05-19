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

		protected function SelectFilter($ColumnsNames = array(),$Table,$FilterColumn = array(), $FilterValue = array())
		{
			$Columns = implode(",", $ColumnsNames);

			for($i=0; $i<count($FilterColumn); $i++){
				$Sql = "SELECT ".$Columns." FROM ".$Table." WHERE ".$FilterColumn."='$FilterValue'";
			}
			
			$Filter = $this->dbConnect()->query($Sql);

			return $Filter;
		}

		protected function SelectAll($ColumnsNames = array(),$Table)
		{
			$Sql = "SELECT".$ColumnsNames."FROM".$Table;
			$All = $this->dbConnect($Sql);

			return $All;
		}

		protected function Join($table,$Alias1,$TableJoin,$AliasJoin,$id,$IdJoin)
		{
			$Sql = "SELECT * FROM ".$table." AS ".$Alias1." JOIN ".$TableJoin." AS ".$AliasJoin." ON ".$Alias1.".".$id."=".$AliasJoin.".".$IdJoin. " WHERE ".$Alias1.".".$id."=".$TableJoin."";
			$Join = $this->dbConnect($Sql);
			
			return $Join; 
		}

		protected function RequestInsert($table,$ColumnsNames = array(),$ColumnsValues = array())
		{			
			$Values = "'";
			$Columns = implode(",", $ColumnsNames);
			$Values .= implode("','", $ColumnsValues);
			$Values .= "'";

			$Sql = 'INSERT INTO '.$table.' ('.$Columns.') VALUES('.$Values.')';

			$add = $this->dbConnect()->prepare($Sql);

			for($i=0;$i<count($ColumnsNames);$i++)
			{
				$ValueBind[$i] = ":";
				$ValueBind[$i] .= $ColumnsValues[$i];

				$add->bindValue($ValueBind[$i],$ColumnsNames[$i],\PDO::PARAM_STR);
				
			}
			
			$this->RequestExecute($add);
			
			return true;
		}

		protected function RequestDelete($table,$ColumnName,$ColumnValue) 
		{

			$Sql = 'DELETE FROM '.$table.' WHERE '.$ColumnName.'=:'.$ColumnName.'';

			$Delete = $this->dbConnect()->prepare($Sql);
			$Delete->bindValue($ColumnName,$ColumnValue,\PDO::PARAM_INT);

			return $Delete;		
		}

		protected function RequestModify($table,$ColumnsNames = array(),$ColumnsValues = array(),$DatasModify = array())
		{
			for($i=0;$i<count($ColumnsNames);$i++)
			{
				$Sql = 'UPDATE '.$table.' SET '.$ColumnsNames[$i].'="'.$DatasModify[$i].'" WHERE '.$ColumnsNames[0].'="'.$DatasModify[0].'"';
				$Modify[$i] = $this->dbConnect()->prepare($Sql);
				$Modify[$i]->bindValue($ColumnsNames[$i],$ColumnsValues[$i],\PDO::PARAM_INT);
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