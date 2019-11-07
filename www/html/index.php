<?php
require_once '../conf/const.php';
require_once '../model/functions.php';
require_once '../model/user.php';
require_once '../model/item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$token = get_csrf_token();

$search_stock = get_get($search_stock);
$search_price = get_get($search_price);

$items = get_open_items($db, $search_stock, $serch_price);

include_once '../view/index_view.php';