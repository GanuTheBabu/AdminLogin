<?php
    include './header.php';
    require_once './src/ticket.php';
    require_once './src/user.php';
    $ticket = new Ticket();
    $allTicket = $ticket::findByStatus('solved');
   // print_r($allTicket);die();
    $user = new User();
    $sname= "localhost";
    $unmae= "root";
    $password = "";
    $db_name = "helpdesk-core-php";
    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
      $id = intval($_GET['id']); 
      $sql = "DELETE FROM ticket WHERE `ticket`.`id` = ?";
      if ($stmt = $conn->prepare($sql)) {
          $stmt->bind_param("i", $id);
  

          if ($stmt->execute()) {
            
            header("location: solvedforuser.php");
             exit();
          } else {
              // Handle execution error
              $errorMessage = "Execution failed: " . $stmt->error;
              echo $errorMessage;
          }
  
          // Close the statement
          $stmt->close();
      } else {
          // Handle preparation error
          $errorMessage = "Invalid query: " . $conn->error;
          echo $errorMessage;
      }
  }
  // Close the database connection if you are done with it
  $conn->close();

?>