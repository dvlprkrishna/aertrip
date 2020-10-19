<?php
  require '../inc/cons.php';

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Cannot Fetch Departments';

  $query1 = "SELECT id, department_name FROM at_department WHERE is_Active = '1' ";
  $sql_1 = $conn->prepare($query1);
  $sql_1->execute();
  $sql_1->setFetchMode(PDO::FETCH_ASSOC);
  $count = $sql_1->rowCount();

  if ($count > 0) {
    foreach ($sql_1 as $row){
        $response['data'][] = $row;
    }
    $response['success'] = true;
    $response['msg'] = 'Departments Data fetched';
  } else {
    $response['success'] = false;
    $response['msg'] = 'No Departments Data found';
  }

  echo json_encode($response);
?>
