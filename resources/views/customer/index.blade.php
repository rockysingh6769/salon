@extends('layout.customer')

@section('body')


<style type="text/css">
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
 #map {
        height: 150px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
</style>




<div class="responsive">
  <div class="gallery">
    <a data-toggle="modal" data-target="#exampleModal">
      <img src="img/img_nature.jpg" alt="Cinque Terre" width="600" height="400">
    </a>
    <div class="desc">Demo 1</div>
  </div>
</div>


<div class="responsive">
  <div class="gallery">
    <a data-toggle="modal" data-target="#exampleModal">
      <img src="img/img_nature.jpg" alt="Forest" width="600" height="400">
    </a>
    <div class="desc">Demo 2</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a data-toggle="modal" data-target="#exampleModal">
      <img src="img/img_nature.jpg" alt="Northern Lights" width="600" height="400">
    </a>
    <div class="desc">Demo 3</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a data-toggle="modal" data-target="#exampleModal">
      <img src="img/img_nature.jpg" alt="Mountains" width="600" height="400">
    </a>
    <div class="desc">Demo 4</div>
  </div>
</div>






<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Serenity Salon.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
         <div class="col-md-8">
            <img src="img/img_nature.jpg" style="width: 100%;" alt="Northern Lights">
         </div>
         <div class="col-md-4">
               <div class="form-group">
                <label for="exampleFormControlInput1">Owner</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="demouser">
              </div>
               <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="demo@example.com">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Contact</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="123456789">
              </div>
                <div class="form-group">
                <label for="exampleFormControlInput1">Location</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="#121,Chandigarh, India">
               <div id="map"></div>
                 <script>
                // Initialize and add the map
                function initMap() {
                  // The location of Uluru
                  var uluru = {lat: 30.7208817, lng: 76.8591235};
                  // The map, centered at Uluru
                  var map = new google.maps.Map(
                      document.getElementById('map'), {zoom: 15, center: uluru});
                  // The marker, positioned at Uluru
                  var marker = new google.maps.Marker({position: uluru, map: map});
                }
                    </script>
                    <!--Load the API from the specified URL
                    * The async attribute allows the browser to render the page while the API loads
                    * The key parameter will contain your own API key (which is not needed for this tutorial)
                    * The callback parameter executes the initMap() function
                    -->
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
                    </script>
              </div>
            
         </div>
           
         </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>








@endsection












     

     

  







