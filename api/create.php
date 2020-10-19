<?php
  require '../inc/cons.php';

  $at_name = isset($_REQUEST['name'])?$_REQUEST['name']:"";
  $at_department = isset($_REQUEST['department'])?$_REQUEST['department']:"";
  $at_contact = isset($_REQUEST['contact'])?$_REQUEST['contact']:"";
  $at_address = isset($_REQUEST['address'])?$_REQUEST['address']:"";

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Cannot Add New Employee';

  $query1 = "INSERT INTO `at_employees` (`name`,`department_id`,`is_Active`)
                VALUES(:name,:department,'1')";
  $sql_1 = $conn->prepare($query1);
  $sql_1->bindParam(':name', $at_name);
  $sql_1->bindParam(':department', $at_department);
  $sql_1->execute();
  $sql_lastentry = $conn->lastInsertId();

        $query2 = "INSERT INTO `at_employees_contact` (`employee_id`,`contact`,`is_Active`)
                VALUES(:lastentry,:contact,'1')";
        $sql_2 = $conn->prepare($query2);
        $sql_2->bindParam(':lastentry', $sql_lastentry);
        $sql_2->bindParam(':contact', $at_contact);
        $sql_2->execute();

        $query3 = "INSERT INTO `at_employees_address` (`employee_id`,`address`,`is_Active`)
                VALUES(:lastentry,:address,'1')";
        $sql_3 = $conn->prepare($query3);
        $sql_3->bindParam(':lastentry', $sql_lastentry);
        $sql_3->bindParam(':address', $at_address);
        $sql_3->execute();

            $response['success'] = true;
            $response['msg'] = 'Successfully added New Employee';
            // for debugging
            $response['id'] = $sql_lastentry;

  echo json_encode($response);
?>
