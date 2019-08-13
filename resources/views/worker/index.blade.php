@extends('layout.customer')


@section('body')
<style type="text/css">
	.btnadd{
    margin-left: 1155px;
}
</style>

<br>


 <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-info btnadd" >Add New</button>

<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
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
         <div class="col-md-6">
         	 <div class="form-group">
                <label for="exampleFormControlInput1">Salon Image</label>
                <input type="file"  id="imgInp" class="form-control" >
              </div>
            <img src="" id="blah" style="width: 100%; display: none;" alt="Northern Lights">
       
  
         </div>
         <div class="col-md-6">
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
                    src="https://maps.googleapis.com/maps/api/js?key=w&callback=initMap">
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