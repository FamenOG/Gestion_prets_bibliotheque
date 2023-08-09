<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>

<body>
    @if($user->role_id==2)
    <div class="container w-50 my-5 shadow p-5 rounded-3">
        <h1 class="text-center">New category</h1>
        <form action="/create-category" method="post" class="my-4" id="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" data-parsley-required="true" name="name" value="{{ old('name') }}">
                </div>
                <button type="submit" class="btn btn-success">New category</button>
            </div>
        </form>
    </div>
    @endif
    <div class="container w-50 my-5 shadow p-5 rounded-3">
        <ul>
            @foreach($categories as $category)
            <li><a href="/book-catalog/{{ $category->id}}">{{ $category->name }}</a> </li>
            @endforeach
        </ul>
    </div>
    <div class="d-flex justify-content-center ">
        {{ $categories->links() }} <!-- Ajoute la pagination en bas de la liste -->
    </div>

    <script type="text/javascript" src="{{ URL::asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
</body>

</html>