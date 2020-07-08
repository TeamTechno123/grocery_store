<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Website';
$route['404_override'] = 'Notpage';
$route['Login'] = 'Website/login';

$route['Employee'] = 'User';
$route['Employee'] = 'User';
$route['Resellor'] = 'User';
$route['Sales-Executive'] = 'User';
$route['Cash-Employee'] = 'User';
$route['Delivery-Boy'] = 'User';

$route['Signup'] = 'Website/signup';
$route['OTP-Signup'] = 'Website/otp_signup';

$route['Forgot-Password'] = 'Website/otp';
$route['Category/(:any)/(:any)'] = 'Website/grocery_list_by_category/$1/$1';
$route['Brand-List/(:any)/(:any)'] = 'Website/brand_list_by_category/$1/$1';
$route['Brand/(:any)/(:any)/(:any)'] = 'Website/grocery_list_by_brand_category/$1/$1/$1';
$route['Brand/(:any)/(:any)'] = 'Website/grocery_list_by_brand/$1/$1';
$route['Product-Details/(:any)/(:any)'] = 'Website/product_details/$1/$1';
$route['Cart'] = 'Website/cart';
$route['Checkout'] = 'Website/checkout';
$route['Profile'] = 'Website/profile';
$route['Edit-Profile'] = 'Website/edit_profile';
$route['Edit-Address'] = 'Website/edit_address';
$route['Edit-Delivery-Address/(:any)'] = 'Website/edit_delivery_address/$1';
$route['Wishlist'] = 'Website/wishlist';

$route['My-Orders'] = 'Website/my_orders';
$route['Order-Details/(:any)'] = 'Website/order_details/$1';
$route['Order-Tracking/(:any)'] = 'Website/order_tracking/$1';
$route['Order-Print/(:any)'] = 'Website/order_print/$1';

$route['My-Membership'] = 'Website/my_membership';
$route['KB-Membership'] = 'Website/join_membership';
$route['KB-Membership-Details/(:any)'] = 'Website/membership_details/$1';
$route['KB-Membership-Payment/(:any)'] = 'Website/membership_payment/$1';


$route['My-Wallet'] = 'Website/wallet';
$route['Add-Wallet'] = 'Website/add_wallet';
$route['Wallet-Payment'] = 'Website/wallet_payment';
$route['Wallet-Success'] = 'Payment/wallet_paym_succ_msg';


$route['My-Gift-Card'] = 'Website/gift_card';

$route['Cookbook-Contest'] = 'Website/cookbook';
$route['Cookbook-Contest-Register'] = 'Website/cookbook_reg';

$route['Offers'] = 'Website/offers_page';
$route['KBC'] = 'Website/kbc_club';
$route['Become-Reseller'] = 'Website/reseller_page';
$route['Web-Login'] = 'Website/login';
$route['Shop-By-Brand'] = 'Website/shop_by_brand';
$route['Search-Result/(:any)'] = 'Website/search_result2/$1';
$route['Shop-By-Brand'] = 'Website/shop_by_brand';
$route['About-kiranabhara'] = 'Website/who';
$route['Our-System'] = 'Website/our_system';
$route['How-To-Place-Order'] = 'Website/place_order';
$route['Privacy-Policy'] = 'Website/privacy';
$route['Return-Exchange'] = 'Website/return';
$route['Terms-Condition'] = 'Website/terms';
$route['Coupon-Discount-Offers'] = 'Website/coupon';
$route['Payment-Delivery'] = 'Website/payment';
$route['Cancellation-Policy'] = 'Website/cancellation';
$route['Our-Team'] = 'Website/team';
$route['Gallery'] = 'Website/gallery';
$route['Contact-us'] = 'Website/contact';
$route['Request-Product'] = 'Website/request_product';

$route['Membership-Success'] = 'Payment/mem_paym_succ_msg';


$route['translate_uri_dashes'] = FALSE;
