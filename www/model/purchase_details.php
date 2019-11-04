<?php 
require_once 'functions.php';
require_once 'db.php';

function insert_detail($db, $item_id, $history_id, $purchase_price, $purchase_amount){
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
      ':purchase_price' => $purchase_price, ':purchase_stock' => $purchase_amount))
      ;
   }

function get_details($db, $history_id) {
   $sql = "
   SELECT
    items.name,
    purchase_details.purchase_price,
    purchase_details.purchase_amount,
    purchase_details.purchase_price * purchase_details.purchase_amount as subtotal
   FROM
    purchase_details
   JOIN
    items
   ON
    items.item_id = purchase_details.item_id
   WHERE
    purchase_details.history_id = :history_id
    ";
   return fetch_all_query($db, $sql, array(':history_id' => $history_id));
}

