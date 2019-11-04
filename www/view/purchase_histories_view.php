<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴</h1>
  <div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if(count($histories) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>該当の注文の合計金額</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
           <?php foreach($histories as $history) { ?>
           <tr>
           <td><?php print h($history['history_id']); ?></td>
           <td><?php print h($history['created']); ?></td>
           <td><?php print number_format($history['total']); ?></td>
           <td><a class="btn btn-primary" href="details.php?history_id=<?php print h($history['history_id']); ?>">購入明細表示</a></td>
           </tr>
           <?php } ?>
        </tbody>
      </table>
    <?php }?>