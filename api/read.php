<?php
  require '../inc/cons.php';

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Cannot Fetch Employees Data';

  $query1 = "SELECT ae.id,ae.name,ad.department_name,aec.contact,aea.address
                FROM at_employees ae
                INNER JOIN at_employees_contact aec
                ON ae.id = aec.employee_id
                INNER JOIN at_employees_address aea
                on ae.id = aea.employee_id
                INNER JOIN at_department ad
                on ae.department_id = ad.id
                WHERE ae.is_Active = '1' ";
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
