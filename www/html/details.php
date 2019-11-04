<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'purchase_histories.php';
require_once MODEL_PATH . 'purchase_details.php';


session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$history_id = get_get('history_id');

$details = get_details($db, $history_id);
$history = get_history($db, $history_id);


include_once '../view/purchase_details_view.php';