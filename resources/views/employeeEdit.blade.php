<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <form action="{{ route('employee.update', $employee->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{$employee->name}}" placeholder="Enter Name" id="name">
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{$employee->email}}" placeholder="Enter email" id="email">
        </div>
        <div class="form-group mb-3">
            <label for="post">Post</label>
            <input type="text" name="post" class="form-control" value="{{$employee->post}}" placeholder="Enter Post" id="post">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Choose File</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
