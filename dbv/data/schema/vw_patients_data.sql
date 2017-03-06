CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_patients_data` AS select `tp`.`id` AS `patient_id`,`tso`.`name` AS `source`,`ts`.`name` AS `service`,`tp`.`gender` AS `gender`,`tp`.`birth_date` AS `birth_date`,`tv`.`visit_date` AS `enrollment_date`,`tf`.`name` AS `facility`,`tcs`.`name` AS `subcounty`,`tc`.`name` AS `county`,(year(curdate()) - year(`tp`.`birth_date`)) AS `age`,if(((year(curdate()) - year(`tp`.`birth_date`)) < 15),'child','adult') AS `age_category` from ((((((`adt`.`tbl_patient` `tp` left join `adt`.`tbl_service` `ts` on((`tp`.`service_id` = `ts`.`id`))) left join `adt`.`tbl_visit` `tv` on((`tv`.`patient_id` = `tp`.`id`))) left join `adt`.`tbl_source` `tso` on((`tp`.`source_id` = `tso`.`id`))) left join `adt`.`tbl_facility` `tf` on((`tf`.`id` = `tp`.`facility_id`))) left join `adt`.`tbl_county_sub` `tcs` on((`tcs`.`id` = `tf`.`county_sub_id`))) left join `adt`.`tbl_county` `tc` on((`tc`.`id` = `tcs`.`county_id`)))