ALTER TABLE `users`
ADD `status` enum('U','A') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT 'U';
