<div class="d-none" id="single-ref-template">
    <div class="accordion-item" id="ref-single-xxx_id">
        <h2 class="accordion-header" id="heading-ref-xxx_id">
            <button class="accordion-button collapsed " id="heading-btn-ref-xxx_id" type="button"
                data-bs-toggle="collapse" data-bs-target="#ref-xxx_id" aria-refanded="true" aria-controls="ref-xxx_id">
                xxx_name
            </button>
        </h2>
        <div id="ref-xxx_id" class="accordion-collapse collapse " aria-labelledby="heading-ref-xxx_id"
            data-bs-parent="#ref-accordion">
            <div class="accordion-body">
                <form action="{{ route('resume.data-add') }}" method="post"
                    onsubmit="event.preventDefault();save(this,refChanged)">
                    @csrf
                    <input type="hidden" name="type" value="ref">
                    <input type="hidden" name="editmode" value="1">
                    <input type="hidden" name="id" value="xxx_id">
                    <div class="row form">
                        <div class="col-md-6">
                            <label for="name" req>Name</label>
                            <input type="text" value="xxx_name" list="data-name" name="name" id="ref-xxx_id-name"
                                class="input" required>
                        </div>
                        <div class="col-md-6">
                            <label for="company" req>Company/Organization</label>
                            <input value="xxx_company" type="text" name="company" id="ref-xxx_id-company"
                                class="input" required>
                        </div>

                        <div class="col-md-6">
                            <label for="phone" req>Phone </label>
                            <input type="text" name="phone" id="ref-xxx_id-phone" class="input" required
                                value="xxx_phone">
                        </div>
                        <div class="col-md-6">
                            <label for="email" req>Email </label>
                            <input type="email" name="email" id="ref-xxx_id-email" class="input" required
                                value="xxx_email">
                        </div>

                        <div class="py-2 text-end">
                            <span class="btn btn-danger me-2" onclick="del('ref',xxx_id)">
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

</div>
