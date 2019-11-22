@extends('layout.customer')

@section('body')


<div style="width: 100%; font-size: 26px;"><center><b><i>Listing of Near 5 kilometers Salons</i></b></center><br></div>

@foreach($salons as $salon)

<div class="responsive" id="base_url" base_url="{{ url('/') }}">
  <div class="gallery">
    <a data-toggle="modal" id="salonbtn" salon_id ="{{ $salon->id }}" data-target="#saloneModal">
      <img src="{{ url('/') }}/uploads/{{ $salon->imgpath }}"  alt="Cinque Terre" width="600">
    </a>
    <div class="desc">{{  $salon->name }}</div>
  </div>
</div>
 @endforeach


<div class="modal fade" id="saloneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="salon_name"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
         <div class="col-md-8">
            <img src="" id="salon_img" style="width: 100%;" alt="Northern Lights">
         </div>
         <div class="col-md-4">
               <div class="form-group">
                <label for="exampleFormControlInput1">Owner</label>
                <input type="email" class="form-control" disabled id="owner_name" >
              </div>
               <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" disabled id="salon_email">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Contact</label>
                <input type="email" class="form-control"  disabled id="salon_contact">
              </div>
                <div class="form-group">
                <label for="exampleFormControlInput1">Location</label>
                <input type="email" class="form-control" disabled id="salon_address">
                <input type="hidden" id="map_attr" lat="30.7208817" lng="76.8591235"  name="">
               <div id="map"></div>
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












     

     

  







