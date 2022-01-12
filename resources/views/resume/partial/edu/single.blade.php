<div class="accordion-item" id="edu-single-{{$edu->id}}">
    <h2 class="accordion-header" id="heading-edu-{{ $edu->id }}">
        <button class="accordion-button collapsed" id="heading-btn-edu-{{ $edu->id }}" type="button" data-bs-toggle="collapse"
            data-bs-target="#edu-{{ $edu->id }}" aria-expanded="true" aria-controls="edu-{{ $edu->id }}">
            {{ $edu->school }}
        </button>
    </h2>
    <div id="edu-{{ $edu->id }}" class="accordion-collapse collapse "
        aria-labelledby="heading-edu-{{ $edu->id }}" data-bs-parent="#edu-accordion">
        <div class="accordion-body">
            <form action="{{ route('resume.data-add') }}"  method="post"
                onsubmit="event.preventDefault();save(this,eduChanged)">
                @csrf
                <input type="hidden" name="type" value="edu">
                <input type="hidden" name="editmode" value="1">
                <input type="hidden" name="id" value="{{ $edu->id }}">
                <div class="row form">
                    <div class="col-md-6">
                        <div class="row">

                            <div class="col-md-12">
                                <label for="school" req>School / Collage</label>
                                <input value="{{ $edu->school }}" type="text" name="school" id="edu-{{$edu->id}}-school"
                                    class="input" required>
                            </div>

                            <div class="col-md-6">
                                <label for="degree" req>Degree / Course</label>
                                <input type="text" value="{{ $edu->degree }}" list="data-degree" name="degree"
                                    id="edu-{{$edu->id}}-degree" class="input" required>
                            </div>
                            <div class="col-md-6">
                                <label for="city" req>City</label>
                                <input type="text" value="{{ $edu->city }}" list="data-city" name="city"
                                    id="edu-{{$edu->id}}-city" class="input" required>
                            </div>
                            <div class="col-md-3">
                                <label for="start" req>Start Year</label>
                                <input type="text" value="{{ $edu->start }}" list="data-year" min="1900" max="2100"
                                    oninput="checkNumber(this)" name="start" id="edu-{{$edu->id}}-start" class="input"
                                    required>
                            </div>
                            <div class="col-md-3">
                                <label for="end" req>End Year</label>
                                <input type="text" value="{{ $edu->end }}" list="data-year" min="1900" max="2100"
                                    oninput="checkNumber(this)" name="end" id="edu-{{$edu->id}}-end" class="input" required>
                            </div>
                            <div class="col-md-6">
                                <label for="grade" req>Grade / Divison</label>
                                <input type="text"  value="{{ $edu->grade }}" name="grade" id="edu-{{$edu->id}}-grade" class="input" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="desc">Summary</label>
                        <textarea name="desc" id="edu-{{$edu->id}}-desc" rows="5"
                            class="input">{{ $edu->desc }}</textarea>
                    </div>
                    <div class="py-2 text-end">
                        <span class="btn btn-danger me-2" onclick="del('edu',{{$edu->id}})" >
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
