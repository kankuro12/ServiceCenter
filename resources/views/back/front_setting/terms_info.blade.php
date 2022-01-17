@extends('back.layouts.app')
@section('title', 'Terms & Condition Info')
@section('content')

    <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
            <!-- .page -->
            <div class="page">
                <!-- .page-inner -->
                <div class="page-inner">
                    <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> Terms & Condition Info </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            <form action="{{ url('dashboard/terms-and-condition-info') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @include('back.layouts.message')

                                <div class="form-group">
                                    <label for="title"> Terms & Condition <span style="color:red;">*</span></label>
                                    <textarea name="terms" id="terms" rows="10" class="form-control"
                                        required>{{ $info->terms }}</textarea>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-block">Update Item</button>
                            </form>
                        </div><!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@section('scripts')
    <script src="https://cdn.tiny.cloud/1/4adq2v7ufdcmebl96o9o9ga7ytomlez18tqixm9cbo46i9dn/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        $(function() {

            if (window.innerWidth > 768) {

                tinymce.init({
                    selector: '#terms',
                    plugins: [
                        '  advlist anchor autolink codesample fullscreen help image imagetools tinydrive',
                        ' lists link media noneditable  preview',
                        ' searchreplace table template  visualblocks wordcount'
                    ],
                    toolbar_mode: 'floating',
                });
            } else {
                $('#desc').addClass('form-control');
                $('#desc').css('height', '300px');
            }
        });
    </script>
@endsection
