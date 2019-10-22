SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `purchase_histories` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `purchase_histories`
  ADD PRIMARY KEY (`history_id`);

ALTER TABLE `purchase_histories`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `purchase_details` (
  `detail_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `purchase_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`detail_id`);

ALTER TABLE `purchase_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;
