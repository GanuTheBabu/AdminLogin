<?php
// Include the necessary files
require_once 'headerforuser.php';
require_once './src/ticket.php';
require_once './src/Database.php';

// Initialize objects
$ticket = new Ticket();
$allTickets = $ticket::findAll();

// Handle deletion
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    try {
        $ticket->delete($id);
        echo '<script>alert("Ticket deleted successfully");window.location = "./dashboard.php";</script>';
    } catch (Exception $e) {
        echo '<script>alert("Error deleting ticket: ' . $e->getMessage() . '");window.location = "./dashboard.php";</script>';
    }
}
?>
<style>
  .btn-open {
    background-color: greenyellow;
    color:black;
}
.btn-close {
    background-color: red;
    color:white;
}
.btn-solved {
    background-color: yellow;
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
<a class="btn btn-primary my-3" href="./ticket.php"><i class="fa fa-plus"></i> New Ticket</a>
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
                <th>Comment</th>
                <th>Team</th>
                <th>Priority</th>
                <th>Updated at</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $sname = "localhost";
                $unmae = "root";
                $password = "";
                $db_name = "helpdesk-core-php";
                $conn = new mysqli($sname, $unmae, $password, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM ticket";
                $result = $conn->query($sql);

                if ($result === false) {
                    die("Invalid query: " . $conn->error);
                }

                while ($row = $result->fetch_assoc()) {
                    $statusClass = '';
                    switch ($row["status"]) {
                        case "open":
                            $statusClass = 'btn-open';
                            break;
                        case "closed":
                            $statusClass = 'btn-close';
                            break;
                        case "solved":
                            $statusClass = 'btn-solved';
                            break;
                        case "verify":
                            $statusClass = 'btn-solved';
                            break;
                        default:
                            $statusClass = '';
                            break;
                    }
                    echo "<tr>
                    <td>" . htmlspecialchars($row["id"]) . "</td>
                            <td>" . htmlspecialchars($row["name"]) . "</td>
                            <td>" . htmlspecialchars($row["location"]) . "</td>
                            <td>" . htmlspecialchars($row["floor"]) . "</td>
                            <td>" . htmlspecialchars($row["room"]) . "</td>
                            <td>" . htmlspecialchars($row["Issue"]) . "</td>
                            <td>" . htmlspecialchars($row["comment"]) . "</td>
                            <td>" . htmlspecialchars($row["team"]) . "</td>
                            <td>" . htmlspecialchars($row["priority"]) . "</td>
                            <td>" . htmlspecialchars($row["updated_at"]) . "</td>
                            <td><button class='btn $statusClass'>" . htmlspecialchars($row["status"]) . "</button></td>
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

<script>
document.querySelectorAll('.deleteBtn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const id = this.getAttribute('data-id');
        if (confirm('Are you sure you want to delete this ticket?')) {
            window.location.href = `?del=${id}`;
        }
    });
});
</script>

<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
