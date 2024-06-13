<?php
include 'headerforuser.php';
require_once './src/ticket.php';
require_once './src/user.php';

$ticket = new Ticket();
$allTicket = $ticket::findByStatus('solved');
$user = new User();

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "helpdesk-core-php";
$conn = new mysqli($sname, $uname, $password, $db_name);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $sql = "UPDATE `ticket` SET `status` = 'verify' WHERE `ticket`.`id` = ?";
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
.status-solved {
    background-color: yellow;
    color: black;
}
.status-open {
    background-color: green;
    color: white;
}
</style>

<div id="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="card mb-3">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Ticket Id</th>
                <th>Name</th>
                <th>Location</th>
                <th>Floor</th>
                <th>Room</th>
                <th>Issue</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM ticket WHERE status='solved'";
              $result = $conn->query($sql);
              if (!$result) {
                  die("Invalid query: " . $conn->error);
              }
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["location"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["floor"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["room"]) . "</td>";
                  echo "<td>" . (isset($row['Issue']) ? htmlspecialchars($row['Issue']) : 'Issue not available') . "</td>";
                  echo "<td>" . htmlspecialchars($row["priority"]) . "</td>";
                  echo "<td class='status-" . htmlspecialchars($row["status"]) . "'>" . htmlspecialchars($row["status"]) . "</td>";
                  echo "<td width='100px'>
                          <div class='btn-group' role='group' aria-label='Button group with nested dropdown'>
                              <div class='btn-group' role='group'>
                                  <button id='btnGroupDrop1' type='button'
                                          class='btn btn-outline-primary dropdown-toggle' data-toggle='dropdown'
                                          aria-haspopup='true' aria-expanded='false'>
                                      Action
                                  </button>
                                  <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
                                  <a class='dropdown-item' href='solvedforuser.php?id=" . htmlspecialchars($row['id']) . "'>Update</a>
                              </div>
                              </div>
                          </div>
                        </td>";
                  echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="js/sb-admin.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>

</body>
</html>
