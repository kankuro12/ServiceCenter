<div class="bg-white shadow mb-3">
    <div class="card-body pb-3">

        <div class="title mb-2 d-flex justify-content-between alin-items-center">
            <span>
                Education Details
            </span>
            <span>
                <button class="btn btn-secondary btn-sm text-white t-edu" onclick="toogle(this,'t-edu')" data-target="#add-edu-form" data-alt="#list-edu">
                    Add New
                </button>
            </span>
        </div>
        <form action="{{route('resume.data-add')}}" id="add-edu-form" class="d-none"  method="post" onsubmit="event.preventDefault();save(this,eduAdded)">
            @csrf
            <input type="hidden" name="type" value="edu">
            <input type="hidden" name="resume_id" value="{{$resume->id}}">
                <div class="row form" >
                    <div class="col-md-6">
                        <div class="row">

                            <div class="col-md-12">
                                <label for="school" req>School / Collage</label>
                                <input type="text" name="school" id="edu-school" class="input" required >
                            </div>

                            <div class="col-md-6">
                                <label for="degree" req>Degree / Course</label>
                                <input type="text" list="data-degree" name="degree" id="edu-degree" class="input"  required >
                            </div>
                            <div class="col-md-6">
                                <label for="city" req>City</label>
                                <input type="text" list="data-city" name="city" id="edu-city" class="input" required  >
                            </div>
                            <div class="col-md-3">
                                <label for="start" req>Start Year</label>
                                <input type="text" list="data-year" min="1900" max="2100" oninput="checkNumber(this)" name="start" id="edu-start" class="input" required >
                            </div>
                            <div class="col-md-3">
                                <label for="end" req>End Year</label>
                                <input type="text" list="data-year" min="1900" max="2100" oninput="checkNumber(this)" name="end" id="edu-end" class="input" required  >
                            </div>
                            <div class="col-md-6">
                                <label for="grade" req>Grade / Divison</label>
                                <input type="text" name="grade" id="edu-grade" class="input" required  >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="desc">Summary</label>
                        <textarea name="desc" id="edu-desc"  rows="5" class="input"></textarea>
                    </div>
                    <div class="py-2 text-end">
                        <span class="btn btn-danger me-2 t-edu d-none" onclick="toogle(this,'t-edu')" data-target="#add-edu-form" data-alt="#list-edu">
                            cancel
                        </span>
                        <button class="btn btn-success">
                            Save
                        </button>
                    </div>


                </div>
        </form>
        <div id="list-edu">
            <div class="accordion" id="edu-accordion">
                @php
                    $educount=0;
                @endphp
                @foreach ($resume->edus as $edu)
                    @include('resume.partial.edu.single',['edu'=>$edu,'count'=>$educount++])
                @endforeach


              </div>
        </div>
    </div>
</div>
@include('resume.partial.edu.single_template')
<script>
    function eduChanged(data){

            document.getElementById('heading-btn-edu-'+data.data.id).innerText=data.data.school;


    }
    function eduAdded(data) {
        html=$('#single-edu-template').html();
            for (const key in data.data) {
                if (Object.hasOwnProperty.call(data.data, key)) {
                    const element = data.data[key];
                    html=html.replaceAll('xxx_'+key,element);
                }
            }
        $('.t-edu')[0].click();
        $('#add-edu-form')[0].reset();
        $('#edu-accordion').append(html);
    }
</script>
