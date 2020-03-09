@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <form id="carbon_form">
                
                <div class="form-group">
                   <label for="activity" data-toggle="tooltip" data-placement="left" data-original-title="Enter fuel consumption of the vehicle in US gallons OR the distance travelled in miles">Activity* </label>
                    <input type="number" min="1" class="form-control" id="activity" name="activity" aria-describedby="activity" placeholder="Enter Activity" required>
                   
                </div>
                <div class="form-group">
                    <label for="activityType" data-toggle="tooltip" data-placement="left" data-original-title="This refers to the type of activity value chosen above(In miles,fuel)">ActivityType* </label>
                    <input type="activityType" class="form-control" id="activityType" name="activityType" placeholder="Enter ActivityType" required>
                </div>
                <div class="form-group">
                    <label for="fuelType" data-toggle="tooltip" data-placement="left" data-original-title="Please set this If your activity and activityType represents fuel consumption in gallons. Enter the type of fuel the vehicle is using.">FuelType </label>
                    <!-- <input type="fuelType" class="form-control" id="fuelType" aria-describedby="fuelType" placeholder="Enter FuelType" > -->
                    <select name="fuelType" class="browser-default custom-select">
                    <option selected>Select</option>
                    <option value="motorGasoline ">MotorGasoline </option>
                    <option value="diesel">Diesel</option>
                    <option value="aviationGasoline">AviationGasoline</option> 
                    <option value="jetFuel">JetFuel</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="mode " data-toggle="tooltip" data-placement="left" data-original-title="This refers to the mode of transportation">Mode </label>
                    <!-- <input type="mode" class="form-control" id="mode" placeholder="Enter Mode"> -->
                    <span class="badge badge-warning">If your activity and activityType represents the miles travelled, you will need to set this property</span>
                    <select name="mode" class="browser-default custom-select">
                    <option selected>Select</option>
                    <option value="dieselCar">DieselCar </option>
                    <option value="petrolCar">PetrolCar</option>
                    <option value="anyCar">AnyCar</option> 
                    <option value="economyFlight">EconomyFlight</option>
                    <option value="businessFlight">BusinessFlight </option>
                    <option value="firstclassFlight">FirstclassFlight</option>
                    <option value="anyFlight">AnyFlight</option> 
                    <option value="motorbike">Motorbike</option>
                    <option value="bus">Bus</option> 
                    <option value="transitRail">TransitRail</option>  
                    </select>
                </div>
                <div class="form-group">
                    <label for="country">Country* </label>
                    <!-- <input type="country" class="form-control" id="country" aria-describedby="country" placeholder="Enter Country" required> -->
                    <select name="country" class="browser-default custom-select">
                    <option selected>Select</option>
                    <option value="usa ">United States </option>
                    <option value="gbr">United Kingdom</option>
                    <option value="def">Other</option> 
                    
                    </select>
                </div>
                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                </form>
                
        </div>
    </div>
</div>
<script type="application/javascript"> 
     $(document).ready(function(){

  $('[data-toggle="tooltip"]').tooltip();  


    $('#carbon_form').on('submit', function(e) {
        $('#loadingalert').show();
        e.preventDefault();
        // var activity = $('#activity').val();
        var form = $(this);
      
        var submit = form.find("[type=submit]");
    var submitOriginalText = submit.attr("value");
   
    var data = form.serialize();
        $.ajax({
          method  :'GET',
          url     :'{{ asset("getcarbonapi" )}}',
          data    : data,
          dataType:"json",
          cache:false,
          processData: false,
          contentType:false,
        success: function(response){
          console.log(response.carbonFootprint);
          $('#loadingalert').hide();
        //   $('#requestmessage').text("Data Saved Successfull");
        $('#requestmessage').text("carbonFootprint is "+response.carbonFootprint);
         
          toggleAlert();
            //console.log(response);

          },

          error: function(error){
            $('#loadingalert').hide();
            console.log(error);
            $('#requestmessage').text("something went wrong !");
            toggleAlert();
            // $('#loadingalert').hide();
            // $('#requestmessage').text("Something Went Wrong");
            // toggleAlert();


          }

        });
        

        });
  });




</script>


@endsection
