<div class="bg-white shadow mb-3">
    <div class="card-body pb-3">

        <div class="title mb-2 d-flex justify-content-between alin-items-center">
            <span>
                Experience Details
            </span>
            <span>
                <button class="btn btn-secondary btn-sm text-white t-exp" onclick="toogle(this,'t-exp')" data-target="#add-exp-form" data-alt="#list-exp">
                    Add New
                </button>
            </span>
        </div>
        <form action="{{route('resume.data-add')}}" id="add-exp-form" class="d-none"  method="post" onsubmit="event.preventDefault();save(this,expAdded)">
            @csrf
            <input type="hidden" name="type" value="exp">
            <input type="hidden" name="resume_id" value="{{$resume->id}}">
                <div class="row form" >
                    <div class="col-md-6">
                        <div class="row">

                            <div class="col-md-12">
                                <label for="company" req>Company </label>
                                <input type="text" list="data-company" name="company" id="exp-company" class="input"  required >
                            </div>
                            <div class="col-md-6">
                                <label for="name" req>Designation</label>
                                <input type="text" name="name" id="exp-name" class="input" required >
                            </div>
                            <div class="col-md-6">
                                <label for="city" req>City</label>
                                <input type="text" list="data-city" name="city" id="exp-city" class="input" required  >
                            </div>
                            <div class="col-md-3">
                                <label for="start" req>Start Year</label>
                                <input type="text" list="data-year" min="1900" max="2100" oninput="checkNumber(this)" name="start" id="exp-start" class="input" required >
                            </div>
                            <div class="col-md-3">
                                <label for="end" req>End Year</label>
                                <input type="text" list="data-year" min="1900" max="2100" oninput="checkNumber(this)" name="end" id="exp-end" class="input" required  >
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="desc">Summary</label>
                        <textarea name="desc" id="exp-desc"  rows="5" class="input"></textarea>
                    </div>
                    <div class="py-2 text-end">
                        <span class="btn btn-danger me-2 t-exp d-none" onclick="toogle(this,'t-exp')" data-target="#add-exp-form" data-alt="#list-exp">
                            cancel
                        </span>
                        <button class="btn btn-success">
                            Save
                        </button>
                    </div>


                </div>
        </form>
        <div id="list-exp">
            <div class="accordion" id="exp-accordion">
                @php
                    $expcount=0;
                @endphp
                @foreach ($resume->exps as $exp)
                    @include('resume.partial.exp.single',['exp'=>$exp,'count'=>$expcount++])
                @endforeach


              </div>
        </div>
    </div>
</div>
@include('resume.partial.exp.single_template')
<script>
    function expChanged(data){

            document.getElementById('heading-btn-exp-'+data.data.id).innerText=data.data.company;


    }
    function expAdded(data) {
        html=$('#single-exp-template').html();
            for (const key in data.data) {
                if (Object.hasOwnProperty.call(data.data, key)) {
                    const element = data.data[key];
                    html=html.replaceAll('xxx_'+key,element);
                }
            }
        $('.t-exp')[0].click();
        $('#add-exp-form')[0].reset();
        $('#exp-accordion').append(html);
    }
</script>
