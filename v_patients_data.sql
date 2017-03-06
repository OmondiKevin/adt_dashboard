CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `adt_dashboard`.`v_patients_data` AS
    SELECT 
        `tp`.`id` AS `patient_id`,
        `tso`.`name` AS `source`,
        `ts`.`name` AS `service`,
        `tp`.`gender` AS `gender`,
        `tp`.`birth_date` AS `birth_date`,
        `tv`.`visit_date` AS `enrollment_date`,
        `tf`.`name` AS `facility`,
        `tcs`.`name` AS `subcounty`,
        `tc`.`name` AS `county`,
        (YEAR(CURDATE()) - YEAR(`tp`.`birth_date`)) AS `age`,
        IF(((YEAR(CURDATE()) - YEAR(`tp`.`birth_date`)) < 15),
            'child',
            'adult') AS `age_category`
    FROM
        ((((((`adt`.`tbl_patient` `tp`
        LEFT JOIN `adt`.`tbl_service` `ts` ON ((`tp`.`service_id` = `ts`.`id`)))
        LEFT JOIN `adt`.`tbl_visit` `tv` ON ((`tv`.`patient_id` = `tp`.`id`)))
        LEFT JOIN `adt`.`tbl_source` `tso` ON ((`tp`.`source_id` = `tso`.`id`)))
        LEFT JOIN `adt`.`tbl_facility` `tf` ON ((`tf`.`id` = `tp`.`facility_id`)))
        LEFT JOIN `adt`.`tbl_county_sub` `tcs` ON ((`tcs`.`id` = `tf`.`county_sub_id`)))
        LEFT JOIN `adt`.`tbl_county` `tc` ON ((`tc`.`id` = `tcs`.`county_id`)))