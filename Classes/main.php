<?php

/* Includes */

require_once "Classes/config.php";
require_once "Classes/connect.php";
require_once "Classes/functions.php";
require_once "Classes/Models/calculation.model.php";
require_once "Classes/Models/category.model.php";
require_once "Classes/Models/item.model.php";
require_once "Classes/Models/customer.model.php";
require_once "Classes/Controllers/pages.controller.php";
require_once "Classes/Controllers/calculation.controller.php";
require_once "Classes/Controllers/category.controller.php";
require_once "Classes/Controllers/item.controller.php";
require_once "Classes/Controllers/customer.controller.php";


// Caching

header('Cache-Control: max-age=3600, public');
header('Pragma: cache');
header("Last-Modified: ".gmdate("D, d M Y H:i:s",time())." GMT");
header("Expires: ".gmdate("D, d M Y H:i:s",time()+3600)." GMT");
