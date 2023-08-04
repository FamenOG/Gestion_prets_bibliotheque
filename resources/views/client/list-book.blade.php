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
    <div class="container shadow rounded-pill mt-5 w-50">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="" class="nav-link active">Drame</a></li>
                <li class="nav-item"><a href="" class="nav-link text-dark">Horror</a></li>
                <li class="nav-item"><a href="" class="nav-link text-dark">Police</a></li>
                <li class="nav-item"><a href="" class="nav-link text-dark">Suspense</a></li>
            </ul>
        </header>
    </div>
    <div class="container ps-5 my-5 d-flex flex-wrap text-center">
        <div class="shadow card m-4 g-col-4" style="width: 18rem;">
            <img src="{{ URL::asset('img/dc2b11bb-d5f6-44d2-a0e9-aea4a27e026d.jpeg') }}" class="card-img-top" alt="..." style="width: 286px; height: 286px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="shadow card m-4 g-col-4" style="width: 18rem;">
            <img src="{{ URL::asset('img/inspo.jfif') }}" class="card-img-top" alt="..." style="width: 286px; height: 286px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="shadow card m-4 g-col-4" style="width: 18rem;">
            <img src="{{ URL::asset('img/Kolkata Chai Co _ The Best Chai in the Game.png') }}" class="card-img-top" alt="..." style="width: 286px; height: 286px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="shadow card m-4 g-col-4" style="width: 18rem;">
            <img src="{{ URL::asset('img/Liz.png') }}" class="card-img-top" alt="..." style="width: 286px; height: 286px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="shadow card m-4 g-col-4" style="width: 18rem;">
            <img src="{{ URL::asset('img/Maressah.jpg') }}" class="card-img-top" alt="..." style="width: 286px; height: 286px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="shadow card m-4 g-col-4" style="width: 18rem;">
            <img src="{{ URL::asset('img/𝑺𝒐𝒑𝒉𝒊𝒆.jfif') }}" class="card-img-top" alt="..." style="width: 286px; height: 286px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="shadow card m-4 g-col-4" style="width: 18rem;">
            <img src="{{ URL::asset('img/téléchargement (1).jpeg') }}" class="card-img-top" alt="..." style="width: 286px; height: 286px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
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