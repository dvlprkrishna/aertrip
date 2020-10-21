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
              <div class="col-sm-3">
                <h2>Aertrip HRM</h2>
              </div>
              <div class="col-sm-9">
                <a href="#addEmployeeModal" id="insert_employee_modal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                <a href="#deleteAllModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Remove All Employee Data</span></a>
                <a href="#updateEmployeeModal" id="update_employee_modal" class="btn btn-warning" data-toggle="modal"><i class="material-icons">&#xE15C;</i>Add Addtional Employee Data</span></a>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-sm-5">
                <h2 class="text-left"><small>Search Employee</small></h2>
              </div>
              <div class="col-sm-5">
                <form name="empsearch">
                  <div class="form-group">
                    <input type="search" name="search" class="  form-control" placeholder="Enter Employee Name" required>
                  </div>
                </form>
              </div>
              <div class="col-sm-2">
                <button id="empsearchbtn" class="btn btn-warning"><i class="material-icons">✅</i> Find</span></button>
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <caption>Created for Aertrip</caption>
            <thead>
              <tr>
                <th>Emp ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Contact</th>
                <th>Address</th>
                <!-- <th>Controls</th> -->
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
                <select class="custom-select dept-options" name="department" >
                    <option selected disabled>Select Department</option>
                    <!-- Department names get populated here -->
                </select>
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
              <input type="button" class="btn btn-success" id="addEmployee" value="Add">
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
              <form name="updateEmpData">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="up-name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select class="custom-select dept-options" name="up-department" >
                        <option selected disabled>Select Department</option>
                        <!-- Department names get populated here -->
                    </select>
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" name="up-contact" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="up-address" required></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-success" id="" value="Update" onclick="updateBlogData()">
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
            <div class="modal-body" id="delBody">
              <p>Are you sure you want to delete these Employee Data?</p>
              <p class="text-danger"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-danger" id="deleteData" value="Delete All Data">
            </div>
          </form>
        </div>
      </div>
    </div>

  <!-- Update Modal HTML -->
    <div id="updateEmployeeModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <form name="updateEmp">
            <div class="modal-header">
              <h4 class="modal-title">Add Addtional Employee Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body" id="updateEmpBody">
              <div class="form-group">
                <label>Name</label>
                <!-- <input type="text" name="name" class="form-control" required> -->
                <select class="custom-select" name="employee" id="employee-options">
                    <option selected disabled>Select Employee</option>
                    <!-- Employee names get populated here -->
                </select>
              </div>

              <div class="form-group">
                <label>Add New Contact</label>
                <input type="text" name="contact" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Add New Address</label>
                <textarea class="form-control" name="address" required></textarea>
              </div>

            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="button" class="btn btn-success" id="updateEmployee" value="Add">
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
    <!-- <script src="scripts/main.js"></script> -->
    <script>

    // console.log('Loaded');
    // Fetch initial data list
    $.ajax({
        url: 'api/read.php',
        type: 'POST',
        success: function (data) {
            // console.log(data)
            var parsedData = JSON.parse(data);
            $('#dataWrapper').html('');
            var dataWrapperHTML = ``;
            for (const key in parsedData.data) {
                if (parsedData.data.hasOwnProperty(key)) {
                    // Individual Controls
                    // <td id="at${parsedData.data[key].id}">
                    //     <a id="" onclick="updateEmployee(at${parsedData.data[key].id})" type="button"  class="editEmpBtn edit"
                    //         data-id="${parsedData.data[key].id}" data-name="${parsedData.data[key].name}" data-address="${parsedData.data[key].address}" data-contact="${parsedData.data[key].contact}" data-dept="${parsedData.data[key].department_name}" data-dept-id="${parsedData.data[key].department_id}">
                    //         <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    //     </a>
                    //     <a type="button" class="deleteInv"   data-toggle="modal">
                    //         <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    //     </a>
                    // </td>
                    dataWrapperHTML += `<tr>
                         <td>${parsedData.data[key].id}</td>
                         <td>${parsedData.data[key].name}</td>
                         <td>${parsedData.data[key].department_name}</td>
                         <td>${parsedData.data[key].contact}</td>
                         <td>${parsedData.data[key].address}</td>

                       </tr>`;
                }
            }

            $('#dataWrapper').html(dataWrapperHTML);

        },
        error: function (err) {
            alert(err);
        }
    });

    // fetching Departments Names
    function get_departments() {
        $.ajax({
            url: 'api/get_departments.php',
            type: 'POST',
            success: function (data) {
                var parsedDeptData = JSON.parse(data);
                $('.dept-options').html('');
                var dept_optionshtml = ``;
                for (const key in parsedDeptData.data) {
                    if (parsedDeptData.data.hasOwnProperty(key)) {
                        // console.log(parsedDeptData.data[key]);
                        dept_optionshtml += `<option value="${parsedDeptData.data[key].id}">${parsedDeptData.data[key].department_name}</option>`;
                    }
                }
                $('.dept-options').html(dept_optionshtml);
                $('.dept-options').prepend(`<option selected disabled>Select Department</option>`);

            },
            error: function (err) {
                alert(err);
            }
        });
    }
    // Insert New Employees
    function insertEmployee() {
        var sendData = $('[name="addEmp"]').serialize();
        // console.log(sendData);
        $.ajax({
            url: 'api/create.php?' + sendData,
            type: 'POST',
            success: function (data) {
                if(JSON.parse(data).success){
                    $('#addEmpBody').html('');
                    $('#addEmpBody').html('<p>Data Added Successfully</p>');
                    $('[value="Add"]').css('display', 'none');
                    $('[value="Cancel"]').css('display', 'none');
                } else {
                    $('#addEmpBody').html('');
                    $('#addEmpBody').html('<p>Employee name and department already exist</p>');
                    $('[value="Add"]').css('display', 'none');
                    $('[value="Cancel"]').css('display', 'none');
                }

            },
            error: function (err) {
                alert('error');
            }
        });
    }
    // Fake Delete Data
    $('#deleteData').on('click', function () {
      $.ajax({
          url: 'api/delete.php',
          type: 'POST',
          success: function (data) {
              if(JSON.parse(data).success){
                  $('#delBody').html('');
                  $('#delBody').html('<p>Data Deleted Successfully</p>');
              } else {
                  $('#delBody').html('');
                  $('#delBody').html('<p>Failed to Delete Data</p>');
              }

          },
          error: function (err) {
              alert('error');
          }
      });
    });
    // Update Emp
    function updateEmployee() {
        $.ajax({
            url: 'api/read_employee_only.php',
            type: 'POST',
            success: function (data) {
                var parsedEmpData = JSON.parse(data);
                console.log(parsedEmpData);
                $('#employee-options').html('');
                var emp_optionshtml = ``;
                for (const key in parsedEmpData.data) {
                    if (parsedEmpData.data.hasOwnProperty(key)) {
                        // console.log(parsedEmpData.data[key]);
                        emp_optionshtml += `<option data-dept-id="${parsedEmpData.data[key].department_id}" value="${parsedEmpData.data[key].id}">${parsedEmpData.data[key].name}</option>`;
                    }
                }
                $('#employee-options').html(emp_optionshtml);


                $('#updateEmployee').on('click', function () {
                    var sendData = $('[name="updateEmp"]').serialize();
                    $.ajax({
                        url: 'api/update.php?' + sendData,
                        type: 'POST',
                        success: function (data) {
                            if(JSON.parse(data).success){
                                $('#updateEmpBody').html('');
                                $('#updateEmpBody').html('<p>Additional Data Successfully</p>');
                            } else {
                                $('#updateEmpBody').html('');
                                $('#updateEmpBody').html('<p>Failed to Add Additional Data</p>');
                            }

                        },
                        error: function (err) {
                            alert('error');
                        }
                    });
                });

            },
            error: function(err){
                alert('error');
            }
        });
        $("#updateEmployeeModal").modal();
    }


    // Search EMP
    $('#empsearchbtn').on('click', function () {
      var queryQ = $('[name="empsearch"]').serialize();
        $.ajax({
            url: 'api/search.php?' + queryQ,
            type: 'POST',
            success: function (data) {
                // console.log(data)
                var parsedDataS = JSON.parse(data);
                $('#dataWrapper').html('');
                var searchhtmlbuilder = ``;
                for (const key in parsedDataS.data) {
                    if (parsedDataS.data.hasOwnProperty(key)) {

                        searchhtmlbuilder += `<tr>
                            <td>${parsedDataS.data[key].id}</td>
                            <td>${parsedDataS.data[key].name}</td>
                            <td>${parsedDataS.data[key].department_name}</td>
                            <td>${parsedDataS.data[key].contact}</td>
                            <td>${parsedDataS.data[key].address}</td>
                          </tr>`;
                    }
                }
                $('#dataWrapper').html(searchhtmlbuilder);


            },
            error: function (err) {
                alert('error');
            }
        });
    });







    // Calling Functions on clicks
    $('#addEmployee').on('click', function () {
        insertEmployee();
    });
    $('#insert_employee_modal').on('click', function () {
        get_departments();
    });
    $('#update_employee_modal').on('click', function () {
        updateEmployee();
    });


    </script>
 </body>
</html>