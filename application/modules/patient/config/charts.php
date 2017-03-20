<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*patients enrolled in care*/
$config['enrolled_in_care_first_item'] = 'source';
$config['enrolled_in_care_text'] = 'patients enrolled in care';
$config['enrolled_in_care_last_item'] = 'service';
$config['enrolled_in_care_chart_type'] = 'column';
$config['enrolled_in_care_chart_metric_title'] = 'Total Number';
$config['enrolled_in_care_chart_metric_prefix'] = ' (Patients)';
$config['enrolled_in_care_view_name'] = 'vw_patients_data';
$config['enrolled_in_care_color_point'] = TRUE;

/*patients enrolled in ART*/
$config['enrolled_in_art_first_item'] = 'service';
$config['enrolled_in_art_text'] = 'patients enrolled in art';
$config['enrolled_in_art_last_item'] = 'regimen_name';
$config['enrolled_in_art_chart_type'] = 'column';
$config['enrolled_in_art_chart_metric_title'] = 'Total Number';
$config['enrolled_in_art_chart_metric_prefix'] = ' (Patients)';
$config['enrolled_in_art_view_name'] = 'vw_patients_data';
$config['enrolled_in_art_color_point'] = TRUE;

/*patients cummulative number to date*/
$config['patient_cumm_number_first_item'] = 'patient_status';
$config['patient_cumm_number_text'] = 'patients cummulative number to date';
$config['patient_cumm_number_last_item'] = 'service';
$config['patient_cumm_number_chart_type'] = 'column';
$config['patient_cumm_number_chart_metric_title'] = 'Total Number';
$config['patient_cumm_number_chart_metric_prefix'] = ' (Patients)';
$config['patient_cumm_number_view_name'] = 'vw_patients_data';
$config['patient_cumm_number_color_point'] = TRUE;

/*patients active by regimen*/
$config['patient_active_byregimen_first_item'] = 'regimen_name';
$config['patient_active_byregimen_text'] = 'patients active by regimen';
$config['patient_active_byregimen_last_item'] = 'age';
$config['patient_active_byregimen_chart_type'] = 'column';
$config['patient_active_byregimen_chart_metric_title'] = 'Total Number';
$config['patient_active_byregimen_chart_metric_prefix'] = ' (Patients)';
$config['patient_active_byregimen_view_name'] = 'vw_patients_data';
$config['patient_active_byregimen_color_point'] = TRUE;

/*patients patients_expected_visits*/
$config['patient_expected_visits_first_item'] = 'source';
$config['patient_expected_visits_text'] = 'patients expeted  visits';
$config['patient_expected_visits_last_item'] = 'service';
$config['patient_expected_visits_chart_type'] = 'column';
$config['patient_expected_visits_chart_metric_title'] = 'Total Number';
$config['patient_expected_visits_chart_metric_prefix'] = ' (Patients)';
$config['patient_expected_visits_view_name'] = 'vw_patients_data';
$config['patient_expected_visits_color_point'] = TRUE;

/*patients patients_changed_regimens*/
$config['patient_changed_regimen_first_item'] = 'source';
$config['patient_changed_regimen_text'] = 'patients changed regimen';
$config['patient_changed_regimen_last_item'] = 'service';
$config['patient_changed_regimen_chart_type'] = 'column';
$config['patient_changed_regimen_chart_metric_title'] = 'Total Number';
$config['patient_changed_regimen_chart_metric_prefix'] = ' (Patients)';
$config['patient_changed_regimen_view_name'] = 'vw_patients_data';
$config['patient_changed_regimen_color_point'] = TRUE;

/*patients early warnng indicators*/
$config['patient_ealry_warn_indic_first_item'] = 'source';
$config['patient_ealry_warn_indic_text'] = 'patients early warning indicators';
$config['patient_ealry_warn_indic_last_item'] = 'service';
$config['patient_ealry_warn_indic_chart_type'] = 'column';
$config['patient_ealry_warn_indic_chart_metric_title'] = 'Total Number';
$config['patient_ealry_warn_indic_chart_metric_prefix'] = ' (Patients)';
$config['patient_ealry_warn_indic_view_name'] = 'vw_patients_data';
$config['patient_ealry_warn_indic_color_point'] = TRUE;

/*patients adherence*/
$config['patient_adherence_first_item'] = 'patient_status';
$config['patient_adherence_text'] = 'patients adherence';
$config['patient_adherence_last_item'] = 'age';
$config['patient_adherence_chart_type'] = 'column';
$config['patient_adherence_chart_metric_title'] = 'Total Number';
$config['patient_adherence_chart_metric_prefix'] = ' (Patients)';
$config['patient_adherence_view_name'] = 'vw_patients_data';
$config['patient_adherence_color_point'] = TRUE;

/*patients non adherence*/
$config['patient_non_adhrence_first_item'] = 'source';
$config['patient_non_adhrence_text'] = 'patients non adherence';
$config['patient_non_adhrence_last_item'] = 'service';
$config['patient_non_adhrence_chart_type'] = 'column';
$config['patient_non_adhrence_chart_metric_title'] = 'Total Number';
$config['patient_non_adhrence_chart_metric_prefix'] = ' (Patients)';
$config['patient_non_adhrence_view_name'] = 'vw_patients_data';
$config['patient_non_adhrence_color_point'] = TRUE;

/*patients lost to follow up*/
$config['patient_lost_to_follow_up_first_item'] = 'patient_status';
$config['patient_lost_to_follow_up_text'] = 'patients lost to follow up';
$config['patient_lost_to_follow_up_last_item'] = 'service';
$config['patient_lost_to_follow_up_chart_type'] = 'column';
$config['patient_lost_to_follow_up_chart_metric_title'] = 'Total Number';
$config['patient_lost_to_follow_up_chart_metric_prefix'] = ' (Patients)';
$config['patient_lost_to_follow_up_view_name'] = 'vw_patients_data';
$config['patient_lost_to_follow_up_color_point'] = TRUE;

