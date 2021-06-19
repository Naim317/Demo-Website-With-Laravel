@extends('Layout.app')

@section('content')

<div id="mainDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addNewBtnID" class="btn btn-sm btn-danger my-3">Add New Service </button> 



<table id="ServiceTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
      <th class="th-sm">Name</th>
      <th class="th-sm">Description</th>
      <th class="th-sm">Edit</th>
      <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="service_table">
  
  </tbody>
</table>

</div>
</div>
</div>


<div id="loaderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">

</div>
</div>
</div>


<div id="wrongDiv" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3 class="m-5">Something Went Wrong!!!</h3>

</div>
</div>
</div>


<!-- DeleteModal -->
<div
  class="modal fade"
  id="deleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body text-center p-3"> <h5 class="m-3">Do you want to Delete??</h5>
      <h5 id="ServiceDeleteID" class="m-3  d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
          No
        </button>
        <button data-id =" " id="ServiceDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>



<!-- Edit/UpdateModal -->

<div
  class="modal fade"
  id="editModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body text-center p-3"> 
      <h5 class="modal-title mb-3">Edit Service Details</h5>
      <h5 id="ServiceEditID" class="m-3  d-none"></h5>
      <div id="ServiceEditForm" class="d-none w-100">
      <input type="text" id="ServiceNameID" class="form-control mb-3" placeholder="Service Name" />
    <input type="text" id="ServiceDesID" class="form-control mb-3" placeholder="Service Description" />
    <input type="text" id="ServiceImgID" class="form-control mb-3" placeholder="Service Image Link" />
    </div>



    <img id="ServiceEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
    <h5 id="ServiceEditWrong" class="m-3 d-none">Something Went Wrong!!!</h5>

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
          Cancel
        </button>
        <button data-id =" " id="ServiceEditConfirmBtn" type="button" class="btn btn-sm btn-primary">Set</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->

<div
  class="modal fade"
  id="addModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body text-center p-3"> 
      <h6 class="mb-3">Add New Service</h6>
      
      <div id="ServiceAddForm" class="w-100">
      
      <input type="text" id="ServiceNameAddID" class="form-control mb-3" placeholder="Service Name" />
    <input type="text" id="ServiceDesAddID" class="form-control mb-3" placeholder="Service Description" />
    <input type="text" id="ServiceImgAddID" class="form-control mb-3" placeholder="Service Image Link" />
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
          Cancel
        </button>
        <button data-id =" " id="ServiceAddConfirmBtn" type="button" class="btn btn-sm btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>


                                                                                                      

@endsection

@section('script')

<script type="text/javascript">
getServicesData();

//For Services Table
function getServicesData() {
    axios.get('/getServicesData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');

                $('#ServiceTableID').DataTable().destroy();
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




                //Services Table Edit Btn Icon
                $('.ServiceEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#ServiceEditID').html(id);
                    ServicesUpdateDetails(id)
                    $('#editModal').modal('show');
                })
                $('#ServiceTableID').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');

        

            } else {

                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        });
}

//Services Table Delete Btn Icon modal

$('#ServiceDeleteConfirmBtn').click(function() {
    var id = $('#ServiceDeleteID').html();
    ServicesDataDelete(id);


})

 

//Services Delete

function ServicesDataDelete(deleteId) {
    $('#ServiceDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation
    axios.post('/serviceDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#ServiceDeleteConfirmBtn').html("Yes")
            if(response.status==200){
                if (response.data == 1) {
                    $('#deleteModal').modal('hide');
                    toastr.success('Delete Successful');
                    getServicesData();
    
                } else {
                    $('#deleteModal').modal('hide');
                    toastr.error('Delete Failed');
                    getServicesData();
    
                }

            }
            else{
                $('#deleteModal').modal('hide');
                toastr.error('Something went wrong!!!');

            }
         

        })
        .catch(function(error) {
            $('#deleteModal').modal('hide');
            toastr.error('Something went wrong!!!');



        });

}



//Each Services Update Details

