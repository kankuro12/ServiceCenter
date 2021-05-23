@php
    $i=0;
    $sliders=\App\Slider::all();
    // dd($sliders);
@endphp
@if ($sliders->count()>0)

<div class="m-5">

    <div class="owl-carousel owl-theme" id='slid'>
       @foreach ($sliders as $slider)
        <div class="item">
            <img src="{{ asset('back/images/slider/'.$slider->image) }}" alt="Third slide">
        </div>
        @endforeach
    </div>
</div>
@endif

