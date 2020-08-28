<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
<div class="container my-5">
		<div class="row">
			<div class="col-md-8">
				<form method="post" action="">
            
				    <div class="form-group fieldGroup">
				        <div class="input-group">
				            <input type="text" name="username[]" class="form-control" placeholder="Enter Your Username"/>
				            <input type="text" name="email[]" class="form-control" placeholder="Enter Your email"/>
				            <input type="password" name="password[]" class="form-control" placeholder="Enter Your password"/>
				            <div class="input-group-addon ml-3"> 
				                <a href="javascript:void(0)" class="btn btn-success addMore"><i class="fas fa-plus"></i></a>
				            </div>
				        </div>
				    </div>
				    
				    <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Submit"/>				    
				</form>
				<div class="form-group fieldGroupCopy" style="display: none;">
				    <div class="input-group">
				        <input type="text" name="username[]" class="form-control" placeholder="Enter Your Username"/>
				        <input type="text" name="email[]" class="form-control" placeholder="Enter Your email"/>
				        <input type="password" name="password[]" class="form-control" placeholder="Enter Your password"/>
				        <div class="input-group-addon"> 
				            <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-trash"></i></a>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
	</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script>
		$(document).ready(function(){
    // membatasi jumlah inputan
    var maxGroup = 10;
    
    //melakukan proses multiple input 
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});
	</script>
	<?php
if(isset($_POST['submit'])){
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    if(!empty($uname)){
        for($a = 0; $a < count($uname); $a++){
            if(!empty($uname[$a])){
                $username = $uname[$a];
                $emails = $email[$a];
                $password = $pass[$a];
                
                //membuat insert data sementara
                echo 'Data ke -' .($a+1).'=> Nama: '.$username.'; Email: '.$emails.'; Password: '.$password.'</br>';
            }
        }
    }
}
?>