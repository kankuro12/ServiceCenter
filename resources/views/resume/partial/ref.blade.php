<div class="bg-white shadow mb-3">
    <div class="card-body pb-3">

        <div class="title mb-2 d-flex justify-content-between alin-items-center">
            <span>
                References
            </span>
            <span>
                <button class="btn btn-secondary btn-sm text-white t-ref" onclick="toogle(this,'t-ref')"
                    data-target="#add-ref-form" data-alt="#list-ref">
                    Add New
                </button>
            </span>
        </div>
        <form action="{{ route('resume.data-add') }}" id="add-ref-form" class="d-none" method="post"
            onsubmit="event.preventDefault();save(this,refAdded)">
            @csrf
            <input type="hidden" name="type" value="ref">
            <input type="hidden" name="resume_id" value="{{ $resume->id }}">
            <div class="row form">
                <div class="col-md-6">
                    <label for="name" req>Name</label>
                    <input type="text" name="name" id="ref-name" class="input" required>
                </div>
                <div class="col-md-6">
                    <label for="company" req>Company/Oranization </label>
                    <input type="text" name="company" id="ref-company" class="input" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" req>Phone </label>
                    <input type="text" name="phone" id="ref-phone" class="input" required>
                </div>
                <div class="col-md-6">
                    <label for="email" req>Email </label>
                    <input type="email" name="email" id="ref-email" class="input" required>
                </div>

                <div class="py-2 text-end">
                    <span class="btn btn-danger me-2 t-ref d-none" onclick="toogle(this,'t-ref')"
                        data-target="#add-ref-form" data-alt="#list-ref">
                        cancel
                    </span>
                    <button class="btn btn-success">
                        Save
                    </button>
                </div>


            </div>
        </form>
        <div id="list-ref">
            <div class="accordion" id="ref-accordion">
                @php
                    $refcount = 0;
                @endphp
                @foreach ($resume->refs as $ref)
                    @include('resume.partial.ref.single',['ref'=>$ref,'count'=>$refcount++])
                @endforeach


            </div>
        </div>
    </div>
</div>
@include('resume.partial.ref.single_template')
<script>
    function refChanged(data) {

        document.getElementById('heading-btn-ref-' + data.data.id).innerText = data.data.name;


    }

    function refAdded(data) {
        html = $('#single-ref-template').html();
        for (const key in data.data) {
            if (Object.hasOwnProperty.call(data.data, key)) {
                const element = data.data[key];
                html = html.replaceAll('xxx_' + key, element);
            }
        }
        $('.t-ref')[0].click();
        $('#add-ref-form')[0].reset();
        $('#ref-accordion').append(html);
    }
</script>
