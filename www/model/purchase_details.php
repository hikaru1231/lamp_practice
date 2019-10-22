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
     purhase_details(
         detail_id,
         item_id,
         history_id,
         purchase_price,
         purchase_stock
         )
        VALUES(:detail_id, :item_id, :history_id, :purchase_price, :purchase_stock);
     ";
     return execute_query($db, $sql, array(':detail_id' => $detail_id, ':item_id' => $item_id, ':history_id' => $history_id, 
  ':purchase_price' => $purchase_price, ':purchase_stock' => $purchsase_stock))
  ;
    delete_user_carts($db, $carts[0]['user_id']);
  }