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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Bundle</li>
                        <li class="breadcrumb-item active">Index</li>
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
                    <div class="card">
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

                            @if(count($bundle) == 0)
                            <form action="{{ route('bundle.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="text" placeholder="Bundle Name" class="form-control" name="name">
                                    </div>
                                    <div class="col-sm-4"><input type="submit" class="btn btn-success" value="Create" />
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            @if (Session::has('message'))
                                <div class="alert alert-success">
                                    <h4>{{ Session::get('message') }}</h4>
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Bundle Name</th>
                                        <th>Total Page</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($bundle as $b)
                                        <tr>
                                            <td>
                                                {{ $b->name }}
                                            </td>
                                            <td>
                                                {{ $b->totalPages() }}
                                            </td>
                                            <td>
                                                 @if($b->totalPages() > 60)
                                    <span class="text-danger">You do not have permission to generate bundle more then 60 pages</span><br>
                            @endif
                                                <a href="{{ route('bundle.show_single', [$b->slug, $b->id]) }}"
                                                    class="btn btn-outline-primary"><i class="fa fa-eye"></i> VIEW</a>
                                                <a href="{{ route('bundle.edit', $b->id) }}"
                                                    class="btn btn-outline-primary"><i class="fa fa-pencil"></i> RENAME</a>


                                                <a href="@if($b->totalPages() < 60){{ route('public.bundle.generate', [$b->id]) }}@else # @endif"
                                                    class="btn btn-outline-info">Generate Bundle</a>

                                                <a href="@if($b->totalPages() < 60){{ route('public.bundle.generated_bundle', [$b->id]) }}@else # @endif"
                                                    class="btn btn-outline-info">View Generated Bundle</a>
                                                <form action="{{ route('bundle.destroy', [$b->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger"><i
                                                            class="fa fa-trash"></i> DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
@endpush
