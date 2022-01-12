<div class="accordion-item" id="ref-single-{{ $ref->id }}">
    <h2 class="accordion-header" id="heading-ref-{{ $ref->id }}">
        <button class="accordion-button collapsed " id="heading-btn-ref-{{ $ref->id }}" type="button"
            data-bs-toggle="collapse" data-bs-target="#ref-{{ $ref->id }}" aria-refanded="true"
            aria-controls="ref-{{ $ref->id }}">
            {{ $ref->name }}
        </button>
    </h2>
    <div id="ref-{{ $ref->id }}" class="accordion-collapse collapse "
        aria-labelledby="heading-ref-{{ $ref->id }}" data-bs-parent="#ref-accordion">
        <div class="accordion-body">
            <form action="{{ route('resume.data-add') }}" method="post"
                onsubmit="event.preventDefault();save(this,refChanged)">
                @csrf
                <input type="hidden" name="type" value="ref">
                <input type="hidden" name="editmode" value="1">
                <input type="hidden" name="id" value="{{ $ref->id }}">
                <div class="row form">

                    <div class="col-md-6">
                        <label for="name" req>Name</label>
                        <input type="text" value="{{ $ref->name }}" list="data-name" name="name"
                            id="ref-{{ $ref->id }}-name" class="input" required>
                    </div>
                    <div class="col-md-6">
                        <label for="company" req>Company/Organization</label>
                        <input value="{{ $ref->company }}" type="text" name="company"
                            id="ref-{{ $ref->id }}-company" class="input" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" req>Phone </label>
                        <input type="text" name="phone" id="ref-{{ $ref->id }}-phone" class="input"
                            required value="{{ $ref->phone }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email" req>Email </label>
                        <input type="email" name="email" id="ref-{{ $ref->id }}-email" class="input"
                            required value="{{ $ref->email }}">
                    </div>

                    <div class="py-2 text-end">
                        <span class="btn btn-danger me-2" onclick="del('ref',{{ $ref->id }})">
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
