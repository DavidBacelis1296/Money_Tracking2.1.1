<?php  
	class categoryModel extends AppModel
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT * FROM categories ");
			$query->execute();
			$items = $query->fetchall();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO categories (name) VALUES (:name )");			
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
			$query = $this->_db->prepare("UPDATE categories SET name=:name WHERE id=:id");		

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
			$query = $this->_db->prepare("SELECT * FROM categories WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}

	
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM categories WHERE id=:id");		

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