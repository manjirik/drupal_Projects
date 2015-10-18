ALTER TABLE user ADD COLUMN gender VARCHAR(5) NULL AFTER modify_date;

ALTER TABLE `user` ADD `notify_message` INT(1) NOT NULL AFTER `status`;

ALTER TABLE `user` ADD COLUMN `zone` VARCHAR(100) NOT NULL AFTER `avatar`;

ALTER TABLE `user` ADD COLUMN `user_key` VARCHAR(32) NULL AFTER `gender`;

ALTER TABLE `user` ADD COLUMN `login_counter` INT DEFAULT '0' NULL AFTER `user_key`;

ALTER TABLE `dmm_settings` ADD COLUMN `login_counter` INT DEFAULT '0' NULL AFTER `modify_date`;

DELETE FROM notify WHERE musician_id = 0;
DELETE FROM notify WHERE notify_user_id = 0;

ALTER TABLE `user` ADD COLUMN `musician_type` VARCHAR(32) NULL AFTER `musician_info`;
ALTER TABLE `user` ADD COLUMN `years_making_music` VARCHAR(8) NULL AFTER `musician_type`;
ALTER TABLE `user` ADD COLUMN `personal_website` VARCHAR(128) NULL AFTER `years_making_music`;

ALTER TABLE `user` ADD COLUMN `user_type` VARCHAR(16) NULL AFTER `id`;

UPDATE USER SET user_type = 'musician' WHERE notify = 1;
UPDATE USER SET user_type = 'listener' WHERE notify = 0;


ALTER TABLE `songs` ADD `weight` INT(1) NOT NULL AFTER `user_id`;
ALTER TABLE `songs` ADD `for_sell` INT(1) NOT NULL AFTER `is_download`;

ALTER TABLE `songs` ADD `video_url` VARCHAR(2048) NOT NULL AFTER `file_path`;

ALTER TABLE `songs` ADD COLUMN `credits` MEDIUMTEXT NULL AFTER `song_credit`;




ALTER TABLE `songs` ADD `song_length` INT( 10 ) NOT NULL AFTER `song_name` ;

ALTER TABLE `songs` ADD `song_start_time` INT NOT NULL COMMENT 'time in seconds' AFTER `song_credit` ,
ADD `song_duration` INT NOT NULL COMMENT 'duration in seconds' AFTER `song_start_time` ;

ALTER TABLE `songs` CHANGE `song_start_time` `song_start_time` FLOAT( 11 ) NOT NULL COMMENT 'time in seconds',
CHANGE `song_duration` `song_duration` FLOAT( 11 ) NOT NULL COMMENT 'duration in seconds';


CREATE TABLE `video_comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `song_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `comment` TEXT NOT NULL,
  `ip` VARCHAR(20) NOT NULL,
  `status` INT(1) NOT NULL,
  `create_date` DATETIME NOT NULL,
  `modify_date` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;



CREATE TABLE `musician_type`( `mid` INT NOT NULL AUTO_INCREMENT, `type` VARCHAR(256) NOT NULL, PRIMARY KEY (`mid`) ) ENGINE=MYISAM;
INSERT INTO `musician_type` (`type`) VALUES ('none');
INSERT INTO `musician_type` (`type`) VALUES ('Basement Brilliant');
INSERT INTO `musician_type` (`type`) VALUES ('World Famous');
INSERT INTO `musician_type` (`type`) VALUES ('Independent');
INSERT INTO `musician_type` (`type`) VALUES ('Experimentalist');



CREATE TABLE `songs_lifestyle_relation`( `sid` INT(11) UNSIGNED NOT NULL, `lsid` INT(4) UNSIGNED NOT NULL ) ENGINE=MYISAM, CHARSET=utf8, COLLATE=utf8_general_ci; 

CREATE INDEX sid_index ON `songs_lifestyle_relation` (sid) USING BTREE;
CREATE INDEX lsid_index ON `songs_lifestyle_relation` (lsid) USING BTREE;

ALTER TABLE `user` ADD COLUMN `selected_lifestyle` INT(4) DEFAULT 0 NULL AFTER `login_counter`; 

ALTER TABLE  `songs` ADD  `admin_brief_review` TEXT AFTER  `admin_review`;