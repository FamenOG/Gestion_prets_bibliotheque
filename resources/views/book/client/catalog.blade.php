<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap-5.0.2/css/bootstrap.min.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of books</title>
</head>

<body>
  <style>
    .active {
      background-color: #343a40 !important;
      color: #fff !important;
    }
  </style>
  <div class="d-flex float-end me-5 mt-3">
    @if ($user->role_id == 1)
    <a href="">
      <div class="mx-4 position-relative">
        <img src="{{ URL::asset('img/notifications_FILL0_wght400_GRAD0_opsz48.svg') }}" alt="" srcset="">
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          4
        </span>
      </div>
    </a>
    @endif
    <a href="{{($user->role_id==1) ?'/library'.'/'.$user->id : '/list-client'  }}">
      <img src="{{ URL::asset('img/shopping_basket_FILL0_wght400_GRAD0_opsz48.svg') }}" alt="" srcset="">
    </a>
  </div> 
  <div class="container shadow rounded-pill mt-5 w-50">
    <header class="d-flex justify-content-center py-3 navbar navbar-expand-lg bg-body-tertiary">
      <ul class="nav nav-pills">
        @foreach ($limitedCategories as $category)
        <li class="nav-item">
          <a href="/book-catalog/{{ $category->id }}{{ Request::has('id') ? '?id=' . Request::get('id') : '' }}" class="nav-link text-dark {{ Request::is('book-catalog/'.$category->id) ? 'active' : '' }}">
            {{ $category->name }}
          </a>
        </li>
        @endforeach
        <li class="nav-item dropdown">
          <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Show more
          </a>
          <ul class="dropdown-menu">
            @foreach ($categories as $category)
            <li>
              <a class="dropdown-item {{ Request::is('book-catalog/'.$category->id) ? 'active' : '' }}" href="/book-catalog/{{ $category->id }}">
                {{ $category->name }}
              </a>
            </li>
            @endforeach
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item {{ Request::is('book-catalog') ? 'active' : '' }}" href="#">
                Show all
              </a>
            </li>
          </ul>
        </li>
      </ul>

    </header>
  </div>
  <div class="container justify-content-center d-flex mt-5">
    <form class="d-flex w-50">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-dark" type="submit">Search</button>
    </form>
  </div>
  <div class="container ps-5 mb-5 mt-3 d-flex flex-wrap">
    @foreach ($books as $book)
    <div class="shadow card m-4 g-col-4" style="width: 18rem;">
      <img src="{{ URL::asset('img/' . $book->cover) }}" class="card-img-top" alt="..." style="width: 286px; height: 286px; object-fit: cover;">
      <div class="card-body">
        <h4 class="card-title text-center">{{ $book->title }}</h4>
        <h6 class="card-text text-center">{{ $book->publication_date }}</h6>
        <h6 class="card-text text-center">{{ $book->author->name }}</h6>
        <h6 class="card-text text-center">{{ $book->getStatus() }}</h6>
        <a href="/detail-book/{{ $book->id }}" class=""><img src="{{ URL::asset('img/open_in_new_FILL0_wght400_GRAD0_opsz48.svg') }}" alt="" srcset=""></a>
        @if ($user->role_id == 2 && Request::has('id') )
        <a href="{{ '/loan-book/' . $user->id .'/'. Request::get('id') .'/'. $book->id  }}" class=""><img src="{{ URL::asset('img/add_FILL0_wght400_GRAD0_opsz48.svg') }}" alt="" srcset=""></a>
        @endif
      </div>
    </div>
    @endforeach
  </div>
</body>
<script type="text/javascript" src="{{ URL::asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>

</html>