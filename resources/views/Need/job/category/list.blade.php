@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="container">
            <div class="title">
                <span class="normal">
                    Jobs
                </span>
                <span class="other">Categories</span>
            </div>
            <div class="desc py-3 text-center">
                Please Choose One Category To Continue.
            </div>
            <hr class="my-1">
            <div class="row job-container" id="job-container">
                @foreach ($cats as $cat)

                    <div class="col-md-3 p-2">

                        <a href="{{route('n.front.job-category',['cat'=>$cat->id])}}" class="block w-100 p-2 btn shadow font-weight-bolder">{{$cat->name}}</a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/normal.css') }}">
    <style>
        .big_section {
            color: #4d4d4d;
        }

        .job-title {
            color: #FE3F40;
        }

        .job-dates {
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .company {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 5px;

        }

        .company-desc {
            font-size: 0.9rem;
        }


        .single-cat-view {
            padding: 10px;
            display: block;
            height: 100%;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.26);
            cursor: pointer;
            margin-bottom: 15px;
            color: inherit;
            border-radius: 5px;
        }

        .nowrap {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .job-name {
            font-weight: 500;



        }

        .job-company {
            font-size: 0.9rem;
            font-weight: 400;
        }

        .job-duedate {
            font-size: 0.8rem;
            font-weight: 500;
            display: flex;
            justify-content: space-between;
        }


        @media (max-width:426px) {
            .big_section .title {
                font-size: 20px;
            }

            .big_section .title .other {
                display: block;
            }
        }

    </style>
@endsection
@section('js')


@endsection
