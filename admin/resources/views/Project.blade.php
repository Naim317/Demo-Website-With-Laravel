@extends('Layout.app')
@section('title','Project')

@section('content')



<div id="mainDivProject" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">

<button id="addNewProjectBtnID" class="btn btn-sm btn-danger my-3">Add New Project </button> 

<table id="ProjectTableID" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">Image</th>
      <th class="th-sm">Name</th>
      <th class="th-sm">Description</th>
      <th class="th-sm">Link</th>
      <th class="th-sm">Edit</th>
      <th class="th-sm">Delete</th>
  
    </tr>
  </thead>
  <tbody id="projects_table">
  

  </tbody>
</table>

</div>
</div>
</div>


<div id="loaderDivProject" class="container">
<div class="row">
<div class="col-md-12 text-center p-5">
<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">

</div>
</div>
</div>


<div id="wrongDivProject" class="container d-none">
<div class="row">
<div class="col-md-12 text-center p-5">
<h3 class="m-5">Something Went Wrong!!!</h3>

</div>
</div>
</div>




<!-- AddProjectModal -->


<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header  text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
      <h5 class="modal-title mb-3">Add New Project</h5>
       <div class="container">
       	<div class="row">
    
             	<input id="ProjectImgId" type="text" id="" class="form-control mb-3" placeholder="Project Image">
          	 	<input id="ProjectNameId" type="text" id="" class="form-control mb-3" placeholder="Project Name">
    		 	<input id="ProjectDesId" type="text" id="" class="form-control mb-3" placeholder="Project Description">
     			<input id="ProjectLinkId" type="text" id="" class="form-control mb-3" placeholder="Project Link">    
     		
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="ProjectAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- DeleteModal -->
<div
  class="modal fade"
  id="deleteProjectModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body text-center p-3"> <h5 class="m-3">Do you want to Delete??</h5>
      <h5 id="ProjectDeleteID" class="m-3  d-none"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
          No
        </button>
        <button data-id =" " id="ProjectDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- Edit/UpdateModal -->

<div class="modal fade" id="EditProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content  text-center">
    <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center" >
      <h5 class="modal-title mb-3">Edit Project Details</h5>
      <h5 id="ProjectEditID" class="m-3 d-none"></h5>
       <div class="container  d-none w-100" id="ProjectEditForm">
       	<div class="row ">
       		
                <input name="" id="EditProjectImgId" type="text" id="" class="form-control mb-3" placeholder="Project Image">
          	 	<input name="" id="EditProjectNameId" type="text" id="" class="form-control mb-3" placeholder="Project Name">
    		 	<input name="" id="EditProjectDesId" type="text" id="" class="form-control mb-3" placeholder="Project Description">
     			<input name="" id="EditProjectLinkId" type="text" id="" class="form-control mb-3" placeholder="Project Link">    
     		
       	</div>
       </div>
      </div>
      <img id="ProjectEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
    <h5 id="ProjectEditWrong" class="m-3 d-none">Something Went Wrong!!!</h5>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="EditProjectConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')

<script type="text/javascript">

getProjectsData()


//For Project Table
function getProjectsData() {
    axios.get('/getProjectsData')
        .then(function(response) {

            if (response.status == 200) {

                $('#mainDivProject').removeClass('d-none');
                $('#loaderDivProject').addClass('d-none');

                $('#ProjectTableID').DataTable().destroy();
                $('#projects_table').empty();



                var jsonData = response.data;

                $.each(jsonData, function(i, item) {
                    $('<tr>').html(

                        "<td> <img class='table-img' src=" + jsonData[i].project_img + "></td>" +
                        "<td> " + jsonData[i].project_name + "</td>" +
                        "<td> " + jsonData[i].project_des + "</td>" +
                        "<td> " + jsonData[i].project_link + "</td>" +
                        "<td><a class='projectEditBtn'  data-id=" + jsonData[i].id + " ><i  class='fas fa-edit'></i></a></td>" +
                        "<td><a class='projectDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></td>"

                    ).appendTo('#projects_table');
                });
                //Project table delete btn modal open
                $('.projectDeleteBtn').click(function(){
                    var id = $(this).data('id');
                    $('#ProjectDeleteID').html(id);
                    $('#deleteProjectModal').modal('show');

                })


                //Project Table edit btn modal open
                $('.projectEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#ProjectEditID').html(id);
                    ProjectUpdateDetails(id)
                    $('#EditProjectModal').modal('show');
                })
                $('#ProjectTableID').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');

             
            } else {

                $('#loaderDivProject').addClass('d-none');
                $('#wrongDivProject').removeClass('d-none');

            }

        }).catch(function(error) {
            $('#loaderDivProject').addClass('d-none');
            $('#wrongDivProject').removeClass('d-none');

        });
}



//Project add new button click

$('#addNewProjectBtnID').click(function(){
    $('#addProjectModal').modal('show');

})


 //Projects TableAdd New Project Btn Icon in Modal

 $('#ProjectAddConfirmBtn').click(function() {
    var project_img = $('#ProjectImgId').val();
    var project_name = $('#ProjectNameId').val();
    var project_des = $('#ProjectDesId').val();
    var project_link = $('#ProjectLinkId').val();
    ProjectAdd(project_img,project_name,project_des,project_link);


})




//Project add method

