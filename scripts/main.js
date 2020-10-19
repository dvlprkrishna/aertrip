window.addEventListener('load', function () {
    console.log('Loaded');
    // Fetch initial data list
    $.ajax({
        url: 'api/read.php',
        type: 'POST',
        success: function (data) {
            console.log(data)
            var parsedData = JSON.parse(data);
            $('#dataWrapper').html('');
            var dataWrapperHTML = ``;
            for (const key in parsedData.data) {
                if (parsedData.data.hasOwnProperty(key)) {
                    console.log(parsedData.data[key]);
                    dataWrapperHTML += `<tr>
                         <td>${parsedData.data[key].id}</td>
                         <td>${parsedData.data[key].name}</td>
                         <td>${parsedData.data[key].department_name}</td>
                         <td>${parsedData.data[key].contact}</td>
                         <td>${parsedData.data[key].address}</td>
                         <td id="${parsedData.data[key].id}">
                            <a onclick="updateEmployee(${parsedData.data[key].id})" type="button"  class="edit"
                                data-id="${parsedData.data[key].id}" data-dept="${parsedData.data[key].department_name}">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a onclick="" type="button" class="deleteInv"   data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
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
                $('#dept-options').html('');
                var dept_optionshtml = ``;
                for (const key in parsedDeptData.data) {
                    if (parsedDeptData.data.hasOwnProperty(key)) {
                        console.log(parsedDeptData.data[key]);
                        dept_optionshtml += `<option value="${parsedDeptData.data[key].id}">${parsedDeptData.data[key].department_name}</option>`;
                    }
                }
                $('#dept-options').html(dept_optionshtml);
                $('#dept-options').prepend(`<option selected disabled>Select Department</option>`);
            },
            error: function (err) {
                alert(err);
            }
        });
    }
    // Insert New Employees
    function insertEmployee() {
        var sendData = $('[name="addEmp"]').serialize();
        console.log(sendData);
        $.ajax({
            url: 'api/create.php?' + sendData,
            type: 'POST',
            success: function (data) {
                // console.log(JSON.parse(data))
                $('#addEmpBody').html('');
                $('#addEmpBody').html('<p>Data Added Successfully</p>');
                $('[value="Add"]').css('display', 'none');
                $('[value="Cancel"]').css('display', 'none');
            },
            error: function (err) {
                alert('error');
            }
        });
    }

    function updateEmployee(id) {
        console.log(id);
    }

    // Calling Functions on clicks
    $('#addEmployee').on('click', function () {
        insertEmployee();
    });
    $('#insert_employee_modal').on('click', function () {
        get_departments();
    });

});