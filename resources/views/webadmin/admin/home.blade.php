@extends('webadmin.layouts.dashboard_admin')

@section('style')
    @include('webadmin.includes.datatables-css')
@endsection

@section('content')
  <div class="row">

    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
      <div style="padding-bottom:50px;"></div>
      <center><h2>Countries</h2></center>
      <div class="responsive-table">
        <table class="table table-striped table-hover _table">
          <thead>
            <tr>
              <th>ID</th>
              <th class="text-center">COUNTRY NAME</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
      <center><h2>Cities</h2></center>
      <div class="responsive-table">
        <table class="table table-striped table-hover _cities-table">
          <thead>
            <tr>
              <th>ID</th>
              <th class="text-center">COUNTRY</th>
              <th class="text-center">CITY</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
      <div style="padding-bottom:50px;"></div>
      <ul class="nav nav-tabs navtab-bg nav-justified">
        <li class="active">
          <a href="#mapShow" data-toggle="tab" aria-expanded="true">
            Map
          </a>
        </li>
        <li>
          <a href="#city" data-toggle="tab" aria-expanded="false">
            Wheaters
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="mapShow">
          <div id="map-show" style="width:100%; height:300px; margin: 0px auto;">
          </div>
        </div>
        <div class="tab-pane" id="city">
          <div class="table-responsive">
            <h4>Found Cities</h4>
            <table class="table table-striped" style="width:100%;">
              <tbody id="nearby">
                <td>No data</td>
              </tbody>
            </table>
          </div>
          <div class="table-responsive">
            <h4>Search By</h4>
            <table class="table table-striped">
              <tbody id="first_city">
                <td>No data</td>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@include('webadmin.includes.datatables-js')

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvqRLYmzCvd7UlCWZZKgLjVPiEMr1s0uU&callback=initMap&libraries=places,visualization"
  type="text/javascript"></script>

<script type="text/javascript">

var map;

  function initMap(lat,lon) {
    // Create the map.
    var pyrmont = {lat: lat, lng: lon};
    map = new google.maps.Map(document.getElementById('map-show'), {
      center: pyrmont,
      zoom: 10
    });

    // Create the places service.
    var service = new google.maps.places.PlacesService(map);

    // Perform a nearby search.
    service.nearbySearch({
      location: pyrmont,
      radius: 15,
      type: ['locality']
    },
      function(results, status, pagination) {
        if (status !== 'OK') return;
        createMarkers(results);
    });
  }

  function createMarkers(places) {

    var bounds = new google.maps.LatLngBounds();

    for (var i = 0, place; place = places[i]; i++) {

      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        animation: google.maps.Animation.DROP,
        position: place.geometry.location,
        draggable: true,
      });

      bounds.extend(place.geometry.location);
    }
    map.fitBounds(bounds);
  }

  var city_table = jQuery('._cities-table').DataTable({
      dom : 'Bfrtip',
      select : true,
      ordering : false,
      processing : true,
      serverSide : true,
      buttons : [
        {
          text : 'Get Weather',
          className : 'btn btn-primary',
          action  : function(e, dt, node, config)
          {
            var res = dt.row( { selected: true } ).data();
            if(res != undefined ) {
              var _url = '{{ route("get_weather") }}';
              jQuery.ajax({
                url : _url + '?city_name=' + res.city_name,
                method : 'get',
                dataType: 'json',
                beforeSend : function() {
                  jQuery('#map-show').html(loader('Get weather ...'));
                },
                success : function(res) {

                  if(res.first != undefined) {

                    if(res.first.coord != undefined) {

                    jQuery('#nearby').html("");
                    var lat = res.first.coord.lat,
                        lon = res.first.coord.lon;
                    initMap(lat,lon);
   
                    jQuery('#first_city').html(`
                      <tr>
                        <td>City</td>
                        <td>:</td>
                        <td>`+ res.first.name +`</td>
                      </tr>
                      <tr>
                        <td>Latitude/Longtitude</td>
                        <td>:</td>
                        <td>`+ lat +` / ` + lon + `</td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="3">
                          Weather
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="3">
                          <img src="http://openweathermap.org/img/w/`+ res.first.weather[0].icon +`.png"><br>
                          `+ res.first.weather[0].description +`
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="3">
                          Main
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center" colspan="3">
                          <b><h5>Temp</h5></b>
                          `+ res.first.main.temp +`
                          <br>
                          <b><h5>Pressure</h5></b>
                          `+ res.first.main.pressure +`
                          <br>
                          <b><h5>Humadity</h5></b>
                          `+ res.first.main.humadity +`
                          <br>
                          <b><h5>Sea Level</h5></b>
                          `+ res.first.main.sea_level +`
                          <br>
                        </td>
                      </tr>
                    `);

                    for (var i = 0; i < res.nearbys.length; i++) {

                      if(res.nearbys[i].cod == 200) {
                        var tr = jQuery('<tr>').html(`
                          <td>
                            <b><h5>`+ res.nearbys[i].name +`</h5></b>
                          </td>
                          <td>
                            <center>
                              <img src="http://openweathermap.org/img/w/`+ res.nearbys[i].weather[0].icon +`.png"><br>
                              `+ res.nearbys[i].weather[0].description +`
                            </center>
                          </td>
                        `);
                        jQuery('#nearby').append(tr);
                      }

                    }

                    } else {
                      return jQuery('#map-show').html(errorAlert(
                        "City not found."
                      ));
                    }
                  } else {
                    jQuery('#map-show').html(errorAlert(
                      "City not found."
                    ));
                  }
                }
              });
            } else {
              jQuery('#map-show').html(errorAlert(
                "Please select country."
              ));
            }
          }
        }
      ],
      columns : [
        { data : 'city_id', name : 'city_id', visible : false },
        { data : 'country_name', name : 'country_name' },
        { data : 'city_name', name : 'city_name' },
      ],
      ajax : { url : "{{ Route('get_city') }}" }
  });

  var country_table = jQuery('._table').DataTable({
      dom : 'Bfrtip',
      select : true,
      ordering : false,
      processing : true,
      serverSide : true,
      buttons : [
        {
          text : 'Export City To DB',
          className : 'btn btn-primary',
          action  : function(e, dt, node, config)
          {
            var res = dt.row( { selected: true } ).data();

            jQuery('#myModalLabel').html('Sync Data');

            if(res != undefined ) {
              var _url = replaceUrlId('{{ route("export_city","ID") }}',res.name);
              jQuery.ajax({
                url : _url + '?country_id=' + res.id,
                method : 'get',
                dataType: 'json',
                beforeSend : function() {
                  jQuery('.modal-body').html(loader('Exporting city to DB...'));
                },
                success : function(res) {
                  if(res.error == 0) {
                    var msg = successAlert(res.message);
                  } else {
                    var msg = errorAlert(res.message);
                  }
                  city_table.ajax.reload();
                  jQuery('.modal-body').html(msg);
                }
              })
            } else {
              jQuery('.modal-body').html(errorAlert(
                "Please select country."
              ));
            }
            _modal();
          }
        }
      ],
      columns : [
        { data : 'id', name : 'id', visible : false },
        { data : 'name', name : 'name' }
      ],
      ajax : { url : "{{ Route('home') }}" }
  });
</script>
@endsection