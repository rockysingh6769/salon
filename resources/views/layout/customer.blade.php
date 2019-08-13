<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bostonwood Furniture</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <nav class="navbar navbar-expand-xl fixed-top bg-white" id="navtop">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="img/salon.jpeg" alt=""></a>
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
                    <li class="contact">
                        <a href="contact.html">Profile</a>
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
  

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) 
    {
        var fileName =$('#imgInp').val();
        var file_extension = fileName.split('.').pop(); 
        if (file_extension=="jpg" || file_extension=="jpeg" || file_extension=="png" || file_extension=="gif")
        {
            $('#blah').show();
            $('#blah').attr('src', e.target.result);
        }else{
          alert("It is a invalid extension. Only jpg, gif, png, jpeg are allowed.")
        }
    }
    reader.readAsDataURL(input.files[0]);
   }
   }$("#imgInp").change(function() {
    readURL(this);
   });
</script>

</body>

</html>
    

