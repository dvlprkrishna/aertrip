<?php
  require '../inc/cons.php';

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Cannot Fetch Employees Data';

  $query1 = "SELECT ae.id,ae.name,ae.department_id
                FROM at_employees ae
                WHERE ae.is_active = '1' ";
  $sql_1 = $conn->prepare($query1);
  $sql_1->execute();
  $sql_1->setFetchMode(PDO::FETCH_ASSOC);
  $count = $sql_1->rowCount();

  if ($count > 0) {
    foreach ($sql_1 as $row){
        $response['data'][] = $row;
    }
    $response['success'] = true;
    $response['msg'] = 'Employees Data fetched';
  } else {
    $response['success'] = false;
    $response['msg'] = 'No Employees Data found';
  }

  echo json_encode($response);
?>
