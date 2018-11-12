<?php  
	class accountsController extends AppController
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$modelAccount = $this->loadModel("account");
			$this->_view->accounts = $modelAccount->GetAll();
			$this->_view->titulo="Cuentas";
			$this->_view->renderizar("index");
		}
		public function add()
		{
			if($_POST)
			{
				$modelAccount = $this->loadModel("account");
				$modelAccount->add($_POST);
				$this->redirect(array("controller"=>"accounts"));
			}
			$this->_view->titulo="Nueva Cuenta";
			$this->_view->renderizar("add");
		}

		public function update($id=null)
		{
			if($_POST)
			{
				$modelAccount = $this->loadModel("account");
				$modelAccount->Update($_POST);
				$this->redirect(array("controller"=>"accounts"));
			}

			$modelAccount = $this->loadModel("account");
			$this->_view->account = $modelAccount->Find($id);
			$this->_view->titulo="Nueva Cuenta";
			$this->_view->renderizar("update");	
		}
		public function delete($id=null)
		{
			$modelAccount = $this->loadModel("account");
			$account = $modelAccount->Find($id);
			if($id)
			{
				$modelAccount->Delete($id);
				$this->redirect(array("controller"=>"accounts"));
			}
		}
	}
?>