<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel 8.0 CRUD Application</title>
        <link rel="stylesheet" href="{{'assets/css/bootstrap.css'}}">
    </head>
<body class="bg-light">
	<div class="p-3 mb-2 bg-dark text-white">
		<div class="container">
			<div class="h3">Laravel 8.0 CRUD Application</div>
		</div>
	</div>
	<div class="container">
			<div class="row">
				<div class="col-md-12 mb-3" style="margin-left: 639px;">
					<a href="{{url('articles')}}" class="btn btn-primary">BACK</a>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
				<div class="card-header"><h5>Edit/List</h5></div>
				<div class="card-body">
					<form action="{{url('articles/edit/'.$article->id)}}" method="post" name="addArticle" id="addArticle">
						@csrf
						<div class="form-group">
							<lable for="">Name</lable>
							<input type="text" name="name" id="name" value="{{old('name',$article->name)}}" class="form-control">
							@if($errors->any())
							<p>{{$errors->first('name')}}</p>
							@endif
						</div>
						<div class="form-group">
							<lable for="">Description</lable>
							<input type="text" name="description" id="description" value="{{old('description',$article->description)}}" class="form-control">
							@if($errors->any())
							<p>{{$errors->first('description')}}</p>
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
