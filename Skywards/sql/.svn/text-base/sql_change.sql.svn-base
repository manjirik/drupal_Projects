########################################################
#name / updated date
#changes
########################################################
#name: Sandip P. 24/01/2013

ALTER TABLE `user_entry` ADD `is_favorite` TINYINT( 1 ) NOT NULL COMMENT 'Flag to check the entry story is favorite or not. 1: Favorite and 0: non favorite';

ALTER TABLE `user_entry` CHANGE `is_favorite` `is_featured` TINYINT( 1 ) NOT NULL COMMENT 'Flag to check the entry story is favorite or not. 1: Featured and 0: non featured';

ALTER TABLE `user_entry` CHANGE `is_featured` `is_featured` TINYINT( 1 ) NOT NULL DEFAULT '0' COMMENT 'Flag to check the entry story is favorite or not. 1: Featured and 0: non featured';

########################################################
#name: Sandeep Jahagirdar 25/01/2013 (As per Sameer Kelkar)

ALTER TABLE `user_entry` ADD `created_date` DATETIME NOT NULL AFTER `is_featured` ;

ALTER TABLE `user_entry` ADD `updated_date` DATETIME NOT NULL AFTER `created_date` ;

########################################################
#name: Manish Patel 1/27/2013

ALTER TABLE `user_entry` ADD UNIQUE KEY `user_location` (user_entry_id,location_id);

ALTER TABLE `user_entry_details` ADD UNIQUE KEY `user_friend` (user_entry_id,friend_id);

########################################################
#name: Sandip Patil 1/28/2013

ALTER TABLE `user_entry_details` ADD `friend_fname` VARCHAR( 255 ) NOT NULL AFTER `friend_email` ,
ADD `friend_lname` VARCHAR( 255 ) NOT NULL AFTER `friend_fname` ,
ADD `is_wildcard_friend` TINYINT( 1 ) NOT NULL DEFAULT '0' COMMENT '1: Wildcard friend and 0: Regular Fb friend' AFTER `friend_lname` ;

#############################################################
#name: Sandeep Jahagirdar 25/01/2013 (As per discussion with Sameer Kelkar)

ALTER TABLE `user_entry_details` CHANGE `friend_id` `friend_id` INT( 11 ) NULL;

################################################################################

########################################################
#name: Sandip Patil 02/04/2013

ALTER TABLE `location` ADD `city_image2` VARCHAR( 100 ) NOT NULL ,
ADD `city_image3` VARCHAR( 100 ) NOT NULL ,
ADD `city_image4` VARCHAR( 100 ) NOT NULL ,
ADD `city_image5` VARCHAR( 100 ) NOT NULL ;
########################################################
#name: sandeep jahagirdar 06/02/2013 (As per discussion with Sameer Kelkar)
ALTER TABLE `user` ADD `reg_answer` VARCHAR( 100 ) NULL AFTER `sky_mem_id` ;
##############################################################################

#name: sandeep jahagirdar 07/02/2013 

ALTER TABLE `user_entry_details` CHANGE `friend_id` `friend_id` VARCHAR( 100 ) NULL DEFAULT NULL;

################################################################################################

#name: Chetan Patil 07/02/2013 
#modified by : Manish Patel 2/10/2013

ALTER TABLE `notification` ADD `notification_desc1` VARCHAR( 400 ) NOT NULL COMMENT 'This is the notification message second' AFTER `notification_desc`;

ALTER TABLE `notification` CHANGE `notification_desc1` `notification_desc1` text NULL COMMENT 'This is the notification message second';

ALTER TABLE `notification` CHANGE `notification_desc` `notification_desc` text NULL;


########################################################################
#name: Chetan Patil 07/02/2013 

ALTER TABLE `user_notifications` ADD `notification_id` INT( 10 ) NOT NULL COMMENT 'Id acts as the foreign key of the notification table primary key.' AFTER `fb_id_sender` ;

########################################################################

#name: Sandeep Jahagirdar 08/02/2013 (As per discussion with Sameer Purpose: User can modify entry specifically location_id only for once then location_change_flag will be updated to 1. It will be '0' by default)

ALTER TABLE `user_entry` ADD `location_change_flag` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `entry_story`;

#######################################################################

#name: Chetan Patil 09/02/2013 

ALTER TABLE `notification` ADD `notification_time` DATETIME NOT NULL AFTER `sent_by`;

#######################################################################

#######################################################################

#name: Nitin Tatte  09/02/2013 

ALTER TABLE `user_entry` ADD `continent_lock_status` TINYINT( 1 ) NOT NULL DEFAULT '0'  AFTER `location_change_flag`;

#######################################################################
#name: Rajesh Patil  12/02/2013 
UPDATE `skywards`.`location` SET `city_image` = 'Zurich.jpg' WHERE `location`.`location_id` =119 LIMIT 1 ;
UPDATE `skywards`.`location` SET `city_image` = 'Sao Paulo.jpg' WHERE `location`.`location_id` =101 LIMIT 1 ;
#######################################################################

#name: Sandeep Jahagirdar 13/02/2013

ALTER TABLE `user_entry_details` ADD `firstname` VARCHAR( 100 ) NOT NULL AFTER `friend_email`;
ALTER TABLE `user_entry_details` ADD `lastname` VARCHAR( 100 ) NOT NULL AFTER `firstname`; 

############################################################################################