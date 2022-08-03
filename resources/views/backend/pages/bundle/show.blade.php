@extends('backend.layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Bundle
@endsection

@push('custom-css')
@endpush
@php
$enrolled_package = auth()
    ->user()
    ->load('enrolledPackage')->enrolledPackage;
@endphp
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
                        <li class="breadcrumb-item"><a href="{{ route('public.home') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ route('bundle.index') }}">Bundle</a></li>
                        <li class="breadcrumb-item active">{{ $bundle->name }} List</li>
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
                <section class="col-lg-12 connectedSortable">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">

                                            <h2><u>Bundle Name:</u> {{ $bundle->name }}</h2>
                                        </div>
                                        <div class="col-sm-4">
                                            @if ($enrolled_package->package_id == 1)
                                                @if ($bundle->totalPages() < 60)
                                                    @if ($bundle->generated->count() == 0)
                                                        <a href="{{ route('public.bundle.generate', [$bundle->id]) }}"
                                                            class="btn btn-outline-info">Generate Bundle</a>
                                                    @endif
                                                @else
                                                    <a href="#" class="btn btn-outline-info">Generate
                                                        Bundle</a>
                                                @endif
                                            @else
                                                @if ($bundle->generated->count() == 0)
                                                    <a href="{{ route('public.bundle.generate', [$bundle->id]) }}"
                                                        class="btn btn-outline-info">Generate Bundle</a>
                                                @endif
                                            @endif
                                            @if ($enrolled_package->package_id == 1)
                                                @if ($bundle->totalPages() < 60)
                                                    <a href="{{ route('public.bundle.generated_bundle', [$bundle->id]) }}"
                                                        class="btn btn-outline-info">View Generated Bundle</a>
                                                @else
                                                    <a href="#" class="btn btn-outline-info">View Generated
                                                        Bundle</a>
                                                @endif
                                            @else
                                                <a href="{{ route('public.bundle.generated_bundle', [$bundle->id]) }}"
                                                    class="btn btn-outline-info">View Generated Bundle</a>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class=" card">
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal"><i class="fa fa-plus"></i>
                                        Add
                                        File
                                    </button><br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Section Name</th>
                                                <th>Total Page</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sort_section">
                                            @foreach ($bundle->section as $s)
                                                @if ($s->isHiddenInList == 1)
                                                @else
                                                    <tr data-id="{{ $s->id }}">
                                                        <td>
                                                            {{ $s->name }}
                                                        </td>
                                                        <td>
                                                            {{ $s->files->sum('totalPage') }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('public.bundle.section.edit', [$bundle->id, $s->id]) }}"
                                                                class="btn btn-outline-primary"><i class="fa fa-pencil"></i>
                                                                Rename
                                                            </a>

                                                            <a href="{{ route('section.show', $s->id) }}"
                                                                class="btn btn-outline-primary"><i class="fa fa-eye"></i>
                                                                View
                                                                File</a>
                                                            <a href="{{ route('public.bundle.section.destroy', [$s->id]) }}"
                                                                class="btn btn-outline-danger"><i class="fa fa-trash"></i>
                                                                Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card ">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('section.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="bundle_id" value="{{ $bundle->id }}">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="text" placeholder="Section Name" class="form-control"
                                                    name="name">
                                            </div>
                                            <div class="col-sm-4"><input type="submit" class="btn btn-success"
                                                    value="Create" /></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection

@push('custom-script')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('public.bundle.files.store') }}" enctype="multipart/form-data" method="post"
                        id="image-upload" class="dropzone">
                        @csrf
                        <label>SECTION</label>
                        <select class="form-control" id="sectionId" name="section_id" required>
                            @foreach ($bundle->section as $item)
                                @if ($item->isHiddenInList == 1)
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select><br>
                        <input type="hidden" name="bundle_id" value="{{ $bundle->id }}" />
                        <div>
                            <h3>Upload .jpeg,.jpg,.png,.gif,.doc,.docx,.pdf By Click On Box</h3>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onClick="window.location.reload();"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script type="text/javascript">
        $("#sectionId").on('change', function() {
            if (!$(this).val() == "") {
                $('#image-upload').addClass('dropzone');
            } else {
                $('#image-upload').removeClass('dropzone');
            }
        });
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.docx,.pdf",
            init: function() {
                //now we will submit the form when the button is clicked
                this.on("success", function(files, response) {
                    // location.href = home; // this will redirect you when the file is added to dropzone
                    location.reload();
                });
            }

        };
    </script>
    <script>
        $(document).ready(function() {
            $('tbody').sortable();

            function updateToDatabase(idString) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: '{{ url('/bundle/section/update-order') }}',
                    method: 'POST',
                    data: {
                        ids: idString
                    },
                    success: function() {
                        //  alert('Successfully updated')
                        //do whatever after success
                    }
                })
            }

            var target = $('.sort_section');
            target.sortable({
                update: function(e, ui) {
                    var sortData = target.sortable('toArray', {
                        attribute: 'data-id'
                    })
                    updateToDatabase(sortData.join(','))
                }
            })

        })
    </script>
@endpush
