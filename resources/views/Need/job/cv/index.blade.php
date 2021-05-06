@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="title">
           <span class="normal">
               Find A
            </span> 
            <span class="other"> Job</span>
        </div>
        <div class="desc py-3">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates porro voluptatum modi officiis debitis ducimus iusto. Officia laborum repudiandae, voluptas earum soluta dolore amet corporis aut error debitis animi corrupti.
        </div>

        <div class="mx-md-5 mx-0">
            <div class="shadow-md p-md-5 p-2">
                <form action="{{route('n.front.postcv')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="" class="mb-1">Expected Job*</label>
                        <input type="text" name="title" id="title" placeholder="Enter Job Title" class="form-control" required>
                    </div> --}}
                    <div class="form-group">
                        <label for="" class="mb-1">CV*</label>
                        <input type="file" name="file" id="file" class="dropify" accept=".doc,.docx,.pdf,image/*" required>
                    </div>
                    <div class="form-group ">
                        <label for="" class="mb-1">Extra info</label>
                        <textarea name="desc" id="desc" class="form-control"></textarea>
                    </div>
                    <div class="form-group py-2">
                        <button class="submit" >Submit CV</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script>
    var drEvent = $('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click To Select Your CV.',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
    
</script>

@endsection
 