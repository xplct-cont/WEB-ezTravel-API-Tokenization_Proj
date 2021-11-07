
<li class="nav-item">
    <a href="{{ route('eztravels.index') }}"
       class="nav-link {{ Request::is('eztravels*') ? 'active' : '' }}">
        <h1>ezTravel Flight Bookings</h1>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <h2>Logs</h2>
    </a>
</li>


<style>
    h1{
        position: relative;
        left: 1px;
        top: 4px;
        color: white; 
        padding-left:20px;
        padding-top: 5px;
        padding-right: 5px;
        padding-bottom: 5px;
        font-size: 15px;
        border-radius: 10px;
        background-color: #FF6700;
        
    }
        h2{
        position: relative;
        left: 1px;
        top: 4px;
        color: white; 
        padding-left:80px;
        padding-top: 5px;
        padding-right: 5px;
        padding-bottom: 5px;
        font-size: 15px;
        border-radius: 10px;
        background-color: #FF6700;
        
    }
  
    </style>


