<?php 
require_once 'functions.php';
require_once 'db.php';

function insert_detail($db, $item_id, $history_id, $purchase_price, $purchase_stock){
   $sql = "
   INSERT INTO
     purchase_details(
        item_id,
        history_id,
        purchase_price,
        purchase_stock
        )
        VALUES(:item_id, :history_id, :purchase_price, :purchase_stock);
        ";
      return execute_query($db, $sql, array(':item_id' => $item_id, ':history_id' => $history_id, 
      ':purchase_price' => $purchase_price, ':purchase_stock' => $purchsase_stock))
      ;
   }