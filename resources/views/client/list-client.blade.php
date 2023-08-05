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
            <form class="d-flex w-50">
              <input class="form-control me-2" type="search" placeholder="ID number" aria-label="Search">
              <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
          </div>
        <div class="row shadow-sm p-3 rounded-3 my-5">
            <div class="my-4 d-flex flex-nowrap w-50 col-md-4">
                <div class="ms-3">
                    <h5>Tendry Ny Avo</h5>
                    ID number: 283081938
                </div>
            </div>
            <button class="float-end btn btn-dark my-2">Borrow</button>
            <button class="float-end btn btn-dark my-2">Back</button>
        </div> 
    </div>
</body>
<script type="text/javascript" src="{{ URL::asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>

</html>