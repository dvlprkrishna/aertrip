console.log('hit')
function addEmployee() {
    var sendData = $('[name="addEmp"]').serialize();
    console.log(sendData);
    // $.ajax({
    //     url: 'api/create.php?name=Krishna%20sahu&department=INCOME%20TAX%20DEPARTMENT&contact=9820839348&address=DD' + sendData,
    //     type: 'POST',
    //     success: function () {
    //         $('#addEmpBody').html('');
    //         $('#addEmpBody').html('<p>Employee Data Added Successfully</p>');
    //         $('[value="Add"]').css('display', 'none');
    //         $('[value="Cancel"]').css('display', 'none');
    //         location.href = location.href;
    //     },
    //     error: function () {
    //         alert('error');
    //     }
    // });
}