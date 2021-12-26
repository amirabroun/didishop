<?php
ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);

require_once "database/contodb.php";
require_once "helper/functions.php";
require_once "helper/helper_session.php";
require_once "config/app.php";
require_once "tools/vendor/autoload.php";
require_once "tools/functions/send_sms.php";
require_once "helper/authentication.php";

/*   Inject Models   */
require_once "models/User.php";
require_once "models/Product.php";
require_once "models/Category.php";
require_once "models/Brand.php";
require_once "models/Photo.php";
require_once "models/GuestToken.php";
require_once "models/Cart.php";

/*   Inject Request   */
include "requests/authentication.php";
include "requests/get_data.php";
include "requests/product.php";
include "requests/cart.php";