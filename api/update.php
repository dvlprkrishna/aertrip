<?php
  require '../inc/cons.php';

  $at_department = isset($_REQUEST['employee'])?$_REQUEST['employee']:"";
  $at_contact = isset($_REQUEST['contact'])?$_REQUEST['contact']:"";
  $at_address = isset($_REQUEST['address'])?$_REQUEST['address']:"";

  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Cannot Update Employee';


  $query0 = "SELECT aec.employee_id,aec.contact
                FROM at_employees_contact aec
                WHERE aec.is_active = '1' AND aec.employee_id = :id AND  aec.contact = :contact ";
  $sql_0 = $conn->prepare($query0);
  $sql_0->bindParam(':contact', $at_contact);
  $sql_0->bindParam(':id', $at_department);
  $sql_0->execute();
  $sql_0->setFetchMode(PDO::FETCH_ASSOC);
  $count0 = $sql_0->rowCount();
        if ($count0 > 0) {
  $response['success'] = false;
  $response['msg'] = 'Cannot Update Employee';
        } else {
                $query1 = "INSERT INTO `at_employees_contact` (`employee_id`,`contact`,`is_active`)
                        VALUES(:id,:contact,'1')";
                $sql_1 = $conn->prepare($query1);
                $sql_1->bindParam(':contact', $at_contact);
                $sql_1->bindParam(':id', $at_department);
                $sql_1->execute();
        }

  $query2 = "SELECT aed.employee_id,aed.address
                FROM at_employees_address aed
                WHERE aed.is_active = '1' AND aed.employee_id = :id AND  aed.address = :address ";
  $sql_2 = $conn->prepare($query2);
  $sql_2->bindParam(':address', $at_address);
  $sql_2->bindParam(':id', $at_department);
  $sql_2->execute();
  $sql_2->setFetchMode(PDO::FETCH_ASSOC);
  $count2 = $sql_2->rowCount();
  if ($count2 > 0) {
        $response['success'] = false;
                  $response['msg'] = 'Cannot Update Employee';
        } else {
                $query3 = "INSERT INTO `at_employees_address` (`employee_id`,`address`,`is_active`)
                VALUES(:id,:address,'1')";
                $sql_3 = $conn->prepare($query3);
                $sql_3->bindParam(':id', $at_department);
                $sql_3->bindParam(':address', $at_address);
                $sql_3->execute();
        }



        $response['success'] = true;
        $response['msg'] = 'Successfully added data';





  echo json_encode($response);
?>
