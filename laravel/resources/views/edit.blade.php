<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel 8.0 CRUD Application</title>
        <link rel="stylesheet" href="{{'assets/css/bootstrap.css'}}">
    </head>
<body class="bg-light">
	<div class="p-3 mb-2 bg-dark text-white">
		<div class="container">
			<div class="h3">Laravel 8.0 CRUD Application(FIR MODULE)</div>
		</div>
	</div>
	<div class="container">
			<div class="row">
				<div class="col-md-12 mb-3 text-right">
					<a href="{{url('firs')}}" class="btn btn-primary">Back</a>
				</div>
			
			</div>
			<div class="col-md-12">
				<div class="card">
				<div class="card-header"><h5>Fir/Edit</h5></div>
				<div class="card-body">
				    <form action="{{url('firs/edit/'.$fir->id)}}" method="post" name="addFir" id="addFir">
				    	@csrf
				    	<div class="form-group">
							<lable for="">ComplaineeName</lable>
							<input type="text" name="cname" id="cname" value="{{old('cname',$fir->cname)}}"  class="form-control">
							@if($errors->any())
							<p>{{$errors->first('cname')}}</p>
							@endif
						</div>
						<div class="form-group">
							<lable for="">MobileNo.</lable>
							<input type="text" name="mno" id="mno" value="{{old('mno',$fir->mno)}}"  class="form-control">
							@if($errors->any())
							<p>{{$errors->first('mno')}}</p>
							@endif
						</div>
						<div class="form-group">
							<lable for="">Address</lable>
				     <input type="text" name="address" id="address" value="{{old('address',$fir->address)}}"  class="form-control">
							@if($errors->any())
							<p>{{$errors->first('address')}}</p>
							@endif
						</div>
						<div class="form-group">
							<lable for="">ComplaintAgainstName</lable>
							<input type="text" name="caname" id="caname" value="{{old('caname',$fir->caname)}}"  class="form-control">
							@if($errors->any())
							<p>{{$errors->first('cname')}}</p>
							@endif
						</div>
						<div class="form-group">
							<lable for="">ComplaintAgainstMobileNo.</lable>
							<input type="text" name="cano" id="cano" value="{{old('cano',$fir->cano)}}"  class="form-control">
							@if($errors->any())
							<p>{{$errors->first('cano')}}</p>
							@endif
						</div>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary">Update</button>
						</div>
				    </form>
				
				</div>
			   </div>
			</div>
			
	</div>



</body>
</html>
