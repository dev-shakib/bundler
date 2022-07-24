@extends('backend.layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Bundle
@endsection

@push('custom-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bundle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Bundle</li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('public.bundle.files.update') }}" enctype="multipart/form-data"
                                method="post" id="image-upload" class="dropzone">
                                @csrf
                                <input type="hidden" name="file_id" value="{{ $file_id }}" />
                                <input type="hidden" name="bundle_id" value="{{ $bundle_id }}" />
                                <input type="hidden" name="section_id" value="{{ $section_id }}" />
                                <div>
                                    <h3>Upload .jpeg,.jpg,.png,.gif,.doc,.docx,.pdf By Click On Box</h3>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- /.Left col -->
                <!-- Right Col -->
                <section class="col-lg-6">
                    <div class="card">
                        <div class='card-header'>
                            Preview
                        </div>
                        <div class="card-body">
                            <a href="{{ asset('pdf/'.$file->filename) }}" class="btn btn-outline-primary">DOWNLOAD & PREVIEW</a>

                        </div>
                    </div>
                </section>
                <!-- /.Right Col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection

@push('custom-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            uploadMultiple: false,
            queueLimit: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.docx,.pdf",
            init: function() {
                var home = "{{ route('section.show', [$file->section_id]) }}";
                //now we will submit the form when the button is clicked
                this.on("success", function(files, response) {
                    location.href = home; // this will redirect you when the file is added to dropzone
                    //location.reload();
                });
            }
        };
    </script>
@endpush
