<?php
  require '../inc/cons.php';

  $at_name = isset($_REQUEST['name'])?$_REQUEST['name']:"";
  $at_department = isset($_REQUEST['department'])?$_REQUEST['department']:"";
  $at_contact = isset($_REQUEST['contact'])?$_REQUEST['contact']:"";
  $at_address = isset($_REQUEST['address'])?$_REQUEST['address']:"";

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Cannot Add New Employee';


  $query2 = "SELECT `name`, `department_id` FROM `at_employees` WHERE 'name'=:name AND 'department_id'=:department AND is_active='1'";
  $sql_2 = $conn->prepare($query2);
  $sql_2->bindParam(':name', $at_name);
  $sql_2->bindParam(':department', $at_department);
  $sql_2->execute();
  $sql_2->setFetchMode(PDO::FETCH_ASSOC);
  $count = $sql_2->rowCount();
    if($count > 0){
      $response['success'] = false;
      $response['msg'] = 'Account Already Exist';
    } else {
        $query1 = "INSERT INTO `at_employees` (`name`,`department_id`,`is_active`)
                        VALUES(:name,:department,'1')";
        $sql_1 = $conn->prepare($query1);
        $sql_1->bindParam(':name', $at_name);
        $sql_1->bindParam(':department', $at_department);
        $sql_1->execute();
        $sql_lastentry = $conn->lastInsertId();

                $query4 = "INSERT INTO `at_employees_contact` (`employee_id`,`contact`,`is_active`)
                        VALUES(:lastentry,:contact,'1')";
                $sql_4 = $conn->prepare($query4);
                $sql_4->bindParam(':lastentry', $sql_lastentry);
                $sql_4->bindParam(':contact', $at_contact);
                $sql_4->execute();

                $query3 = "INSERT INTO `at_employees_address` (`employee_id`,`address`,`is_active`)
                        VALUES(:lastentry,:address,'1')";
                $sql_3 = $conn->prepare($query3);
                $sql_3->bindParam(':lastentry', $sql_lastentry);
                $sql_3->bindParam(':address', $at_address);
                $sql_3->execute();

                $response['success'] = true;
                $response['msg'] = 'Successfully added New Employee';
                // for debugging
                $response['id'] = $sql_lastentry;
    }




  echo json_encode($response);
?>
