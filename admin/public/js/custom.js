//VisitorTable

$(document).ready(function() {
    $('#VisitorDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

//For Services Table
function getServicesData() {
    axios.get('/getServicesData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');

                $('#service_table').empty();


                var jsonData = response.data;

                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td><img class='table-img' src=" + jsonData[i].service_img + "></td>" +
                        "<td>> " + jsonData[i].service_name + "</td>" +
                        "<td>" + jsonData[i].service_des + "</td>" +
                        "<td><a class='ServiceEditBtn'  data-id=" + jsonData[i].id + " ><i  class='fas fa-edit'></i></a></td>" +
                        "<td><a class='ServiceDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></td>"

                    ).appendTo('#service_table');
                });

                //Services Table Delete Btn Icon

                $('.ServiceDeleteBtn').click(function() {

                    var id = $(this).data('id');
                    $('#ServiceDeleteID').html(id);
                    $('#deleteModal').modal('show');
                })

                //Services Table Delete Btn Icon modal

                $('#ServiceDeleteConfirmBtn').click(function() {
                    var id = $('#ServiceDeleteID').html();
                    ServicesDataDelete(id);


                })

                //Services Table Delete Btn Icon
                $('.ServiceEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#ServiceEditID').html(id);

                    $('#editModal').modal('show');
                })





            } else {

                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        });
}

////Services Delete

function ServicesDataDelete(deleteId) {
    axios.post('/serviceDelete', {
            id: deleteId
        })
        .then(function(response) {
            if (response.data == 1) {
                $('#deleteModal').modal('hide');
                toastr.success('Delete Successful');
                getServicesData();

            } else {
                $('#deleteModal').modal('hide');
                toastr.error('Delete Failed');
                getServicesData();

            }

        })
        .catch(function(error) {



        });

}