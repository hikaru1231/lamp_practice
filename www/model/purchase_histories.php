<?php
require_once 'functions.php';
require_once 'db.php';

function insert_histories($db, $user_id) {
   $sql = "
   INSERT INTO
    purchase_histories(
       user_id
       )
       VALUES(:user_id);
       ";
       return execute_query($db, $sql, array(':user_id' => $user_id))
       ;
    }

function get_histories($db, $user_id) {
   $sql = "
   SELECT
    purchase_histories.history_id,
    created,
    SUM(purchase_details.purchase_price * purchase_details.purchase_amount) as total
   FROM
    purchase_histories
   LEFT JOIN
    purchase_details
   ON
    purchase_histories.history_id = purchase_details.history_id
   WHERE
    purchase_histories.user_id = :user_id
   GROUP BY
    purchase_histories.history_id
    ";

    return fetch_all_query($db, $sql, array(':user_id' => $user_id));

 }

 function get_history($db, $history_id) {
   $sql = "
   SELECT
    purchase_histories.history_id,
    created,
    SUM(purchase_details.purchase_price * purchase_details.purchase_amount) as total
   FROM
    purchase_histories
   LEFT JOIN
    purchase_details
   ON
    purchase_histories.history_id = purchase_details.history_id
   WHERE
    purchase_histories.history_id = :history_id
   GROUP BY
    purchase_histories.history_id
    ";

    return fetch_query($db, $sql, array(':history_id' => $history_id));

 }