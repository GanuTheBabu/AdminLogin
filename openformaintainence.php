<?php
    include 'headerformaintainence.php';
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
    /*
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = intval($_GET['id']); 
        $sql = "UPDATE `ticket` SET `status` = 'solved' WHERE `ticket`.`id` = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                // Successfully updated the ticke
            } else {
                $errorMessage = "Execution failed: " . $stmt->error;
                echo $errorMessage;
            }
            $stmt->close();
        } else {
            $errorMessage = "Invalid query: " . $conn->error;
            echo $errorMessage;
        }
    }*/
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
                          <td width='100px'>
                            <div class='btn-group' role='group' aria-label='Button group with nested dropdown'>
                                <div class='btn-group' role='group'>
                                    <button id='btnGroupDrop1' type='button'
                                            class='btn btn-outline-primary dropdown-toggle' data-toggle='dropdown'
                                            aria-haspopup='true' aria-expanded='false'>
                                        Action
                                    </button>
                                    <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
                                        <button onclick='myFunction(" . htmlspecialchars($row["id"]) . ")' class='dropdown-item' '>Update</button>
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
        <a class="btn btn-primary" href="./index.html">Logout</a>
      </div>
    </div>
  </div>
</div>

<p id="demo"></p>
<form id="nameForm" method="post" action="save_name.php" style="display:none;">
  <input type="text" id="nameInput" name="name">
  <input type="text" id="nameid" name="id">
  <input type="submit">
</form>
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
function myFunction(id) {
  let text;

  let person = prompt("Please enter your name:", "Harry Potter");
  if (person == null || person == "") {
    text = "User cancelled the prompt.";
  } else {
    text = "Hello " + person + "! How are you today?";
    document.getElementById("nameInput").value = person;
    document.getElementById("nameid").value = id;
    document.getElementById("nameForm").submit();
  }
  document.getElementById("demo").innerHTML = text;
}
/*
function myFunction() {
  let person = prompt("Enter your comment:");
  if (person != null && person != "") {
    // Send data to the server using AJAX
    document.getElementById("demo").innerHTML = person;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "in.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("demo").innerHTML = xhr.responseText;
      }
    };
    xhr.send("comment=" + encodeURIComponent(person));
  } else {
    document.getElementById("demo").innerHTML = "User cancelled the prompt.";
  }
}*/
</script>

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
