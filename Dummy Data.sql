INSERT INTO `loginsystem`.`users` (`id`, `first`, `last`, `uid`, `pwd`, `email`, `type`) VALUES ('1', 'Michael', 'Lacy', 'admin', '$2y$10$ECRibQRLCdD6Z/Ra2dq9y.lI78N2XZWesA6kjcXsm3peLZ.Ydq.lO', 'mjlacy.dude@gmail.com', 'Admin');

INSERT INTO `loginsystem`.`users` (`id`, `first`, `last`, `uid`, `pwd`, `email`, `type`) VALUES ('2', 'Craig', 'Johnson', 'Craig', '$2y$10$ECRibQRLCdD6Z/Ra2dq9y.lI78N2XZWesA6kjcXsm3peLZ.Ydq.lO', '2dude10@gmail.com', 'Standard User');

INSERT INTO `loginsystem`.`inventory` (`inv_id`, `description`, `quantityStored`, `quantityOrdered`) VALUES (1, 'Bolt', 3, 5);

INSERT INTO `loginsystem`.`inventory` (`inv_id`, `description`, `quantityStored`, `quantityOrdered`) VALUES (2, 'Screw', 9001, 8001);

INSERT INTO `loginsystem`.`inventory` (`inv_id`, `description`, `quantityStored`, `quantityOrdered`) VALUES (3, 'Nut', 30, 50);