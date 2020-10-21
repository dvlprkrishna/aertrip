<?php
  require '../inc/cons.php';

  $department_name = isset($_REQUEST['department_name'])?$_REQUEST['department_name']:"";

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Cannot Add New Department';


  $query2 = "SELECT `department_name` FROM `at_department` WHERE 'department_name'=:department_name AND is_active='1'";
  $sql_2 = $conn->prepare($query2);
  $sql_2->bindParam(':department_name', $department_name);
  $sql_2->execute();
  $sql_2->setFetchMode(PDO::FETCH_ASSOC);
  $count = $sql_2->rowCount();
    if($count > 0){
      $response['success'] = false;
      $response['msg'] = 'Department Already Exist';
    } else {
        $query1 = "INSERT INTO `at_department` ( `department_name`,`is_active`)
                        VALUES(:department_name,'1')";
        $sql_1 = $conn->prepare($query1);
        $sql_1->bindParam(':department_name', $department_name);
        $sql_1->execute();


                $response['success'] = true;
                $response['msg'] = 'Successfully added New Department';
    }




  echo json_encode($response);
?>
