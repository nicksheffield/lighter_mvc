#Simple MVC

**A simple implementation of a proper MVC system.**

Below is a rundown on the folders.

---

###public

####index.php
This file does not need to be changed. It can be left completely alone.

####assets/
Put all the normal assets you would use in this folder, whether it be css, images, js, or uploads.

####.htaccess
This file is necessary for routing to any page other than the homepage.

---

###App

####config/config.php
This file contains standard options that may need to be changed for your website, such as database details and models to automatically load.

####config/routes.php
This file contains custom routes.

####controllers/
Put controllers in here.

Controllers are classes that must be named the same as their filename (minus the .php of course). They extend the Controller class.

Controllers are like a set of related pages. Each page is defined as a method inside the controllers class. The url is specified as website.com/controller/method/param1/param2/etc. 

If no controller is specified, the default_controller is used from the config.php file.

If no method is defined, the index() method is used.

Params are optional, and only required if the method asks for it.

####models/
Put models in here.

Models are classes that must be named the same as their filename (minus the .php of course). They extend the Model class.

####errors/
Put php files in here that are included as a complete view.

There is already one for the 404 page.

####libraries/
Put third party libraries in here.

You can autoload them in the `app/config/config.php` or inside a controller like `$this->load->library('library_name')`

####views/
Put views in here. You can add subfolders if needed. Always name them as .php, never as .html.

---

##Example of a Controller

**app/controllers/home.php**

```php
<?php

class Home extends Controller{

	function index(){
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('home_page');
		$this->load->view('footer');
	}

	function login(){
		$data['error'] = '';
		
		if($_POST){
			$this->load->model('user');

			$this->user_model->username = $_POST['username'];
			$this->user_model->password = $_POST['password'];

			if($this->user_model->authenticate()){
				URL::redirect('admin/welcome');
			}else{
				$data['error'] = 'Your username or password is invalid.';
			}
		}

		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('login_form', $data);
		$this->load->view('footer');
	}



}

?>
```

---

##Example of a Model

**app/models/page_model.php**

```php
<?php

class Page_model extends Model{

	# The table properties are required for every model
	protected $table = 'tb_pages';

	# The primary_key and singular properties are optional
	protected $primary_key = 'id';

	# The singular property is used in error messages regarding this model
	protected $singular = 'Page';

	public function load_by_name($name){
		$id = $this->db
			->select('id')
			->from('tb_pages')
			->where(array('title' => $name))
			->get_field('id');

		$this->load($id);
	}

}

?>
```