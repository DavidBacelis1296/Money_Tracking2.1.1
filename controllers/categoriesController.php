<?php  
	class categoriesController extends AppController
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$category = $this->loadModel("category");
			$this->_view->categories = $category->GetAll();
			$this->_view->titulo="Categorias";
			$this->_view->renderizar("index");
		}

		
		public function add()
		{
			if($_POST)
			{
				$modelCategory = $this->loadModel("category");
				$modelCategory->add($_POST);
				$this->redirect(array("controller"=>"categories"));
			}
			$this->_view->titulo="Nueva Categoria";
			$this->_view->renderizar("add");
		}
		public function update($id=null)
		{
			if($_POST)
			{
				$modelCategory = $this->loadModel("category");
				$modelCategory->Update($_POST);
				$this->redirect(array("controller"=>"categories"));
			}
			$modelCategory = $this->loadModel("category");
			$this->_view->category=$modelCategory->Find($id);
			$this->_view->titulo="Actualizar Categoria";
			$this->_view->renderizar("update");
		}

		public function delete($id=null)
		{
			$modelCategory = $this->loadModel("category");
			$category=$modelCategory->Find($id);

			if($category)
			{
				$modelCategory->Delete($id);
				$this->redirect(array("controller"=>"categories"));
			}
		}
	}
?>