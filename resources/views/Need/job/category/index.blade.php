@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="container">
            <div class="title">
                <span class="normal">
                    Jobs In
                </span>
                <span class="other"> {{ $cat->name }}</span>
            </div>

            <hr>
            <div class="row job-container" id="job-container">

            </div>
            <div class="text-center" id="loadMore">
                <button class="btn btn-primary">Load More</button>
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

    <script>
        var cururl;
        var url = "{{ route('n.front.view-job', ['job' => 'xxx_id']) }}";
        var caturl = "{{ route('n.front.job-category', ['cat' => 'xxx_id']) }}";
        var nextPage = {{$next}};

        function render(d) {
            return '<div class="col-md-3 p-2 " id="job-' + d[0] + '">' +
                '<a href="' + (url.replace('xxx_id', d[0])) + '" class="single-cat-view  ">' +
                '<div class="job-name nowrap">' + d[1] + '</div>' +
                '<div class="job-company nowrap">' + d[3] + '</div>' +
                '<div class="job-duedate"> <span>Due Date</span><span>' + d[2] + '</span></div>' +
                '</a>' +
                '</div>';

        }

        function loadMore(ele) {
            $(ele).hide();
            axios.post(cururl + "?page=" + nextPage)
                .then((res) => {
                    console.log(res);
                    html = '';
                    res.data.jobs.forEach(data => {
                        var d = data.j.split('|');
                        html += render(d);
                    });
                    nextPage=res.data.next;
                    $('#job-container').append(html);
                    if(!res.data.more){
                        $('#loadMore').remove();
                        delete loadMore;
                    }
                    $(ele).show();


                })
                .catch((err) => {
                    $(ele).show();

                });
        }

        $(document).ready(function() {
            cururl = window.location.href;
            let data = {!! json_encode($jobs) !!};
            html = '';
            data.forEach(ele => {
                var d = ele.j.split('|');
                html += render(d);
            });
            $('#job-container').append(html);
            $('#loadMore').click(function(e) {
                loadMore(this);

            });
            console.log(data);
        });
    </script>
@endsection
