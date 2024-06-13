<?php
    include 'headerforsafety.php';
    require_once './src/ticket.php';
    require_once './src/user.php';
    $ticket = new Ticket();
    $allTicket = $ticket::findByStatus('open');
    $user = new User();
?>
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

                $sql = "SELECT * FROM ticket WHERE status='open'";
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
                        <td>" . htmlspecialchars($row["room"]) . "</td>
                        <td>" . htmlspecialchars($row["Issue"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["priority"]) . "</td>";
                    echo "<td class='status-" . htmlspecialchars($row["status"]) . "'>" . htmlspecialchars($row["status"]) . "</td>
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

<style>
.status-open {
    background-color: greenyellow;
    color: black;
}
.status-solved {
    background-color: red;
    color: white;
}
</style>

</body>
</html>
