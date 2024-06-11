<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'AdminController/login';
$route['login'] = 'AdminController/login';
$route['logout'] = 'AdminController/logout';
$route['index'] = 'AdminController/index';
$route['register'] = 'AdminController/register';
$route['login_check'] = 'AdminController/login_user';



//graph

$route['asset_master'] = 'AdminController/asset_master';
$route['annual_preventive'] = 'ReportsController/annual_preventive';
$route['monthly_preventive'] = 'ReportsController/monthly_preventive';
$route['preventive_performance'] = 'ReportsController/preventive_performance';
$route['breakdown_register'] = 'ReportsController/breakdown_register';
$route['change_status_pm_checksheet/(:any)'] = 'AdminController/change_status_pm_checksheet';
$route['break_down_day_wise'] = 'ReportsController/break_down_day_wise';
$route['break_down_month_wise'] = 'ReportsController/break_down_month_wise';
$route['breakdown_time_lost_day'] = 'ReportsController/breakdown_time_lost_day';
$route['breakdown_time_lost_month'] = 'ReportsController/breakdown_time_lost_month';
$route['breakdown_time_lost'] = 'ReportsController/breakdown_time_lost';
$route['machine_history'] = 'ReportsController/machine_history';
$route['mtbf'] = 'ReportsController/mtbf';
$route['mttr'] = 'ReportsController/mttr';
$route['why_why'] = 'ReportsController/why_why';
$route['why_why_details/(:any)'] = 'ReportsController/why_why_details';
$route['update_why_why'] = 'ReportsController/update_why_why';


$route['machines'] = 'AdminController/machines';



$route['delete'] = 'AdminController/delete_data';




$route['dies'] = 'AdminController/dies';
$route['add_dies'] = 'AdminController/add_dies';
$route['update_dies'] = 'AdminController/update_dies';



$route['add_part'] = 'AdminController/add_part';





$route['jigs'] = 'AdminController/jigs';
$route['add_jigs'] = 'AdminController/add_jigs';
$route['update_jigs'] = 'AdminController/update_jigs';



$route['relation'] = 'AdminController/relation';
$route['add_gauges'] = 'AdminController/add_gauges';
$route['update_gauges'] = 'AdminController/update_gauges';


//check_list_groups

$route['check_list_groups'] = 'AdminController/check_list_groups';
$route['pm_check_list_by_group/(:any)'] = 'AdminController/pm_check_list_by_group';
$route['add_pm_check_list_by_group'] = 'AdminController/add_pm_check_list_by_group';
$route['update_pm_check_list_by_group'] = 'AdminController/update_pm_check_list_by_group';
$route['add_group'] = 'AdminController/add_group';
$route['update_group_name'] = 'AdminController/update_group_name';
$route['update_dashboard'] = 'AdminController/update_dashboard';
$route['add_tool_to_pm'] = 'AdminController/add_tool_to_pm';
$route['update_tool_to_pm'] = 'AdminController/update_tool_to_pm';
$route['accept_request'] = 'AdminController/accept_request';

//assign pm group 
$route['assign_pm'] = 'AdminController/assign_pm';
$route['spare_parts/(:any)/(:any)'] = 'AdminController/spare_parts';
$route['history/(:any)/(:any)'] = 'AdminController/history';
$route['view_checkshit/(:any)/(:any)'] = 'AdminController/view_checkshit';
$route['add_chcecksheet'] = 'AdminController/add_chcecksheet';
$route['update_checksheet'] = 'AdminController/update_checksheet';
$route['import_item_master'] = 'Excel_import/import_item_master';
$route['import_grn_master'] = 'Excel_import/import_grn_master';
$route['export_pending_parts/(:any)/(:any)'] = 'Excel_import/export_pending_parts';
$route['erp_users'] = 'Welcome/erp_users';
$route['dashboard_master'] = 'Welcome/dashboard_master';
$route['add_users'] = 'Welcome/add_users';

//assign_predective pm group 
$route['assign_predective'] = 'AdminController/assign_predective';

//assign_predective pm group 
$route['create_breakdown/(:any)'] = 'AdminController/create_breakdown';
$route['create_improvement/(:any)'] = 'AdminController/create_improvement';
$route['breakdown_request/(:any)'] = 'AdminController/breakdown_request';

$route['pending/(:any)'] = 'AdminController/pending';
$route['completed/(:any)'] = 'AdminController/completed';
$route['breakdown_pending'] = 'AdminController/breakdown_pending';
$route['breakdown_complete'] = 'AdminController/breakdown_complete';
$route['i_work_request_pending'] = 'AdminController/i_work_request_pending';
$route['i_work_request_completed'] = 'AdminController/i_work_request_complete';
$route['create_history'] = 'AdminController/create_history';

