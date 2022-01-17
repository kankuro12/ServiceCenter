<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/resume.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>{{env('APP_NAME')}} - Resume</title>
  </head>
  <body>

    <div class="container pb-5 mb-5">
        <div class="d-flex justify-content-between align-items-center p-2 mb-3">
            <span>
                <a class="me-3" href="{{route('n.front.vendor.index')}}">Dashboard</a>
                @if ($job!=0)
                <a class="me-3" href="{{route('n.front.apply-job',['job'=>$job])}}">Back To Job Page</a>
                @endif
                <a href=""></a>
            </span>
            <span>
                Something
            </span>
        </div>
       @include('resume.partial.pd')
       @include('resume.partial.edu')
       @include('resume.partial.exp')
       @include('resume.partial.skill')
       @include('resume.partial.lang')
       @include('resume.partial.ref')
       @include('resume.partial.file')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('assets/js/block.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var map={
            "edu":'#edu-single-',
            "exp":'#exp-single-',
            "skill":'#skill-single-',
            "lang":'#lang-single-',
            "ref":'#ref-single-',
            "file":'#file-single-',
        };

        function checkNumber(ele) {
            ele.value = ele.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
        }

        function del(type,id){
            axios.post('{{route('resume.data-del')}}',{"type":type,"id":id})
            .then((res)=>{
                $(map[type]+id).remove();
            })
            .catch((err)=>{

            });
        }

        function toogle(ele,tc){
            $(ele.dataset.target).toggleClass('d-none');
            $(ele.dataset.alt).toggleClass('d-none');
            $('.'+tc).toggleClass('d-none');
        }
        function save(ele,callback,errorcallback) {
            const fd=new FormData(ele);
            // console.log(ele.method,ele)
            $(ele).block({message: '<h1>Processing</h1>' });
            axios.post(ele.action,fd)
            .then((res)=>{
                if(res.data.status){
                    toastr.success(res.data.msg);
                    if(callback!=undefined){
                        callback(res.data);
                    }
                }else{
                    toastr.success(res.data.msg);
                    if(errorcallback!=undefined){
                        errorcallback();
                    }
                }
                $(ele).unblock();
            })
            .catch((err)=>{
                console.log(err);
                toastr.success(err.response.data.message);
                if(errorcallback!=undefined){
                    errorcallback(err.response.data);
                }
                $(ele).unblock();

            });
        }
        $(function () {
            axios.get('{{asset('assets/country.json')}}')
            .then((res)=>{
                let html='';
                res.data.forEach(country => {
                  html+='<option value="'+country.name+'">'+country.name+'</option>';
                });
                $('body').append('<datalist id="data-country"></datalist>');
                $('#data-country').html(html);
            });
            axios.get('{{asset('assets/city.json')}}')
            .then((res)=>{
                let html='';
                res.data.forEach(city => {
                  html+='<option value="'+city.name+'">'+city.name+'</option>';
                });
                $('body').append('<datalist id="data-city"></datalist>');
                $('#data-city').html(html);
            });

            years='';
            for (let index = 1900; index <2100; index++) {
                years+='<option value="'+index+'">'+index+'</option>';
                $('body').append('<datalist id="data-year"></datalist>');
                $('#data-year').html(years);
            }
        });
    </script>
  </body>
</html>
