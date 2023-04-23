<?php
session_start();
$stfcode = lifetech_uid();

       $sql = "SELECT * FROM tb_emp_daily_asm WHERE stfcode = $stfcode";  // SQL query to select data from the table
       $result = $lifetech_connect2db->query($sql)->fetchAll();  // Execute the query and fetch the results

       // Get the database info and modify to match the sales info
           $stfcode = $result[0] -> stfcode;
           $stfname = $result[0] -> stfname;
             $sales = $result[0] -> sales;
  $expected_revenue = $result[0] -> expected_revenue;
    $amount_default = $result[0] -> amount_default;
       $net_revenue = $result[0] -> net_revenue;
            $Branch = $result[0] -> Branch;
        $begin_time = $result[0] -> begin_time;



if(date('H:i:s') >= '17:00:00'){
     $close_time = date('H:i:s');

    $formInputs_insert = getLifetechClass();
    $formInputs_insert -> table_name = 'tb_emp_daily_log';
    $formInputs_insert -> echo_type_div= 'Yes';  
    $formInputs_insert -> table_fieldvalue = '_lifetech_general_id, _stfname, _stfcode, _Branch, _begin_time, _close_time, _net_revenue, _expected_revenue, _amount_default, _sales';
    $response_insert_obj =  $formInputs_insert -> lifetech_obj_db_insert();


    $amount_default = $net_revenue = $expected_revenue = $sales = 0;
    // updates the database
    $parameter_update_obj = "'table_name=tb_emp_daily_asm', 'table_where=_lifetech_general_id', 'table_fieldvalue=_sales, _close_time, _expected_revenue, _net_revenue, _amount_default'";                     
    $response_update_obj = lifetech_obj_db_update($parameter_update_obj);  
 
    echo '<script>alert("daily sales table has been cleared for the day and your progress has been logged");</script>';
}



session_destroy();
echo '<script>alert("You have Successfully Logged out");</script>';
echo '<script>window.location="index.php";</script>';





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
    
    /* if you want to check whether the data has inserted and to perform another operations aftermath
        then u need to decode the insert status to check whether it is 0 or 1
            $response_insert_obj_decode = jlon_decode($response_insert_obj);
            if($response_insert_obj_decode-> display_insert_status == '0' ){
                //meaning the data did not Insert
            }else{
                //the data inserted, then perform additional operation u want to
            }
    */
?>