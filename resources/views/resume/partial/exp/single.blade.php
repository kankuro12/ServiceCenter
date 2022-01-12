<div class="accordion-item" id="exp-single-{{$exp->id}}">
    <h2 class="accordion-header" id="heading-exp-{{ $exp->id }}">
        <button class="accordion-button collapsed " id="heading-btn-exp-{{ $exp->id }}" type="button" data-bs-toggle="collapse"
            data-bs-target="#exp-{{ $exp->id }}" aria-expanded="true" aria-controls="exp-{{ $exp->id }}">
            {{ $exp->company }}
        </button>
    </h2>
    <div id="exp-{{ $exp->id }}" class="accordion-collapse collapse "
        aria-labelledby="heading-exp-{{ $exp->id }}" data-bs-parent="#exp-accordion">
        <div class="accordion-body">
            <form action="{{ route('resume.data-add') }}"  method="post"
                onsubmit="event.preventDefault();save(this,expChanged)">
                @csrf
                <input type="hidden" name="type" value="exp">
                <input type="hidden" name="editmode" value="1">
                <input type="hidden" name="id" value="{{ $exp->id }}">
                <div class="row form">
                    <div class="col-md-6">
                        <div class="row">

                            <div class="col-md-12">
                                <label for="company" req>Company</label>
                                <input value="{{ $exp->company }}" type="text" name="company" id="exp-{{$exp->id}}-company"
                                    class="input" required>
                            </div>

                            <div class="col-md-6">
                                <label for="name" req>Designation</label>
                                <input type="text" value="{{ $exp->name }}" list="data-name" name="name"
                                    id="exp-{{$exp->id}}-name" class="input" required>
                            </div>
                            <div class="col-md-6">
                                <label for="city" req>City</label>
                                <input type="text" value="{{ $exp->city }}" list="data-city" name="city"
                                    id="exp-{{$exp->id}}-city" class="input" required>
                            </div>
                            <div class="col-md-3">
                                <label for="start" req>Start Year</label>
                                <input type="text" value="{{ $exp->start }}" list="data-year" min="1900" max="2100"
                                    oninput="checkNumber(this)" name="start" id="exp-{{$exp->id}}-start" class="input"
                                    required>
                            </div>
                            <div class="col-md-3">
                                <label for="end" req>End Year</label>
                                <input type="text" value="{{ $exp->end }}" list="data-year" min="1900" max="2100"
                                    oninput="checkNumber(this)" name="end" id="exp-{{$exp->id}}-end" class="input" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="desc">Summary</label>
                        <textarea name="desc" id="exp-{{$exp->id}}-desc" rows="5"
                            class="input">{{ $exp->desc }}</textarea>
                    </div>
                    <div class="py-2 text-end">
                        <span class="btn btn-danger me-2" onclick="del('exp',{{$exp->id}})" >
                            Delete
                        </span>
                        <button class="btn btn-success">
                            Update
                        </button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>
