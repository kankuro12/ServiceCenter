<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Config</title>
</head>
<body>
    <div class="p-5">

        <div class="shadow">
            <form action="{{route('admin.configs.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <table class="table" >
                @foreach ($cs as $key=>$c)
                    <tr style="border-bottom:1px solid #b9b9b9;">
                        <td style="font-weight:700;text-align:right;">
                            {{$c['name']}}
                        </td>
                        <td>
                            @if ($c['type']=="image")
                                <input  type="file" accept="image/*" name="input_{{$key}}" class="dropify"{{isset($data[$key])?"":"required"}}  
                                @if(isset($data[$key]))
                                data-default-file="{{asset($data[$key])}}"
                                @endif
                                >
                            @elseif($c['type']=="text")
                                <input class="w-100" required type="text" name="input_{{$key}}" id="input_{{$key}}" value="{{isset($data[$key])?$data[$key]:""}}" >
                            @elseif($c['type']=="desc")
                                <textarea class="w-100" type="text" name="input_{{$key}}" id="input_{{$key}}">{{isset($data[$key])?$data[$key]:""}}</textarea>
                            @elseif($c['type']=="link")
                                <div class="d-flex" >
    
                                    <input style="flex:1;" placeholder="link" class="w-50" required type="text" name="input_{{$key}}" id="input_{{$key}}" value="{{isset($data[$key])?$data[$key]:""}}" >
                                    <input style="flex:1;" placeholder="text" class="w-50" required type="text" name="input_secondary_{{$key}}" id="input_secondary_{{$key}}"  value="{{isset($data[$key."_secondary"])?$data[$key."_secondary"]:""}}" >
                                </div>
                                @elseif($c['type']=="link_group")
                                    @include('back.config.multiplelink',['c'=>$c,'data'=>$data])
                                @elseif($c['type']=='link_image')
                                        <div class="d-flex">
                                            <div style="flex:1">
                                                <input   type="file" accept="image/*" name="input_{{$key}}" class="dropify"{{isset($data[$key])?"":"required"}}  
                                                @if(isset($data[$key]))
                                                data-default-file="{{asset($data[$key])}}"
                                                @endif
                                                >
                                            </div>
                                            <div style="flex:1;">
                                                <input  style="width:100%;" placeholder="link" required type="text" name="input_secondary_{{$key}}" id="input_secondary_{{$key}}"  value="{{isset($data[$key."_secondary"])?$data[$key."_secondary"]:""}}" >
                                            </div>
                                        </div>
                                    @elseif($c['type']=="link_image_group")
                                        @include('back.config.multiplelinkimage',['c'=>$c,'data'=>$data])
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="py-2">
                <button class="btn btn-primary">
                    Save Config
                </button>
            </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
    <script>
    var drEvent = $('.dropify').dropify();
    function addLink(key){

    }
</script>
</body>
</html>