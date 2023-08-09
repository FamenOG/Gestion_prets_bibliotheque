<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New book</title>
</head>

<body>
    <div class="container w-50 my-5 shadow p-5 rounded-3">
        <h1 class="text-center">New book</h1>
        <form action="/create-book-traitement" method="post" class="my-4" id="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" data-parsley-required="true" name="title" value="{{ old('title') }}">
                </div>
                <div class="col mb-3">
                    <label class="form-label">Auteur</label>
                    <input type="text" class="form-control" data-parsley-required="true" name="author" value="{{ old('author') }}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Publication date</label>
                <input type="date" class="form-control" data-parsley-required="true" name="publication_date" value="{{ old('publication_date') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" placeholder="*************" maxlength="13" class="form-control" data-parsley-required="true" name="ISBN" value="{{ old('ISBN') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Cover</label>
                <input type="file" class="form-control" data-parsley-required="true" name="cover" value="{{ old('cover') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Summary</label>
                <textarea name="summary" class="form-control" cols="30" rows="10" data-parsley-required="true"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                @foreach($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="category[]">
                    <label class="form-check-label">
                        {{ $category->name}}
                    </label>
                </div>
                @endforeach
                <button type="submit" class="btn btn-success">New book</button>
        </form>
        <ul>
            @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    </div>
</body>
<script type="text/javascript" src="{{ URL::asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('aos/dist/aos.js') }}"></script>
<script>
    $('#form').parsley();
    AOS.init({
        duration: 1000,
        once: false,
        easing: 'ease-in-out'
    });
</script>

</html>