function ServicesUpdateDetails(detailsId) {
   
    axios.post('/ServicesDetails', {
            id: detailsId
        })
        .then(function(response) {
            if (response.status == 200){
                $('#ServiceEditForm').removeClass('d-none');
                $('#ServiceEditLoader').addClass('d-none');

                var jsonData = response.data;
                $('#ServiceNameID').val(jsonData[0].service_name)
                $('#ServiceDesID').val(jsonData[0].service_des)
                $('#ServiceImgID').val(jsonData[0].service_img)


            }
            else{
                $('#ServiceEditLoader').addClass('d-none');
                $('#ServiceEditWrong').removeClass('d-none');
            }


        

        })
        .catch(function(error) {
            $('#ServiceEditLoader').addClass('d-none');
            $('#ServiceEditWrong').removeClass('d-none');

        });

}

 //Services Table Edit/Update Btn Icon in Modal or Update Btn

 $('#ServiceEditConfirmBtn').click(function() {
    var id = $('#ServiceEditID').html();
    var name = $('#ServiceNameID').val();
    var des = $('#ServiceDesID').val();
    var imgLink = $('#ServiceImgID').val();
    ServicesUpdate(id,name,des,imgLink)


})

//Services Update

function ServicesUpdate(serviceId,serviceName,serviceDes,serviceImg) {
   
    if(serviceName.length==0){
        toastr.error('Service Name is Empty');
        
    }

    else if(serviceDes.length==0){
        toastr.error('Service Description is Empty');
        
    }

    else if(serviceImg.length==0){
        toastr.error('Service Image is Empty');
        
    }

    else{
        $('#ServiceEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation

        axios.post('/ServicesUpdate', {
            id: serviceId,
            name: serviceName,
            des: serviceDes,
            imgLink: serviceImg,
        })
        .then(function(response) {
            $('#ServiceEditConfirmBtn').html("Set")
            if(response.status==200){
                if (response.data == 1) {
                    $('#editModal').modal('hide');
                    toastr.success('Update Successful');
                    getServicesData();
    
                } else {
                    $('#editModal').modal('hide');
                    toastr.success('No Changes!!!');
                    getServicesData();
    
                }

            }
            else{
                $('#editModal').modal('hide');
                toastr.error('Something Went Wrong!!!');

            }
           

        })
        .catch(function(error) {
            $('#editModal').modal('hide');
            toastr.error('Something Went Wrong!!!');
          

        });

    }


}

//Service add new button click

$('#addNewBtnID').click(function(){
    $('#addModal').modal('show')

})


 //Services TableAdd New Service Btn Icon in Modal

 $('#ServiceAddConfirmBtn').click(function() {
    var name = $('#ServiceNameAddID').val();
    var des = $('#ServiceDesAddID').val();
    var imgLink = $('#ServiceImgAddID').val();
    ServicesAdd(name,des,imgLink)


})




//Service add method

function ServicesAdd(serviceName,serviceDes,serviceImg) {
   
    if(serviceName.length==0){
        toastr.error('Service Name is Empty');
        
    }

    else if(serviceDes.length==0){
        toastr.error('Service Description is Empty');
        
    }

    else if(serviceImg.length==0){
        toastr.error('Service Image is Empty');
        
    }

    else{
        $('#ServiceAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation

        axios.post('/serviceAdd', {
            name: serviceName,
            des: serviceDes,
            imgLink: serviceImg,
        })
        .then(function(response) {
            $('#ServiceAddConfirmBtn').html("Add")
            if(response.status==200){
                if (response.data == 1) {
                    $('#addModal').modal('hide');
                    toastr.success('Add Successful');
                    getServicesData();
    
                } else {
                    $('#addModal').modal('hide');
                    toastr.success('Nothing Added!!!');
                    getServicesData();
    
                }

            }
            else{
                $('#addModal').modal('hide');
                toastr.error('Something Went Wrong!!!');

            }
           

        })
        .catch(function(error) {
            $('#addModal').modal('hide');
            toastr.error('Something Went Wrong!!!');
          

        });

    }


}




</script>

@endsection