@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <table id="ordertable" class="border-0 table table-bordered table-responsive table-striped text-left table-sm" width="100%" cellspacing="0">
    <thead>
      <tr>
      <th class="text-center">Id</th>
        <th class="text-center">User Id</th>
        <th class="text-center">Activity</th>
        <th class="text-center">ActivityType</th>
        <th class="text-center">FuelType</th>
        <th class="text-center">Country</th>
        <th class="text-center">Mode</th>
        <th class="text-center">Response</th>
     
<!--        <th class="text-center">
          <input id="selectAll" type="checkbox">
        </th>-->
      </tr>
    </thead>
    <colgroup>
      <col width="15%">
      <col width="15%">
      <col width="15%">
       <col width="10%">
        <col width="10%">
      <col width="10%">
      <col width="10%">
      <col width="15%">
    <col width="10%">
    </colgroup>
    <tbody class="text-center">

     @foreach($result as $results)
    
      <tr>
      <td class="text-center">{{$results->id}}</td>
      <td class="text-center">{{$results->userid}}</td>
        <td class="text-center">{{$results->activity}}</td>
        <td class="text-center">{{$results->activityType}}</td>
        <td class="text-center">{{$results->fuelType}}</td>
        <td class="text-center">{{$results->country}}</td>
        <td class="text-center">{{$results->mode}}</td>
        <td class="text-center"> {{$results->response}}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
    </div>
</div>



@endsection
