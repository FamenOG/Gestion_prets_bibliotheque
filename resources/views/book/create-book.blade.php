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
        <form action="/category-book/" method="post" class="my-4" id="form">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" data-parsley-required="true" name="title" value="{{ old('title') }}">
                </div>
                <div class="col mb-3">
                    <label class="form-label">Auteur</label>
                    <input type="text" class="form-control" data-parsley-required="true" name="auteur" value="{{ old('auteur') }}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" data-parsley-required="true" name="date" value="{{ old('date') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">ISBN</label>
                <input type="number" maxlength="13" class="form-control" data-parsley-required="true" name="ISBN" value="{{ old('ISBN') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Picture</label>
                <input type="file" class="form-control" data-parsley-required="true" name="picture" value="{{ old('picture') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Summary</label>
                <textarea name="summary" class="form-control" cols="30" rows="10" data-parsley-required="true"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Suivant</button>
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