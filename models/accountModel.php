<?php  

	class accountModel extends AppModel
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT * FROM accounts");
			$query->execute();
			$items = $query->fetchall();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}

		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO accounts (user_id,name) VALUES (:user_id,:name)");

			$defaultID = "1";
			$query->bindParam(":user_id",$defaultID);
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE accounts SET name=:name WHERE id=:id");
			$query->bindParam(":id",$data['id']);
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM accounts WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}

		
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM accounts WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}
	}
?>