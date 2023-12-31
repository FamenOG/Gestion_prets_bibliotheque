<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des client</title>
</head>

<body>
    <div class="container">

        <h2 class="text-center mt-5">Customer list</h2>
        <div class="container justify-content-center d-flex mt-5">
            <form action="/list-client" class="d-flex w-50">
                <input class="form-control me-2" name="search" type="search" placeholder="ID number" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
            <!-- <div class="mx-20 position-relative">
                <a href="/list-client">
                    <img src="{{ URL::asset('img/shopping_basket_FILL0_wght400_GRAD0_opsz48.svg') }}" alt="" srcset="">
                </a>
            </div> -->
        </div>
        @foreach ($users as $user)
        <div class="row shadow-sm p-3 rounded-3 my-5">
            <div class="my-4 d-flex flex-nowrap w-50 col-md-4">
                <div class="ms-3">
                    <h5>{{ $user->name }}</h5>
                    ID number: {{ $user->numero }}
                </div>
            </div>
            <a href="/book-catalog/1?id={{ $user->id }}" class="float-end btn btn-dark my-2">Borrow</a>
            <a href="/library/{{ $user->id }}" class="float-end btn btn-dark my-2">Give back</a>
        </div>
        @endforeach
        <style>
            <style>.pagination .page-item.active .page-link {
                background-color: #343a40 !important;
                color: #fff !important;
            }
        </style>

        </style>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>


    </div>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
</body>

</html>