@extends('Layout.app')
@section('title','Review')

@section('content')



<div id="mainDivReview" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">


<table id="ReviewTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">Image</th>
    <th class="th-sm">Name</th>
      <th class="th-sm">Des</th>
      <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="review_table">
  

  </tbody>
</table>

</div>
</div>
</div>


<div id="loaderDivReview" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">

</div>
</div>
</div>


<div id="wrongDivReview" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3 class="m-5">Something Went Wrong!!!</h3>

</div>
</div>
</div>


<!-- DeleteModal -->
<div
  class="modal fade"
  id="deleteReviewModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body text-center p-3"> <h5 class="m-3">Do you want to Delete??</h5>
      <h5 id="ReviewDeleteID" class="m-3  d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
          No
        </button>
        <button data-id =" " id="ReviewDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')

<script type="text/javascript">

getReviewData()


//For Review Table
function getReviewData() {
    axios.get('/getReviewData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivReview').removeClass('d-none');
                $('#loaderDivReview').addClass('d-none');

                $('#ReviewTableID').DataTable().destroy();
                $('#review_table').empty();



                var jsonData = response.data;

                $.each(jsonData, function(i, item) {
                    $('<tr>').html(

                        "<td> <img class='table-img' src=" + jsonData[i].img + "></td>" +
                        "<td> " + jsonData[i].name + "</td>" +
                        "<td> " + jsonData[i].des + "</td>" +
                        "<td><a class='ReviewDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></td>"

                    ).appendTo('#review_table');
                });
                //Review table delete btn modal open
                $('.ReviewDeleteBtn').click(function(){
                    var id = $(this).data('id');
                    $('#ReviewDeleteID').html(id);
                    $('#deleteReviewModal').modal('show');

                })
                $('#ReviewTableID').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');


            } else {

                $('#loaderDivReview').addClass('d-none');
                $('#wrongDivReview').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#loaderDivReview').addClass('d-none');
            $('#wrongDivReview').removeClass('d-none');

        });
}



//Review Table Delete Btn Icon modal

$('#ReviewDeleteConfirmBtn').click(function() {
    var id = $('#ReviewDeleteID').html();
    ReviewDataDelete(id);


})



//Review Delete

function ReviewDataDelete(deleteId) {
    $('#ReviewDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation
    axios.post('/ReviewDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#ReviewDeleteConfirmBtn').html("Yes")
            if(response.status==200){
                if (response.data == 1) {
                    $('#deleteReviewModal').modal('hide');
                    toastr.success('Delete Successful');
                    getReviewData();
    
                } else {
                    $('#deleteReviewModal').modal('hide');
                    toastr.error('Delete Failed');
                    getReviewData();
    
                }

            }
            else{
                $('#deleteReviewModal').modal('hide');
                toastr.error('Something went wrong!!!');

            }
         

        })
        .catch(function(error) {
            $('#deleteReviewModal').modal('hide');
            toastr.error('Something went wrong!!!');



        });

}

</script>

@endsection