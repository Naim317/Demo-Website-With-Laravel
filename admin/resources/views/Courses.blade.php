@extends('Layout.app')

@section('content')



<div id="mainDivCourse" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addNewCourseBtnID" class="btn btn-sm btn-danger my-3">Add New Course </button> 

<table id="CourseTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Course Name</th>
	  <th class="th-sm">Course Fee</th>
	  <th class="th-sm">Total Class</th>
	  <th class="th-sm">Total Enroll</th>
      <th class="th-sm">Edit</th>
      <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="courses_table">
  

  </tbody>
</table>

</div>
</div>
</div>


<div id="loaderDivCourse" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">

</div>
</div>
</div>


<div id="wrongDivCourse" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3 class="m-5">Something Went Wrong!!!</h3>

</div>
</div>
</div>




<!-- AddCourseModal -->


<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header  text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
      <h5 class="modal-title mb-3">Add New Course</h5>
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="CourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="CourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="CourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
     			<input id="CourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="CourseClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
     			<input id="CourseLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
     			<input id="CourseImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- DeleteModal -->
<div
  class="modal fade"
  id="deleteCourseModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body text-center p-3"> <h5 class="m-3">Do you want to Delete??</h5>
      <h5 id="CourseDeleteID" class="m-3  d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
          No
        </button>
        <button data-id =" " id="CourseDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- Edit/UpdateModal -->

<div class="modal fade" id="EditCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content  text-center">
    <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center" >
      <h5 class="modal-title mb-3">Edit Course Details</h5>
      <h5 id="CourseEditID" class="m-3 d-none"></h5>
       <div class="container  d-none w-100" id="CourseEditForm">
       	<div class="row ">
       		<div class="col-md-6">
             	<input name="course_name" id="EditCourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
          	 	<input name="course_des" id="EditCourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
    		 	<input name="course_fee" id="EditCourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
     			<input name="course_totalenroll" id="EditCourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input name="course_totalclass" id="EditCourseClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
     			<input name="course_link" id="EditCourseLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
     			<input name="course_img" id="EditCourseImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      <img id="CourseEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
    <h5 id="CourseEditWrong" class="m-3 d-none">Something Went Wrong!!!</h5>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="EditCourseConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')

<script type="text/javascript">

getCoursesData()


//For Course Table
function getCoursesData() {
    axios.get('/getCoursesData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivCourse').removeClass('d-none');
                $('#loaderDivCourse').addClass('d-none');

                $('#CourseTableID').DataTable().destroy();
                $('#courses_table').empty();



                var jsonData = response.data;

                $.each(jsonData, function(i, item) {
                    $('<tr>').html(

                        "<td> " + jsonData[i].course_name + "</td>" +
                        "<td> " + jsonData[i].course_fee + "</td>" +
                        "<td> " + jsonData[i].course_totalclass + "</td>" +
                        "<td> " + jsonData[i].course_totalenroll + "</td>" +
                        "<td><a class='courseEditBtn'  data-id=" + jsonData[i].id + " ><i  class='fas fa-edit'></i></a></td>" +
                        "<td><a class='courseDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></td>"

                    ).appendTo('#courses_table');
                });
                //Course table delete btn modal open
                $('.courseDeleteBtn').click(function(){
                    var id = $(this).data('id');
                    $('#CourseDeleteID').html(id);
                    $('#deleteCourseModal').modal('show');

                })


                //Course Table edit btn modal open
                $('.courseEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#CourseEditID').html(id);
                    CourseUpdateDetails(id)
                    $('#EditCourseModal').modal('show');
                })
                $('#CourseTableID').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');

             
            } else {

                $('#loaderDivCourse').addClass('d-none');
                $('#wrongDivCourse').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#loaderDivCourse').addClass('d-none');
            $('#wrongDivCourse').removeClass('d-none');

        });
}



//Course add new button click

$('#addNewCourseBtnID').click(function(){
    $('#addCourseModal').modal('show');

})


 //Courses TableAdd New Course Btn Icon in Modal

 $('#CourseAddConfirmBtn').click(function() {
    var course_name = $('#CourseNameId').val();
    var course_des = $('#CourseDesId').val();
    var course_fee = $('#CourseFeeId').val();
    var course_totalenroll = $('#CourseEnrollId').val();
    var course_totalclass = $('#CourseClassId').val();
    var course_link = $('#CourseLinkId').val();
    var course_img = $('#CourseImgId').val();
    CourseAdd(course_name,course_des,course_fee,course_totalenroll,course_totalclass,course_link,course_img);


})




//Course add method

