<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <div class="container w-50 mt-5 shadow p-5 rounded-3">
        <h1 class="text-center">Inscription</h1>
        <form action="" method="get" class="mt-4" id="form">
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" data-parsley-required="true">
                </div>
                <div class="col mb-3">
                    <label class="form-label">Prenom</label>
                    <input type="text" class="form-control" data-parsley-required="true">
                </div>
            </div>    
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" data-parsley-required="true">
            </div>
            <div class="mb-3">
                <label class="form-label">Numero telephone</label>
                <input type="number" maxlength="10" class="form-control" data-parsley-required="true">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" data-parsley-required="true">
            </div>
            <button type="submit" class="btn btn-success">S'inscrire</button>
        </form>
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