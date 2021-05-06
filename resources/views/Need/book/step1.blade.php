@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="title">
           <span class="normal">
               Bike 
            </span> 
            <span class="other"> Servicing</span>
        </div>
        <div class="desc py-3 text-center">
            {{custom_config('bs_long')->value??""}}
        </div>
        <div class="mx-md-5 mx-0">
            <div class="shadow-md p-md-5 p-2">
                <div class="d-block d-md-flex w-100 py-3 text-center" >
                    <div style="flex:1;border-radius:0;margin-top:10px;" class="btn btn-primary">Bike Details</div>
                    <div style="flex:1;border-radius:0;margin-top:10px;border-right:1px white solid;border-left:1px solid white;" class="btn btn-secondary">Choose Package</div>
                    <div style="flex:1;border-radius:0;margin-top:10px;" class="btn btn-secondary">CheckOut</div>
                </div>
                <form action="{{route('n.front.book.step1')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Company*</label>
                                <input type="text" class="form-control" name="company" id="company" value="{{$company??''}}" placeholder="Bike Company" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Model*</label>
                                <input type="text" class="form-control" name="model" id="model" value="{{$model??''}}" placeholder="Bike Model" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Year*</label>
                                <input type="text" class="form-control" name="year" id="year" value="{{$year??''}}" placeholder="Bike Year" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Version</label>
                                <input type="text" class="form-control" name="version" id="version" value="{{$version??''}}" placeholder="Bike Version">
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group py-2 text-right">
                        <button class="submit" >Choose Package >></button>
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
 