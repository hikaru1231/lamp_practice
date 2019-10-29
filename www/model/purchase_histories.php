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