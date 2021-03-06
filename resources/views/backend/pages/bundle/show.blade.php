@extends('backend.layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Bundle
@endsection

@push('custom-css')
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
                        <li class="breadcrumb-item"><a href="{{ route("public.home") }}">Home</a></li>
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
                                    <h2><u>Bundle Name:</u> {{ $bundle->name }}</h2>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class=" card">
                                <div class="card-body">
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
                                                        <a href="{{ route('public.bundle.files.create', [$bundle->id, $s->id]) }}"
                                                            class="btn btn-outline-primary"><i class="fa fa-plus"></i>
                                                            Add
                                                            File</a>
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
