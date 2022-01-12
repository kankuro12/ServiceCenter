
<span class="d-none" id="single-edu-template">
    <div class="accordion-item"  id="edu-single-xxx_id">
        <h2 class="accordion-header" id="heading-edu-xxx_id">
            <button class="accordion-button" id="heading-btn-edu-xxx_id" type="button" data-bs-toggle="collapse"
                data-bs-target="#edu-xxx_id" aria-expanded="true" aria-controls="edu-xxx_id">
                xxx_school
            </button>
        </h2>
        <div id="edu-xxx_id" class="accordion-collapse collapse"
            aria-labelledby="heading-edu-xxx_id" data-bs-parent="#edu-accordion">
            <div class="accordion-body">
                <form action="{{ route('resume.data-add') }}"  method="post"
                    onsubmit="event.preventDefault();save(this,eduChanged)">
                    @csrf
                    <input type="hidden" name="type" value="edu">
                    <input type="hidden" name="editmode" value="1">
                    <input type="hidden" name="id" value="xxx_id">
                    <div class="row form">
                        <div class="col-md-6">
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="school" req>School / Collage</label>
                                    <input value="xxx_school" type="text" name="school" id="edu-xxx_id-school"
                                        class="input" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="degree" req>Degree / Course</label>
                                    <input type="text" value="xxx_degree" list="data-degree" name="degree"
                                        id="edu-xxx_id-degree" class="input" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" req>City</label>
                                    <input type="text" value="xxx_city" list="data-city" name="city"
                                        id="edu-xxx_id-city" class="input" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="start" req>Start Year</label>
                                    <input type="text" value="xxx_start" list="data-year" min="1900" max="2100"
                                        oninput="checkNumber(this)" name="start" id="edu-xxx_id-start" class="input"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="end" req>End Year</label>
                                    <input type="text" value="xxx_end" list="data-year" min="1900" max="2100"
                                        oninput="checkNumber(this)" name="end" id="edu-xxx_id-end" class="input" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="grade" req>Grade / Divison</label>
                                    <input type="text"  value="xxx_grade" name="grade" id="edu-xxx_id-grade" class="input" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="desc">Summary</label>
                            <textarea name="desc" id="edu-xxx_id-desc" rows="5"
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
