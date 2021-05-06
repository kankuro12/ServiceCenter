@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="title">
           <span class="normal">
               Post A 
            </span> 
            <span class="other"> Job</span>
        </div>
        <div class="desc py-3 text-center">
            {{custom_config('pj_long')->value??""}}       
        </div>

        <div class="mx-md-5 mx-0">
            <div class="shadow-md p-md-5 p-2">
                <form action="{{route('n.front.postjob')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="" class="mb-1">Job Title*</label>
                        <input type="text" name="title" id="title" placeholder="Enter Job Title" class="form-control" required>
                    </div>
                    <div class="form-group ">
                        <label for="" class="mb-1">Job Description*</label>
                        <textarea name="desc" id="desc" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-1">Document</label>
                        <input type="file" name="file" id="file" class="form-control" accept=".doc,.docx,.pdf,image/*">
                    </div>
                    <div class="form-group py-2">
                        <button class="submit" >Submit Job</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
@endsection
@section('js')
<script src="https://cdn.tiny.cloud/1/4adq2v7ufdcmebl96o9o9ga7ytomlez18tqixm9cbo46i9dn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>

    if(window.innerWidth>768){

        tinymce.init({
            selector: '#desc',
            plugins: [
                    '  advlist anchor autolink codesample fullscreen help image imagetools tinydrive',
                    ' lists link media noneditable  preview',
                    ' searchreplace table template  visualblocks wordcount'
            ],
            toolbar_mode: 'floating',
        });
    }else{
        $('#desc').addClass('form-control');
        $('#desc').css('height', '300px');
    }
</script>
@endsection
 
 