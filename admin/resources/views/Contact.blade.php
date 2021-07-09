@extends('Layout.app')
@section('title','Contact')

@section('content')



<div id="mainDivContact" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">


<table id="ContactTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">Name</th>
      <th class="th-sm">Mobile</th>
      <th class="th-sm">Email</th>
      <th class="th-sm">Message</th>
      <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="contact_table">
  

  </tbody>
</table>

</div>
</div>
</div>


<div id="loaderDivContact" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">

</div>
</div>
</div>


<div id="wrongDivContact" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3 class="m-5">Something Went Wrong!!!</h3>

</div>
</div>
</div>


<!-- DeleteModal -->
<div
  class="modal fade"
  id="deleteContactModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body text-center p-3"> <h5 class="m-3">Do you want to Delete??</h5>
      <h5 id="ContactDeleteID" class="m-3  d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
          No
        </button>
        <button data-id =" " id="ContactDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')

<script type="text/javascript">

getContactData()


//For Contact Table
function getContactData() {
    axios.get('/getContactData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivContact').removeClass('d-none');
                $('#loaderDivContact').addClass('d-none');

                $('#ContactTableID').DataTable().destroy();
                $('#contact_table').empty();



                var jsonData = response.data;

                $.each(jsonData, function(i, item) {
                    $('<tr>').html(

                        "<td> " + jsonData[i].contact_name + "</td>" +
                        "<td> " + jsonData[i].contact_mobile + "</td>" +
                        "<td> " + jsonData[i].contact_email + "</td>" +
                        "<td> " + jsonData[i].contact_msg + "</td>" +
                        "<td><a class='contactDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></td>"

                    ).appendTo('#contact_table');
                });
                //contact table delete btn modal open
                $('.contactDeleteBtn').click(function(){
                    var id = $(this).data('id');
                    $('#ContactDeleteID').html(id);
                    $('#deleteContactModal').modal('show');

                })
                $('#ContactTableID').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');


            } else {

                $('#loaderDivContact').addClass('d-none');
                $('#wrongDivContact').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#loaderDivContact').addClass('d-none');
            $('#wrongDivContact').removeClass('d-none');

        });
}



//Contact Table Delete Btn Icon modal

$('#ContactDeleteConfirmBtn').click(function() {
    var id = $('#ContactDeleteID').html();
    ContactDataDelete(id);


})



//Contact Delete

function ContactDataDelete(deleteId) {
    $('#ContactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation
    axios.post('/ContactDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#ContactDeleteConfirmBtn').html("Yes")
            if(response.status==200){
                if (response.data == 1) {
                    $('#deleteContactModal').modal('hide');
                    toastr.success('Delete Successful');
                    getContactData();
    
                } else {
                    $('#deleteContactModal').modal('hide');
                    toastr.error('Delete Failed');
                    getContactData();
    
                }

            }
            else{
                $('#deleteContactModal').modal('hide');
                toastr.error('Something went wrong!!!');

            }
         

        })
        .catch(function(error) {
            $('#deleteContactModal').modal('hide');
            toastr.error('Something went wrong!!!');



        });

}

</script>

@endsection