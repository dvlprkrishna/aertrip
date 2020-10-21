<?php
  require '../inc/cons.php';
  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Data could not be deleted';


  $query1 = "update `at_employees` SET is_active = '2' WHERE is_active = '1'";
  $sql_1 = $conn->prepare($query1);
  $sql_1->execute();

  $query2 = "update `at_employees_address` SET is_active = '2' WHERE is_active = '1'";
  $sql_2 = $conn->prepare($query2);
  $sql_2->execute();

  $query3 = "update `at_employees_contact` SET is_active = '2' WHERE is_active = '1'";
  $sql_3 = $conn->prepare($query3);
  $sql_3->execute();



    $response['success'] = true;
    $response['msg'] = 'All Data deleted successfully';

  echo json_encode($response);
?>
