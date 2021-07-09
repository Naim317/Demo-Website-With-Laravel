@extends('Layout.app')
@section('title','Photos')

@section('content')

<div id="mainDivAddPhoto" class="container">
<div class="row">
<div class="col-md-12 p-3">

<button id="addNewPhotoBtnID" class="btn btn-sm btn-Danger ">Add New Photo </button> 

</div>
</div>
</div>



<!--AddPhotoModal -->
<div
  class="modal fade ml-5 mt-5"
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
        <button data-id =" " id="PhotoAddConfirmBtn" type="button" class="btn btn-sm btn-danger">Save</button>
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
 



</script>

@endsection
