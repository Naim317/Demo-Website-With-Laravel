//For Services Table
function getCoursesData() {
    axios.get('/getCoursesData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivCourse').removeClass('d-none');
                $('#loaderDivCourse').addClass('d-none');

                $('#courses_table').empty();


                var jsonData = response.data;

                $.each(jsonData, function(i, item) {
                    $('<tr>').html(

                        "<td> " + jsonData[i].course_name + "</td>" +
                        "<td> " + jsonData[i].course_fee + "</td>" +
                        "<td> " + jsonData[i].course_totalclass + "</td>" +
                        "<td> " + jsonData[i].course_totalenroll + "</td>" +
                        "<td><a class='courseViewDetailsBtn'  data-id=" + jsonData[i].id + " ><i  class='fas fa-eye'></i></a></td>" +
                        "<td><a class='courseEditBtn'  data-id=" + jsonData[i].id + " ><i  class='fas fa-edit'></i></a></td>" +
                        "<td><a class='courseDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></td>"

                    ).appendTo('#courses_table');
                });

             
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
