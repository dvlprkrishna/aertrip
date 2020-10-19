<?php
  require('inc/cons.php')
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aertrip - HRM CRUD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <!-- Listing -->
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Simple HRM CRM</h2>
              </div>
              <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                <a href="#deleteAllModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Remove All Employee Data</span></a>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <caption>Created for Aertrip</caption>
            <thead>
              <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Controls</th>
              </tr>
            </thead>
            <tbody id="dataWrapper">
                <!-- Dynamically generated data goes here -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <form name="addEmp">
            <div class="modal-header">
              <h4 class="modal-title">Add New Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body" id="addEmpBody">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Department</label>
                <input type="text" name="department" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address" required></textarea>
              </div>

            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="button" class="btn btn-success" value="Add" onclick="addEmployee()">
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title">Update Employee Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="updateEmpBody">
              <form name="updateBD">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="author" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="content" required></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-success" value="Update" onclick="updateBlogData()">
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title">Delete Employee Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="deleteMBody">
              <p>Are you sure you want to delete this Employee Data?</p>
              <p class="text-danger"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-danger" value="Delete" id="delinvblog">
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- Delete All Data -->
    <div id="deleteAllModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title">Remove all Employee Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete these Employee Data?</p>
              <p class="text-danger"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-danger" value="Delete All Data">
            </div>
          </form>
        </div>
      </div>
    </div>

  <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="scripts/main.js"></script>

 </body>
</html>