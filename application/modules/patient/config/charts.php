<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*patients enrolled in care*/
$config['enrolled_in_care_first_item'] = 'source';
$config['enrolled_in_care_text'] = 'PATIENTS ENROLLED IN CARE';
$config['enrolled_in_care_last_item'] = 'service';
$config['enrolled_in_care_chart_type'] = 'column';
$config['enrolled_in_care_chart_metric_title'] = 'Total Number';
$config['enrolled_in_care_metric_prefix'] = ' Patients';
$config['enrolled_in_care_view_name'] = 'vw_patients_data';
$config['enrolled_in_care_color_point'] = TRUE;

/*patients enrolled in ART*/
$config['enrolled_in_art_first_item'] = 'service';
$config['enrolled_in_art_text'] = 'PATIENTS ENROLLED IN ART';
$config['enrolled_in_art_last_item'] = 'regimen_name';
$config['enrolled_in_art_chart_type'] = 'column';
$config['enrolled_in_art_chart_metric_title'] = 'Total Number';
$config['enrolled_in_art_metric_prefix'] = ' Patients';
$config['enrolled_in_art_view_name'] = 'vw_patients_data';
$config['enrolled_in_art_color_point'] = TRUE;