function ProjectAdd(ProjectImg,ProjectName,ProjectDes,ProjectLink) {
   
    if(ProjectName.length==0){
        toastr.error('Project Name is Empty');
        
    }

    else if(ProjectDes.length==0){
        toastr.error('Project Description is Empty');
        
    }
    else if(ProjectLink.length==0){
        toastr.error('Project Link is Empty');
        
    }

    else if(ProjectImg.length==0){
        toastr.error('Project Image is Empty');
        
    }

    else{
        $('#ProjectAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation

        axios.post('/ProjectsAdd', {
            project_img: ProjectImg,
            project_name: ProjectName,
            project_des: ProjectDes,
            project_link: ProjectLink
            
        })
        .then(function(response) {
            $('#ProjectAddConfirmBtn').html("Save")
            if(response.status==200){
                if (response.data == 1) {
                    $('#addProjectModal').modal('hide');
                    toastr.success('Add Successful');
                    getProjectsData();
    
                } else {
                    $('#addProjectModal').modal('hide');
                    toastr.success('Nothing Added!!!');
                    getProjectsData();
    
                }

            }
            else{
                $('#addProjectModal').modal('hide');
                toastr.error('Something Went Wrong!!!');

            }
           

        })
        .catch(function(error) {
            $('#addProjectModal').modal('hide');
            toastr.error('Something Went Wrong!!!');
          

        });

    }


}



//Project Table Delete Btn Icon modal

$('#ProjectDeleteConfirmBtn').click(function() {
    var id = $('#ProjectDeleteID').html();
    ProjectDataDelete(id);


})



//Project Delete

function ProjectDataDelete(deleteId) {
    $('#ProjectDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation
    axios.post('/ProjectsDelete', {
            id: deleteId
        })
        .then(function(response) {
            $('#ProjectDeleteConfirmBtn').html("Yes")
            if(response.status==200){
                if (response.data == 1) {
                    $('#deleteProjectModal').modal('hide');
                    toastr.success('Delete Successful');
                    getProjectsData();
    
                } else {
                    $('#deleteProjectModal').modal('hide');
                    toastr.error('Delete Failed');
                    getProjectsData();
    
                }

            }
            else{
                $('#deleteProjectModal').modal('hide');
                toastr.error('Something went wrong!!!');

            }
         

        })
        .catch(function(error) {
            $('#deleteProjectModal').modal('hide');
            toastr.error('Something went wrong!!!');



        });

}






//Each Project Edit/Update Details

function ProjectUpdateDetails(detailsId) {
   
    axios.post('/ProjectsDetails', {
            id: detailsId
        })
        .then(function(response) {
            if (response.status == 200){
                $('#ProjectEditForm').removeClass('d-none');
                $('#ProjectEditLoader').addClass('d-none');

                var jsonData = response.data;
                $('#EditProjectImgId').val(jsonData[0].project_img)
                $('#EditProjectNameId').val(jsonData[0].project_name)
                $('#EditProjectDesId').val(jsonData[0].project_des)
                $('#EditProjectLinkId').val(jsonData[0].project_link)
                


            }
            else{
                $('#ProjectEditLoader').addClass('d-none');
                $('#ProjectEditWrong').removeClass('d-none');
            }


        

        })
        .catch(function(error) {
            $('#ProjectEditLoader').addClass('d-none');
            $('#ProjectEditWrong').removeClass('d-none');

        });

}

 //Services Table Edit/Update Btn Icon in Modal or Update Btn

 $('#EditProjectConfirmBtn').click(function() {
    var id = $('#ProjectEditID').html();
    var img = $('#EditProjectImgId').val();
    var name = $('#EditProjectNameId').val();
    var des = $('#EditProjectDesId').val();
    var link = $('#EditProjectLinkId').val(); 
    ProjectUpdate(id,img,name,des,link);


})

//Project Update

function ProjectUpdate(ProjectId,ProjectImg,ProjectName,ProjectDes,ProjectLink) {
   
    if(ProjectImg.length==0){
        toastr.error('Service Name is Empty');
        
    }

    else if(ProjectName.length==0){
        toastr.error('Service Description is Empty');
        
    }
    else if(ProjectDes.length==0){
        toastr.error('Service Link is Empty');
        
    }

    else if(ProjectLink.length==0){
        toastr.error('Service Image is Empty');
        
    }

    else{
        $('#EditProjectConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")  //Animation

        axios.post('/ProjectsUpdate', {
            id: ProjectId,
            project_img: ProjectImg,
            project_name: ProjectName,
            project_des: ProjectDes,
            project_link: ProjectLink
            
        })
        .then(function(response) {
            $('#EditProjectConfirmBtn').html("Save")
            if(response.status==200){
                if (response.data == 1) {
                    $('#EditProjectModal').modal('hide');
                    toastr.success('Update Successful');
                    getProjectsData();
    
                } else {
                    $('#EditProjectModal').modal('hide');
                    toastr.success('No Changes!!!');
                    getProjectsData();
    
                }

            }
            else{
                $('#EditProjectModal').modal('hide');
                toastr.error('Something Went Wrong!!!');

            }
           

        })
        .catch(function(error) {
            $('#EditProjectModal').modal('hide');
            toastr.error('Something Went vry  Wrong!!!');
          

        });

    }


}











</script>

@endsection