//
$route['main_page'] = 'AdminController/main_page';
$route['pm_type/(:any)/(:any)'] = 'AdminController/pm_type';
$route['predective_maintaince/(:any)'] = 'AdminController/predective_maintaince';

// $route['predictive_request'] = 'AdminController/predictive_request';
// $route['breakdown_request'] = 'AdminController/pm_request';






//instruments

$route['instruments'] = 'AdminController/instruments';
$route['add_instruments'] = 'AdminController/add_instruments';
$route['add_history_instrument'] = 'AdminController/add_history_instrument';
$route['show_history_instrument/(:any)'] = 'AdminController/show_history_instrument';
$route['update_history_instrument'] = 'AdminController/update_history_instrument';
$route['update_msa_instrument'] = 'AdminController/update_msa_instrument';
$route['update_instruments'] = 'AdminController/update_instruments';





//machines

$route['machines'] = 'AdminController/machines';
$route['update_machine'] = 'AdminController/update_machine';

$route['asset_machine_pm/(:any)'] = 'AdminController/asset_machine_pm';
$route['assign_pm_group/(:any)'] = 'AdminController/assign_pm_group';
$route['history_assign_pm_group/(:any)/(:any)'] = 'AdminController/history_assign_pm_group';
$route['add_machine_pm_type'] = 'AdminController/add_machine_pm_type';
$route['add_assign_pm_group'] = 'AdminController/add_assign_pm_group';

$route['add_machines'] = 'AdminController/add_machines';
$route['add_breadkdown_details'] = 'AdminController/add_breadkdown_details';
$route['add_improvement_details'] = 'AdminController/add_improvement_details';
$route['add_breadkdown_details_feedback'] = 'AdminController/add_breadkdown_details_feedback';
$route['update_breadkdown_details'] = 'AdminController/update_breadkdown_details';


$route['add_history_machines'] = 'AdminController/add_history_machines';
$route['show_history_machines/(:any)'] = 'AdminController/show_history_machines';
$route['update_history_machines'] = 'AdminController/update_history_machines';
$route['update_machines'] = 'AdminController/update_instruments';


//realtion_gauges
$route['relation_g'] = 'AdminController/realtion_gauges';
$route['add_realtion_gauges'] = 'AdminController/add_realtion_gauges';
$route['add_history_realtion_gauges'] = 'AdminController/add_history_realtion_gauges';
$route['show_history_realtion_gauges/(:any)'] = 'AdminController/show_history_realtion_gauges';
$route['update_history_realtion_gauges'] = 'AdminController/update_history_realtion_gauges';
$route['update_msa_realtion_gauges'] = 'AdminController/update_msa_realtion_gauges';
$route['update_realtion_gauges'] = 'AdminController/update_realtion_gauges';







$route['permissions'] = 'AdminController/permissions';

$route['user_role'] = 'AdminController/user_role';



$route['utility'] = 'AdminController/utility';
$route['add_utility'] = 'AdminController/add_utility';
$route['update_utility'] = 'AdminController/update_utility';










$route['utilitymachinespares'] = 'AdminController/utilitymachinespares';
$route['add_machine'] = 'AdminController/add_machine';
$route['update_machine'] = 'AdminController/update_machine';
// $route['update_utility']='AdminController/update_utility';





$route['software'] = 'AdminController/software';
$route['add_software'] = 'AdminController/add_software';
$route['update_software'] = 'AdminController/update_software';





$route['pm_type'] = 'AdminController/pm_type';
$route['add_pm_type'] = 'AdminController/add_pm_type';
$route['update_pm_type'] = 'AdminController/update_pm_type';
$route['pm_by_machine_id/(:any)'] = 'AdminController/pm_by_machine_id';

$route['pm_check_list'] = 'AdminController/pm_check_list';
$route['add_pm_check_list'] = 'AdminController/add_pm_check_list';
$route['update_pm_check_list'] = 'AdminController/update_pm_check_list';



$route['item_master'] = 'AdminController/item_master';
$route['item_master_details/(:any)'] = 'AdminController/item_master_details';
$route['add_item_master'] = 'AdminController/add_item_master';
$route['update_item_master'] = 'AdminController/update_item_master';



$route['spare_grn'] = 'AdminController/spare_grn';
$route['spare_store'] = 'AdminController/spare_store';
$route['spare_store_min'] = 'AdminController/spare_store_min';
$route['store_pending_request'] = 'AdminController/store_pending_request';
$route['store_complete_request'] = 'AdminController/store_complete_request';
$route['add_spare_grn'] = 'AdminController/add_spare_grn';
$route['update_spare_grn'] = 'AdminController/update_spare_grn';


$route['employee'] = 'AdminController/employee';
$route['add_customer'] = 'AdminController/add_customer';
// $route['default_controller'] = 'AdminController/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
