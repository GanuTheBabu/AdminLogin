<?php
    include './header.php';
    require_once './src/ticket.php';
    require_once './src/user.php';
    $ticket = new Ticket();
    $allTicket = $ticket::findByStatus('open');
    $user = new User();
    $sname = "localhost";
$uname = "root";
$password = "";
$db_name = "helpdesk-core-php";
$conn = new mysqli($sname, $uname, $password, $db_name);
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
      $id = intval($_GET['id']); 
      $sql = "UPDATE `ticket` SET `status` = 'closed' WHERE `ticket`.`id` = ?";
      if ($stmt = $conn->prepare($sql)) {
          $stmt->bind_param("i", $id);
          if ($stmt->execute()) {
              // Successfully updated the ticket
          } else {
              $errorMessage = "Execution failed: " . $stmt->error;
              echo $errorMessage;
          }
          $stmt->close();
      } else {
          $errorMessage = "Invalid query: " . $conn->error;
          echo $errorMessage;
      }
    }
?>
<style>
  .btn.btn-danger{
    background-color:yellow;
    color:black;
  }
</style>
<div id="content-wrapper">

  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>Ticket ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Floor</th>
                                <th>Room</th>
                                <th>Issue</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                           $sname = "localhost";
                           $uname = "root";
                           $password = "";
                           $db_name = "helpdesk-core-php";
                           $conn = new mysqli($sname, $uname, $password, $db_name);

                           if ($conn->connect_error) {
                               die("Connection failed: " . $conn->connect_error);
                           }

                           $sql = "SELECT * FROM ticket WHERE status='verify'";
                           $result = $conn->query($sql);

                           if (!$result) {
                               die("Invalid query: " . $conn->error);
                           }

                           while ($row = $result->fetch_assoc()) {
                               echo "<tr>
                               <td>" . htmlspecialchars($row["id"]) . "</td>
                                    <td>" . htmlspecialchars($row["name"]) . "</td>
                                    <td>" . htmlspecialchars($row["location"]) . "</td>
                                    <td>" . htmlspecialchars($row["floor"]) . "</td>
                                    <td>" . htmlspecialchars($row["room"]) . "</td>;
                                    <td>" . htmlspecialchars($row["Issue"]) . "</td>";
                               
                               echo "<td>" . htmlspecialchars($row["priority"]) . "</td>";
                               echo "<td><button class='btn btn-danger'>" . htmlspecialchars($row["status"]) . "</button></td>
                                     <td>" . htmlspecialchars($row["updated_at"]) . "</td>
                                     <td width='100px'>
                                        <div class='btn-group' role='group' aria-label='Button group with nested dropdown'>
                                            <div class='btn-group' role='group'>
                                                <button id='btnGroupDrop1' type='button'
                                                    class='btn btn-outline-primary dropdown-toggle' data-toggle='dropdown'
                                                    aria-haspopup='true' aria-expanded='false'>
                                                    Action
                                                </button>
                                                <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
                                                <a class='dropdown-item' href='ticket-details.php?id=" . htmlspecialchars($row['id']) . "'>View</a>
                                                <a class='dropdown-item' href='verify.php?id=" . htmlspecialchars($row['id']) . "'>Update</a>
                                                <a class='dropdown-item' href='delete3.php?id=" . htmlspecialchars($row['id']) . "'>Delete</a>
                                            </div>
                                            </div>
                                        </div>
                                     </td>
                                   </tr>";
                           }
                           $conn->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="./index.php">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
