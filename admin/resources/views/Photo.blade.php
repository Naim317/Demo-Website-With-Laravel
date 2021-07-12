@extends('Layout.app')
@section('title','Photos')

@section('content')

<div id="mainDivAddPhoto" class="container">
<div class="row">
<div class="col-md-12 ">

<button id="addNewPhotoBtnID" class="btn btn-sm btn-primary btn-lg ">Add New Photo </button> 

</div>
</div>
</div>


<div  class="container-fluid">
<div class="row photoRow text-center">



</div>
<button  id="LoadMoreBtnID" class="btn btn-success btn-sm float-right">Load more>>></button>
</div>



<!--AddPhotoModal -->
<div
  class="modal fade ml-5 mt-3"
  id="AddPhotoModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body text-center p-3"> <h5 class="m-3">Add New Photo...</h5>
      <h5 id="PhotoAddID" class="m-3  d-none"></h5>
      </div>
          <div class="modal-body">
              <input class="form-control" id="imgInput" type="file" >
              <img class="imgPreview mt-2" id="imgPreview" src="{{asset('images/default_img.jpg')}} " >
          </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
          Close
        </button>
        <button data-id =" " id="PhotoSaveConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')


<script type="text/javascript">


$('#addNewPhotoBtnID').click(function(){
    $('#AddPhotoModal').modal('show');

})

$('#imgInput').change(function(){
    var reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function(event){
        var imgSource = event.target.result;
        $('#imgPreview').attr('src',imgSource)
    }
})

$('#PhotoSaveConfirmBtn').on('click',function(){



  $('#PhotoSaveConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

  var PhotoFile = $('#imgInput').prop('files')[0];
  var formData = new FormData();
  formData.append("photo", PhotoFile);

  axios.post("/PhotoUpload",formData).then(function(response){
    if(response.status==200){
                if (response.data == 1) {
                    $('#AddPhotoModal').modal('hide');
                    toastr.success('Successfully Uploaded');
                    $('#PhotoSaveConfirmBtn').html("Save");
                    window.location.href = "/Photo";
                    
    
                }
                 else {
                    $('#AddPhotoModal').modal('hide');
                    toastr.error('Upload  Failed');    
    
                }

            }

  }).catch(function(error){
    $('#AddPhotoModal').modal('hide');
    toastr.error('Add Failed');
    $('#PhotoSaveConfirmBtn').html("Save");

  })
})

photoLoad();

function photoLoad(){

  axios.get('/PhotoJsonData').then(function(response){

    $.each(response.data, function(i, item) {
                    $("<div class='col-md-3 p-1'>").html(
                      "<img data-id="+item['id']+" class='imgShow' src="+item['location']+" >" +
                      "<button data-id="+item['id']+" data-photo="+item['location']+" class='btn deletePhotoBtn btn-danger btn-sm'>Delete</button>" 

                    ).appendTo('.photoRow');

                    })
                    $('.deletePhotoBtn').on('click', function(event){
                      
                      let id = $(this).data('id');
                      let photo = $(this).data('photo');
                      photoDelete(photo,id);
                      event.preventDefault();
                })

  }).catch(function(error){


  })

}

var ImgID = 0;

function loadByID(FirstImgID,loadMoreBtn){
  ImgID = ImgID + 8;
  let FinalImgID = ImgID + FirstImgID;
  let URL = "/photoJsonDataByID/" + FinalImgID;

  loadMoreBtn.html("<div class='spinner-border spinner-border-sm' role='status'></div>") ; //Animation
  axios.post(URL).then(function(response){
    loadMoreBtn.html("Load More...");

$.each(response.data, function(i, item) {
                $("<div class='col-md-3 p-1'>").html(
                  "<img data-id="+item['id']+" class='imgShow' src="+item['location']+" >" +
                  "<button data-id="+item['id']+" data-photo="+item['location']+" class='btn deletePhotoBtn btn-danger btn-sm'>Delete</button>" 

                ).appendTo('.photoRow');
            })


}).catch(function(error){


})




}

$('#LoadMoreBtnID').on('click', function(){
  let loadMoreBtn = $(this);
  let FirstImgID = $(this).closest('div').find('img').data('id');
  
  loadByID(FirstImgID,loadMoreBtn);

})


function photoDelete(location,id){
  let URL = "/photoDelete";
  let MyFormData = new FormData();
  
  MyFormData.append('location',location);
  MyFormData.append('id',id);


  axios.post(URL,MyFormData).then(function(response){
    if(response.status==200 && response.data==1){
      toastr.success('Delete Successfully');
      window.location.href = "/Photo";
      

    }
    
    else{
      toastr.error('Delete Failed');
    
    }

  }).catch(function(error){
    toastr.error('Delete Failed!!!');
   


  })

}

 



</script>

@endsection
