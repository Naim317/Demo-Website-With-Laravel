@extends('Layout.Login')

@section('title','Login')

@section('content')

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3 class="text-center">Sign In</h3>
			
			</div>
			<div class="card-body">
				<form action=" " method="post" class="loginForm">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input required="" name="userName" value="" type="text" class="form-control " placeholder="Enter Username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text mb-3"><i class="fas fa-key"></i></span>
						</div>
						<input required="" name="userPass" value="" type="password" class="form-control mb-3 " placeholder="Enter Password">
					</div>
				
					<div class="form-group">
						<button name ="submit" type="submit" class="btn btn-block login_btn">Login</button>
					</div>
				</form>
			</div>
		
		</div>
	</div>
</div>

@endsection

@section('script')

<script type="text/javascript">

$('.loginForm').on('submit',function(event){
    event.preventDefault();
    let formData = $(this).serializeArray();
    let userName = formData[0]['value'];
    let userPass = formData[1]['value'];
    let url = "/onLogin";
    
    axios.post(url,{
        username:userName,
        password:userPass
    }).then(function(response){
        if(response.status==200 && response.data==1){
            window.location.href ="/" ;
            

        }

        else{
            toastr.error('Login Fail!!! Try again');

        }


    }).catch(function(error){
        toastr.error('Login Failed!!! Try again');


    })

})



</script>

@endsection