function CourseAdd(CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg) {
   
    if(CourseName.length==0){
        toastr.error('Course Name is Empty');
        
    }

    else if(CourseDes.length==0){
        toastr.error('Course Description is Empty');
        
    }
    else if(CourseFee.length==0){
        toastr.error('Course Fee is Empty');
        
    }
    else if(CourseEnroll.length==0){
        toastr.error('Course Enroll is Empty');
        
    }
    else if(CourseClass.length==0){
        toastr.error('Course Class is Empty');
        
    }
    else if(CourseLink.length==0){
        toastr.error('Course Link is Empty');
        
    }

    else if(CourseImg.length==0){
        toastr.error('Course Image is Empty');
        
    }

    else{
        $('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation

        axios.post('/coursesAdd', {
            course_name: CourseName,
            course_des: CourseDes,
            course_fee: CourseFee,
            course_totalenroll: CourseEnroll,
            course_totalclass: CourseClass,
            course_link: CourseLink,
            course_img: CourseImg 
        })
        .then(function(response) {
            $('#CourseAddConfirmBtn').html("Save")
            if(response.status==200){
                if (response.data == 1) {
                    $('#addCourseModal').modal('hide');
                    toastr.success('Add Successful');
                    getCoursesData();
    
                } else {
                    $('#addCourseModal').modal('hide');
                    toastr.success('Nothing Added!!!');
                    getCoursesData();
    
                }

            }
            else{
                $('#addCourseModal').modal('hide');
                toastr.error('Something Went Wrong!!!');

            }
           

        })
        .catch(function(error) {
            $('#addCourseModal').modal('hide');
            toastr.error('Something Went Wrong!!!');
          

        });

    }


}



//Course Table Delete Btn Icon modal

$('#CourseDeleteConfirmBtn').click(function() {
    var id = $('#CourseDeleteID').html();
    CourseDataDelete(id);


})



//Course Delete

function CourseDataDelete(deleteId) {
    $('#CourseDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation
    axios.post('/CoursesDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#CourseDeleteConfirmBtn').html("Yes")
            if(response.status==200){
                if (response.data == 1) {
                    $('#deleteCourseModal').modal('hide');
                    toastr.success('Delete Successful');
                    getCoursesData();
    
                } else {
                    $('#deleteCourseModal').modal('hide');
                    toastr.error('Delete Failed');
                    getCoursesData();
    
                }

            }
            else{
                $('#deleteCourseModal').modal('hide');
                toastr.error('Something went wrong!!!');

            }
         

        })
        .catch(function(error) {
            $('#deleteCourseModal').modal('hide');
            toastr.error('Something went wrong!!!');



        });

}






//Each Course Edit/Update Details

function CourseUpdateDetails(detailsId) {
   
    axios.post('/CoursesDetails', {
            id: detailsId
        })
        .then(function(response) {
            if (response.status == 200){
                $('#CourseEditForm').removeClass('d-none');
                $('#CourseEditLoader').addClass('d-none');

                var jsonData = response.data;
                $('#EditCourseNameId').val(jsonData[0].course_name)
                $('#EditCourseDesId').val(jsonData[0].course_des)
                $('#EditCourseFeeId').val(jsonData[0].course_fee)
                $('#EditCourseEnrollId').val(jsonData[0].course_totalenroll)
                $('#EditCourseClassId').val(jsonData[0].course_totalclass)
                $('#EditCourseLinkId').val(jsonData[0].course_link)
                $('#EditCourseImgId').val(jsonData[0].course_img)


            }
            else{
                $('#CourseEditLoader').addClass('d-none');
                $('#CourseEditWrong').removeClass('d-none');
            }


        

        })
        .catch(function(error) {
            $('#CourseEditLoader').addClass('d-none');
            $('#CourseEditWrong').removeClass('d-none');

        });

}

 //Services Table Edit/Update Btn Icon in Modal or Update Btn

 $('#EditCourseConfirmBtn').click(function() {
    var id = $('#CourseEditID').html();
    var name = $('#EditCourseNameId').val();
    var des = $('#EditCourseDesId').val();
    var fee = $('#EditCourseFeeId').val();
    var enroll = $('#EditCourseEnrollId').val();
    var classId = $('#EditCourseClassId').val();
    var link = $('#EditCourseLinkId').val();
    var img = $('#EditCourseImgId').val();
    CourseUpdate(id,name,des,fee,enroll,classId,link,img);


})

//Course Update

function CourseUpdate(CourseId,CourseName,CourseDes,CourseFee,CourseEnroll,CourseClassId,CourseLink,CourseImg) {
   
    if(CourseName.length==0){
        toastr.error('Service Name is Empty');
        
    }

    else if(CourseDes.length==0){
        toastr.error('Service Description is Empty');
        
    }
    else if(CourseFee.length==0){
        toastr.error('Service Fee is Empty');
        
    }
    else if(CourseEnroll.length==0){
        toastr.error('Service Enroll is Empty');
        
    }
    else if(CourseClassId.length==0){
        toastr.error('Service Class is Empty');
        
    }
    else if(CourseLink.length==0){
        toastr.error('Service Link is Empty');
        
    }

    else if(CourseImg.length==0){
        toastr.error('Service Image is Empty');
        
    }

    else{
        $('#EditCourseConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation

        axios.post('/coursesUpdate', {
            id: CourseId,
            course_name: CourseName,
            course_des: CourseDes,
            course_fee: CourseFee,
            course_totalenroll: CourseEnroll,
            course_totalclass: CourseClassId,
            course_link: CourseLink,
            course_img: CourseImg
        })
        .then(function(response) {
            $('#EditCourseConfirmBtn').html("Save")
            if(response.status==200){
                if (response.data == 1) {
                    $('#EditCourseModal').modal('hide');
                    toastr.success('Update Successful');
                    getCoursesData();
    
                } else {
                    $('#EditCourseModal').modal('hide');
                    toastr.success('No Changes!!!');
                    getCoursesData();
    
                }

            }
            else{
                $('#EditCourseModal').modal('hide');
                toastr.error('Something Went Wrong!!!');

            }
           

        })
        .catch(function(error) {
            $('#EditCourseModal').modal('hide');
            toastr.error('Something Went vry  Wrong!!!');
          

        });

    }


}











</script>

@endsection