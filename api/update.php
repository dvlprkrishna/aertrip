<?php
  require '../inc/cons.php';

  $at_name = isset($_REQUEST['name'])?$_REQUEST['name']:"";
  $at_department = isset($_REQUEST['department'])?$_REQUEST['department']:"";
  $at_contact = isset($_REQUEST['contact'])?$_REQUEST['contact']:"";
  $at_address = isset($_REQUEST['address'])?$_REQUEST['address']:"";


  $response = array();

  $response['success'] = false;
  $response['msg'] = 'Data could not be Added';


  $query1 = "UPDATE `blog_data` SET author=:author, title=:title, content=:content, email=:email WHERE id=:id AND is_Active = '1'";
  $sql_1 = $conn->prepare($query1);
  $sql_1->bindParam(':author', $author);
  $sql_1->bindParam(':content', $content);
  $sql_1->bindParam(':email', $email);
  $sql_1->bindParam(':title', $title);
  $sql_1->bindParam(':id', $id);
  $sql_1->execute();

      $response['success'] = true;
      $response['msg'] = 'Data Updated Successfully';


  echo json_encode($response);
?>
