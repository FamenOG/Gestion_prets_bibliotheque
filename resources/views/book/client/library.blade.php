<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
</head>
<style>
    ::-webkit-scrollbar {
        display: none;
    }
</style>

<body>
    <div class="container-fluid my-4 row ">
        <div class="ms-3 col-md-10 ms-5 w-50 shadow p-4 mt-5" style="height: 600px;">
            <h2 class="text-center">Library</h2>
            <div class="overflow-auto h-75 scroll">
                @foreach ($books as $book)
                <div class="row p-3 rounded-3 my-5 alert alert-danger">
                    <div class="my-4 d-flex flex-nowrap w-50 col-md-4">
                        <a href="http://"><img src="{{ URL::asset('img/' . $book->cover) }}" class="rounded-3" style="width: 100px; height: 100px; object-fit: cover;"></a>
                        <div class="ms-3">
                            <h5>{{ $book->title }}</h5>
                            <ul>
                                <li><u>Loan date</u> : {{ $book->loan_date }}</li>
                                <li><u>Due date</u> : {{ $book->back_date }}</li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{ $user->role_id == 2 ? '/back-book/' . $user->id . '/' . $book->loan_id : '/notifications' }}" class="float-end btn btn-dark">
                        {{ $user->role_id == 2 ? 'Back' : 'Details' }}
                    </a>
                    @if($user->role_id == 2)
                    <a href="/lost-book/{{ $user->id }}/{{ $book->loan_id }}" class="mt-3 float-end btn btn-dark">Lost</a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>


        <div class="col-md-2 mt-5 ms-5 p-4">
            <div style="margin-left: 150px;" class="shadow p-5 badge rounded-pill">
                <h2 class="text-center text-dark">{{ $client->name }}</h2>
                <h2 class="text-center text-dark">{{ $client->firstname }}</h2>
                <p class="text-dark">ID Number: {{ $client->numero }}</p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
</body>

</html>