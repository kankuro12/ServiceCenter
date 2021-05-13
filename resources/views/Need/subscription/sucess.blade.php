@extends('Need.layout')
@section('content')
    <div class="success">
        <div class="title">
              Subscription Request Sent Sucessfully.
            
        </div>

        <div class=" mt-2 mt-md-5 pt-2 pt-2 pt-md-5 pb-md-5 shadow-md">

            {{-- <div class="min-title py-2">
                {{$title}}
            </div>
            <hr> --}}
            <div class="row px-2 px-md-4">

                <div class="col-md-6  py-2 ">
                    <div class="bg-white py-3">

                        <p class="text-center normal">
                            <span class="min-title ">
                                Your References ID For Subscription IS : #000{{$so->id}}
                            </span>
        
                        </p>
                        <div class="text-center">
                            <a href="{{route('n.front.user')}}" class="min-link ">Goto User Panel &rarr;</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6  py-2">
                    <div class="bg-white py-3">

                        <p class="text-center normal">
                            <span class="min-title ">
                              
                                You Can View Your Order Any Time Using User Panel.
                            </span>
    
                        </p>
                        <div class="text-center">
                            <a href="{{route('n.front.user')}}" class="min-link ">Goto User Panel &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="min-title pt-5 mt-2">
            One of Our Represenative will Contact You Soon. Thank You.
        </div>

    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
@endsection
@section('js')

@endsection
 
 