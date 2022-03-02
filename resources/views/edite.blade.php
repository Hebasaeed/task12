<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>







    <div class="container">
        <h2>Update Account</h2>

        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ url('/update/'.$data->id) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <div class="form-group">
                <label for="exampleInputName">title</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="title"
                    placeholder="Enter title" value="{{ $data->title}}">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">content</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="text" placeholder="Enter content" value="{{ $data->content }}">
            </div>

            <div class="form-group">
                <label for="exampleInputSdate">startdate</label>
                <input type="date" class="form-control" id="exampleInputSdate"  required aria-describedby="" name="startdate" placeholder="Enter  start date" value="{{ $data->startdate }}">
            </div>


            <div class="form-group">
                <label for="exampleInputEdate">enddate</label>
                <input type="date" class="form-control" id="exampleInputEdate"  required aria-describedby="" name="enddate" placeholder="Enter  end date" value="{{ $data->enddate }}">
            </div>

            <div class="form-group">
                <label for="exampleInputimage">image </label>
                <input type="file" class="form-control" id="exampleInputimage" name="image" placeholder="image" value="{{ $data->image }}">
            </div>


            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>


    <br>






</body>

</html>
