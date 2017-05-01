@extends('layouts.master0')
<style>
#map { height: 100% }
</style>
@section('content')
  <form method="get" action="">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="city">City</label>
      {{-- <input type="text" class="form-control" id="city" name="city" placeholder="City"> --}}
      <input class="form-control" data-provide="typeahead" type="text" id="city" name="city" placeholder="Cities">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </form>
  <div id="log"></div>
  @include('layouts.errors')
  <div class="row">
    <div class="col-md-4">
      <h4>Elenco città in prossimità di: <span id="city-prox"></span></h4>
      <ul id="stores" class="list-group">
        @foreach ($stores as $store)
          <li class="list-group-item">{{$store->title}}</li>
        @endforeach
      </ul>
    </div>
    <div class="col-md-8">
      <div id="map"  class="col-md-12"></div>
    </div>
  </div>



  <script type="text/javascript">
  function log( message ) {
    $( "<div>" ).text( message ).prependTo( "#log" );
    $( "#log" ).scrollTop( 0 );
  };

  $( "#city" ).autocomplete({
    source: "/api/stores",
    focus: function( event, ui ) {
      $( "#city" ).val( ui.item.title );
      return false;
    },
    minLength: 2,
    select: function( event, ui ) {
      var coordinates = ui.item.location.split(',');
      var latitude = coordinates[0];
      var longitude = coordinates[1];

      map.panTo(new google.maps.LatLng(latitude, longitude));
      map.setZoom(13);

      //update list stores
      var out ='';
      $.get('/api/stores/near/'+ui.item.id,function(JSONData){
        var obj = $.parseJSON(JSONData);
        for (var key in obj) {
          out += '<a class="store-link list-group-item" href="#" data-storeid="'+obj[key].id+'" data-location="'+obj[key].location+'">'+obj[key].title+'</a>';
        }

        $('#stores').empty().append(out);
      });
      $('#city-prox').text(ui.item.title);

    }
  })
  .autocomplete( "instance" )._renderItem = function( ul, item ) {
    return $( "<li>" )
    .append( "<div>" + item.title + "</div>" )
    .appendTo( ul );
  };

  $('body').on('click','.store-link',function(){
    var storeId = $(this).data('storeid');
    var storeLocation = $(this).data('location');
    var coordinates = storeLocation.split(',');
    var latitude = coordinates[0];
    var longitude = coordinates[1];

    map.panTo(new google.maps.LatLng(latitude, longitude));
    map.setZoom(13);
  });


  function initMap() {
    var mapOptions = {
      zoom: 10,
      center: new google.maps.LatLng({{$stores[0]->location}})
    }
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    var markers = new Array();
    var bounds = new google.maps.LatLngBounds();
    @foreach($stores as $item)
      var infowindow{{$item->id}} = new google.maps.InfoWindow({
        content: '{{$item->title}}'
      });
      var latlng = new google.maps.LatLng({{$item->location}});
      var marker{{$item->id}} = new google.maps.Marker({
        position: latlng,
        map: map,
        title: "{{$item->title}}"
      });
      marker{{$item->id}}.addListener('click', function() {
         infowindow{{$item->id}}.open(map, marker{{$item->id}});
      });
      markers.push(marker{{$item->id}});

      bounds.extend(latlng);
    @endforeach
    map.fitBounds(bounds);
    // Add a marker clusterer to manage the markers.
    var markerCluster = new MarkerClusterer(map, markers,
      {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

    }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD797OdtkIGEgwod86lF4VXdXaN-Qk8-Do&callback=initMap">
    </script>

  @endsection
