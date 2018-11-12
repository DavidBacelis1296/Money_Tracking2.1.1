<?php  
	class transactionModel extends AppModel
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT t.*,a.name AS nameaccount,c.name AS namecategory FROM transactions t INNER JOIN accounts a ON a.id=t.account_id INNER JOIN categories c ON c.id=t.category_id");
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
			$query = $this->_db->prepare("INSERT INTO transactions (account_id,category_id,description,date,amount) VALUES (:account_id,:category_id,:description,:date,:amount)");
			
			$query->bindParam(":account_id",$data['id_account']);
			$query->bindParam(":category_id",$data['id_category']);
			$query->bindParam(":description",$data['description']);
			$query->bindParam(":date",$data['date']);
			$query->bindParam(":amount",$data['amount']);

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
			$query = $this->_db->prepare("UPDATE transactions SET account_id=:account_id,category_id=:category_id,description=:description,date=:date,amount=:amount WHERE id=:id");
			
			$query->bindParam(":id",$data['id']);
			$query->bindParam(":account_id",$data['id_account']);
			$query->bindParam(":category_id",$data['id_category']);
			$query->bindParam(":description",$data['description']);
			$query->bindParam(":date",$data['date']);
			$query->bindParam(":amount",$data['amount']);

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
			$query = $this->_db->prepare("SELECT * FROM transactions WHERE id=:id");
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
			$query = $this->_db->prepare("DELETE FROM transactions WHERE id=:id");
			
			$query->bindParam(":id",$id);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
?>