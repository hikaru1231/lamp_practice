<?php 
require_once 'functions.php';
require_once 'db.php';

function purchase_carts($db, $carts){
    if(validate_cart_purchase($carts) === false){
      return false;
    }
    foreach($carts as $cart){
      if(update_item_stock(
          $db, 
          $cart['item_id'], 
          $cart['stock'] - $cart['amount']
        ) === false){
        set_error($cart['name'] . 'の購入に失敗しました。');
      }
    }
    $sql = "
    INSET INTO
     purhase_histories(
         history_id,
         user_id
         )
        VALUES(:history_id, :user_id);
     ";
     return execute_query($db, $sql, array(':history_id' => $history_id, ':user_id' => $user_id))
  ;
    delete_user_carts($db, $carts[0]['user_id']);
  }