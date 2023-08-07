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
    <div class="container-fluid my-4 row">
        <div class="ms-3 col-md-10 ms-5 w-50 shadow p-4 mt-5" style="height: 500px;">
            <h2 class="text-center">Library</h2>
            <div class="overflow-auto h-75 scroll">
                <div class="row p-3 rounded-3 my-5">
                    <div class="my-4 d-flex flex-nowrap w-50 col-md-4">
                        <a href="http://"><img src="{{ URL::asset('img/Kolkata Chai Co _ The Best Chai in the Game.png') }}" class="rounded-3" style="width: 100px; height: 100px; object-fit: cover;"></a>
                        <div class="ms-3">
                            <h5>Openning Night</h5>
                            <ul>
                                <li>Date de d'emprunt: 10 septembre 2023</li>
                                <li>Date de retour: 20 septembre 2023</li>
                            </ul>
                        </div>
                    </div>
                    <button class="float-end btn btn-dark">Back</button>
                </div>
                <div class="row p-3 rounded-3 my-5">
                    <div class="my-4 d-flex flex-nowrap w-50 col-md-4">
                        <a href="http://"><img src="{{ URL::asset('img/Kolkata Chai Co _ The Best Chai in the Game.png') }}" class="rounded-3" style="width: 100px; height: 100px; object-fit: cover;"></a>
                        <div class="ms-3">
                            <h5>Openning Night</h5>
                            <ul>
                                <li>Date de d'emprunt: 10 septembre 2023</li>
                                <li>Date de retour: 20 septembre 2023</li>
                            </ul>
                        </div>
                    </div>
                    <button class="float-end btn btn-dark">Back</button>
                </div>
                <div class="row p-3 rounded-3 my-5">
                    <div class="my-4 d-flex flex-nowrap w-50 col-md-4">
                        <a href="http://"><img src="{{ URL::asset('img/Kolkata Chai Co _ The Best Chai in the Game.png') }}" class="rounded-3" style="width: 100px; height: 100px; object-fit: cover;"></a>
                        <div class="ms-3">
                            <h5>Openning Night</h5>
                            <ul>
                                <li>Date de d'emprunt: 10 septembre 2023</li>
                                <li>Date de retour: 20 septembre 2023</li>
                            </ul>
                        </div>
                    </div>
                    <button class="float-end btn btn-dark">Back</button>
                </div>
            </div>
        </div>


        <div class="col-md-2 mt-5 ms-5 p-4">
            <div style="margin-left: 150px;" class="shadow p-5 badge rounded-pill">
                <h2 class="text-center text-dark">Tendry</h2>
                <h2 class="text-center text-dark">Ny Avo</h2>
                <p class="text-dark">ID Number: 38320284</p>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="{{ URL::asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>

</html>