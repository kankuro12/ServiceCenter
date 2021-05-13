@php
    $i=0;
    $sliders=\App\Slider::all();
@endphp
@if ($sliders->count()>0)
    <div class="m-5">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for ($j = 0; $j < $sliders->count(); $j++)
                    
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$j}}" class="{{$j==0?'active':''}}"></li>
               
                @endfor
              </ol>
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    
                    <div class="carousel-item {{$i==0?'active':''}}">
                        <img class="d-block w-100" src="{{ asset('back/images/slider/'.$slider->image) }}" alt="First slide">
                    </div>
                    @php
                        $i+=1;

                    @endphp
                @endforeach
            </div>
        </div>
    </div>
@endif