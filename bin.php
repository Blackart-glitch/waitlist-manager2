
$lifetech_general_id =  lifetech_general_id();    
    $formInputs_insert = getLifetechClass();
    $formInputs_insert -> table_name = '#Enter table name#';
    $formInputs_insert -> table_record_exist = 'lifetech_category_name and lifetech_school_id';
    $formInputs_insert -> element_empty = '#enter element id#';
    $formInputs_insert -> echo_type_div= 'Yes';  
    $formInputs_insert -> table_fieldvalue = 'lifetech_category_name, _lifetech_school_id, _lifetech_general_id, _lifetech_date';
    //$formInputs_insert -> form_reset= 'Yes';
    //$formInputs_insert -> echo_type_alert= 'Yes'; 
    //$formInputs_insert ->element_empty_response='#Customize Response when element is Empty#';
    //$formInputs_insert ->table_record_exist_response='#Customize Response when Record already Exist#';
    //$formInputs_insert -> use_registration_table= 'Yes';

    $response_insert_obj =  $formInputs_insert -> lifetech_obj_db_insert();
    echo $response_insert_obj ;
    exit();
    