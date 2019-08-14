<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Salon</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="navbar navbar-expand-xl fixed-top bg-white" id="navtop">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="{{ url('/') }}/img/salon.jpeg" alt=""></a>
            <div class="nav-icon" id="nav-icon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="navbar-links" id="mainnav">
                <ul class="navbar-nav ml-auto">
                    <li class="active">
                        <a href="index.html">Welcome<span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <a href="product.html">Product</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="our-story.html">Customer</a>
                    </li>
                    <li>
                        <a href="contact.html">Profile</a>
                    </li>
                    <li class="contact">
                        <form method="post" action="{{ url('/')}}/destroy">
                          @csrf   
                           <input type="submit" name="logout" class="btn btn-primary" style="margin-top: -6px;" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     
        <div class="container">
          <div class="row">
              @section('body')
              @show
          </div>
      </div>
  

    <script src="{{ url('/') }}/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/js/jquery.js"></script>
    <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script> <script src="{{ url('/') }}/js/worker.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>


<script type="text/javascript">

</script>

</body>

</html>
    

