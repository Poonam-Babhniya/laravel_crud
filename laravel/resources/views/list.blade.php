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
					<a href="{{'firs/add'}}" class="btn btn-primary">ADD</a>
				</div>
				@if (Session::has('msg'))
				<div class="col-md-12">
					<div class="alret alret-success">{{Session::get('msg')}}</div>
				</div>
				@endif
				@if (Session::has('errorMsg'))
				<div class="col-md-12">
					<div class="alret alret-danger">{{Session::get('errorMsg')}}</div>
				</div>
				@endif
			
			
			</div>
			<div class="col-md-12">
				<div class="card">
				<div class="card-header"><h5>Fir/List</h5></div>
				<div class="card-body">
					<table class="table">
						<thead class="thead-dark bg-dark text-white">
						<tr>
							<th>ID</th>
							<th>ComplaineeName</th>
							<th>MobileNo.</th>
							<th>Address</th>
							<th>ComplaintAgainstName</th>
							<th>ComplaintAgainstMobileNo.</th>
							<th>Created</th>
							<th width="100">EDIT</th>
							<th width="100">DELETE</th>
						</tr>
						</thead>
						@if($firs)
						  @foreach($firs as $fir)
						<tr>
							<td>{{$fir->id}}</td>
							<td>{{$fir->cname}}</td>
							<td>{{$fir->mno}}</td>
							<td>{{$fir->address}}</td>
							<td>{{$fir->caname}}</td>
							<td>{{$fir->cano}}</td>
							<td>{{$fir->created_at}}</td>
							<td><a href="{{url('firs/edit/'.$fir->id)}}" class="btn btn-primary">Edit</a></td>
							<td><a href="#" onclick="deleteFir({{$fir->id}});" class="btn btn-danger">Delete</a></td>
						</tr>
						 @endforeach
						@else
						<tr>
							<td colspan="6">Fir not added yet.</td>
						</tr>
						@endif

					
					</table>
				
				</div>
			   </div>
			</div>
			
	</div>



</body>
</html>
<script type="text/javascript">
	function deleteFir(id){
		if(confirm('Are u sure you want to delete?')){
			window.location.href='{{url('firs/delete')}}/'+id;
		}
	}
</script>
