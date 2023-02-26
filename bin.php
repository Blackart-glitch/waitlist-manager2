<?php

if ($_POST['post_content_data']  == 'submit'){
  ob_end_clean();  
  $response_post_content = jlon_create($response_post_content); 

  $lifetech_general_id = $_POST['Product'];
  $Qty = $_POST['Quantity'];
  $Price = $_POST['Price'];
  $Last_update = date('Y-m-d H:i:s');  

  $urid=$lifetech_general_id;
  $parameter_getone = "'table_name=tb_goods_db', 'table_where=_lifetech_general_id'";
  $response_obj_getone= lifetech_obj_getone_record($parameter_getone);
  $prevqty = $response_obj_getone -> Quantity;

  $Quantity = $prevqty + $Qty;

  $parameter_update_obj = "'table_name=tb_goods_db', 'table_where=_lifetech_general_id', 'table_fieldvalue=_Quantity, _Price, _prevqty, _Last_update' ";
  $response_update_obj= lifetech_obj_db_update($parameter_update_obj);
  echo $response_update_obj -> display_update_result;

  $response_post_content->content_body .= $body;
  //$response_post_content->echo_type_modal = 'Yes';
  // $response_post_content->reload_content_data ='#Enter the Content Name to Reload#';

  echo jlon_encode($response_post_content);
  exit();
} 


?>