@extends('layouts.app')

@section('content')
<div class="bg-dark">
    <div class="col-lg-12">
     <table class="table-striped">
    </div>
    <div class="col-lg-12">
        @foreach ($eztravels as $item)
        <div class="card card-outline card-white">
            <div class="bg">
            <span class="card-title"><b>Booked Flights &nbsp;</b></span>
            </div>
            <div class="bg-dark">
              <h4>Origin</h4>  <p> <b>&nbsp;&nbsp;&nbsp;&nbsp;</b>{{ $item->origin }}</p><hr>
            </div>
            <div class="bg-dark">
               <h4>Destination</h4>  <p><b>&nbsp;&nbsp;&nbsp;&nbsp;</b>{{ $item->destination }}</p><hr>
            </div>
            <div class="bg-dark">
              <h4>Flight No</h4>  <p><b>&nbsp;&nbsp;&nbsp;&nbsp;</b>{{ $item->flight_no }}</p><hr>
            </div>
            <div class="bg-dark">
             <h4>Departure Date</h4> <p><b>&nbsp;&nbsp;&nbsp;&nbsp;</b>{{ $item->departure_date }}</p><hr>
            </div>
            <div class="bg-dark">
            <h4> Arrival Date </h4> <p><b>&nbsp;&nbsp;&nbsp;&nbsp;</b>{{ $item->arrival_date }}</p><hr>
            </div>
            <div class="bg-dark">
                <h4> Passenger/s </h4>   <p><b>&nbsp;&nbsp;&nbsp;&nbsp;</b>{{ $item->passenger_name }}</p><hr>
            </div>
            <div class="bg-dark">
                <h4> Age </h4>  <p><b>&nbsp;&nbsp;&nbsp;&nbsp;</b>{{ $item->age }}</p><hr>
            </div>
            <div class="bg-dark">
                <h4> Travel Class </h4>  <p><b>&nbsp;&nbsp;&nbsp;&nbsp;</b>{{ $item->travel_class }}</p><hr>
            </div>
     
   @endforeach
    </div>
  </div>
  </div>
</table>
<style>
  .bg{
    background-color: #FF6700;
  }
  h4{
      position: relative;
      left:10px;
      top:10px;
      font-size:20px;
      
  }


  p{
    position: relative;
    left:100px;
    border-left: 6px solid #FF6700;
    height: 20px;
    left: 20%;
  }
    .card-title{
        position: relative;
        left: 360px;
        font-size: 30px;
        color:white;
    }

    .card-body{
        position: relative;
        left: 355px;
    }
    
    </style>
@endsection
