<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of books</title>
</head>

<body>
    <div class="container rounded-3 my-5 d-flex flex-wrap shadow p-5">
        <div class="col-md-6">
            <img src="{{ URL::asset('img/' . $book->cover) }}" class="card-img-top rounded-3 shadow" alt="..." style="width: 500px; height: 500px; object-fit: cover;">
        </div>
        <div class="col-md-6 p-4">
            <h2>{{ $book->title }}</h2>
            <p>{{ $book->summary }}</p>
            <div class="float-end">
                <h5><u>Author</u> : {{ $book->author_id }}</h5>
                <h5><u>Publication date</u>  : {{ $book->publication_date }}</h5>
                <h5><u>ISBN</u> : {{ $book->ISBN }}</h5>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
</body>

</html>