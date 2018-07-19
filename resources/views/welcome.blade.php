@extends('layouts.app')

            @section('content')

            <div class="text-center">
                    <h1 >Welcome to farm to table!</h1>
                    <p>You're one step closer to playing your part in spreading the popularity of local food</p>
                    <div class="d-flex">
                         <div class="card flex-equal-width">
                             <h3 class="card-header">
                                 Sign up as a consumer
                             </h3>
                             <p class="card-body">Want to explore restaurants, farms, and grocery stores nearby that sell local, fresh food? 
                             You've come to the right place. Check out all kinds of local food sources near you!
                             </p>
                             <a class="btn btn-primary" href="{{ route('register') }}" >Get Started</a>
                         </div>
                         <div class="card flex-equal-width">
                             <h3 class="card-header">
                                 Sign up as a Producer
                             </h3>
      
                             <p class="card-body">Want to gain immediate access to customers in your area? 
                             There are countless restaurants, grocery stores, and people that 
                             want to reward you for the fruits of your labor.
                             </p>
                             <a class="btn btn-primary" href="{{ route('register') }}" >Get Started</a>
                         </div>
                         <div class="card flex-equal-width">
                                <h3 class="card-header">
                                    Sign up as a Business
                                </h3>
                                <p class="card-body">Are you an organization that wants more exposure and access to local food from responsible, sustainable farms? 
                                    Browse all the wonderful ingredients the farmers have to offer! 
                                </p>
                                <a class="btn btn-primary" href="{{ route('register') }}" >Get Started</a>
                            </div>
                     </div>
                 </div>
                
            @endsection
      
            
            