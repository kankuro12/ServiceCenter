@extends('Need.layout')
@section('content')
    <div class="success">
       
        <div class=" mt-2 mt-md-5 pt-2 pt-2 pt-md-5 pb-md-5 shadow-md">

            {{-- <div class="min-title py-2">
                {{$title}}
            </div>
            <hr> --}}
            <div class="row px-2 px-md-4">

                <div class="col-md-12  py-2 ">
                    <div class="bg-white py-3">

                        <p class="text-center normal">
                            <span class="min-title ">
                                @if ($us->accecpted==1)
                                    Your already have a  subscription valid till {{$us->validtill}}
                                @else
                                    Your already have a or subscription on pending, Please wait patiently till we verify your subscription;

                                @endif
                            </span>
        
                        </p>
                       
                    </div>
                </div>
               
            </div>
        </div>
        <div class="min-title pt-5 mt-2">
            If there are any proble please call <a class="text-white" href="tel:{{custom_config('phone')->value??""}}
                ">{{custom_config('phone')->value??""}}</a> <br>
                or <br>
                <a class="btn btn-primary" href="#bf">click here to send message. </a> <br>
                Thank You.
        </div>

    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
@endsection
@section('js')

@endsection
 
 