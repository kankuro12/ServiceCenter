
<span class="d-none" id="single-exp-template">
    <div class="accordion-item"  id="exp-single-xxx_id">
        <h2 class="accordion-header" id="heading-exp-xxx_id">
            <button class="accordion-button collapsed" id="heading-btn-exp-xxx_id" type="button" data-bs-toggle="collapse"
                data-bs-target="#exp-xxx_id" aria-expanded="true" aria-controls="exp-xxx_id">
                xxx_company
            </button>
        </h2>
        <div id="exp-xxx_id" class="accordion-collapse collapse"
            aria-labelledby="heading-exp-xxx_id" data-bs-parent="#exp-accordion">
            <div class="accordion-body">
                <form action="{{ route('resume.data-add') }}"  method="post"
                    onsubmit="event.preventDefault();save(this,expChanged)">
                    @csrf
                    <input type="hidden" name="type" value="exp">
                    <input type="hidden" name="editmode" value="1">
                    <input type="hidden" name="id" value="xxx_id">
                    <div class="row form">
                        <div class="col-md-6">
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="company" req>Company</label>
                                    <input value="xxx_company" type="text" name="company" id="exp-xxx_id-company"
                                        class="input" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="name" req>Designation</label>
                                    <input type="text" value="xxx_name" list="data-name" name="name"
                                        id="exp-xxx_id-name" class="input" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" req>City</label>
                                    <input type="text" value="xxx_city" list="data-city" name="city"
                                        id="exp-xxx_id-city" class="input" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="start" req>Start Year</label>
                                    <input type="text" value="xxx_start" list="data-year" min="1900" max="2100"
                                        oninput="checkNumber(this)" name="start" id="exp-xxx_id-start" class="input"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="end" req>End Year</label>
                                    <input type="text" value="xxx_end" list="data-year" min="1900" max="2100"
                                        oninput="checkNumber(this)" name="end" id="exp-xxx_id-end" class="input" required>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="desc">Summary</label>
                            <textarea name="desc" id="exp-xxx_id-desc" rows="5"
                                class="input">xxx_desc</textarea>
                        </div>
                        <div class="py-2 text-end">
                            <button class="btn btn-success">
                                Update
                            </button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</span>
