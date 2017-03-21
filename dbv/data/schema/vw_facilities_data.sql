CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `vw_facilities_data` AS
    SELECT DISTINCT
        `fa`.`id` AS `facility_id`,
        `fa`.`code` AS `facility_code`,
        `fa`.`name` AS `facility_name`,
        `sub`.`id` AS `sub_county_id`,
        `sub`.`name` AS `sub_county_name`,
        `co`.`id` AS `county_id`,
        `co`.`name` AS `county_name`
    FROM
        ((`adt`.`tbl_facility` `fa`
        JOIN `adt`.`tbl_county_sub` `sub` ON ((`fa`.`county_sub_id` = `sub`.`id`)))
        JOIN `adt`.`tbl_county_sub` `co` ON ((`sub`.`county_id` = `co`.`county_id`)))