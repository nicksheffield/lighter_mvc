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
Put controllers in here. Controllers are like a set of related pages. Each page is defined as a method inside the controllers class. The url is specified as website.com/controller/method/param1/param2/etc. 

If no controller is specified, the default_controller is used from the config.php file.

If no method is defined, the index() method is used.