@extends('backend.layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Bundle
@endsection

@push('custom-css')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    @php
    $enrolled_package = auth()
        ->user()
        ->load('enrolledPackage')->enrolledPackage;
    @endphp

    <div style="display: none">
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
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mt-3 justify-content-center">
                <div class="col-5 text-center">
                    @if ($enrolled_package->package_id == 1)
                        <div class="card bg-danger">
                            <div class="card-body p-2">
                                You are now free Plan Please Upgrad Your Plan
                                <a href="{{ route('public.choosePlan') }}" class="btn btn-dark ml-3">UPGRADE</a>
                            </div>
                        </div>
                    @elseif ($enrolled_package->package_id == 2)
                        <div class="card bg-primary">
                            <div class="card-body p-2">
                                UPGRADE TO UNLIMITED
                                <a href="{{ route('public.choosePlan') }}" class="btn btn-success ml-3">UPGRADE</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                
                <div class="mb-3">
                    <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i>
                        New Bundle
                    </button>
                </div>
                  
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">New Bundle</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($enrolled_package->package_id == 1)
                                @if (count($bundle) == 0)
                                    <form action="{{ route('bundle.store') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="text" placeholder="Bundle Name" class="form-control"
                                                    name="name" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary"
                                                value="Create" />
                                        </div>
                                    </form>
                                    @else
                                        <div class="modal-body text-danger">
                                            You are now free Plan Please Upgrad Your Plan
                                        </div>
                                        
                                        <div class="modal-footer justify-content-start">
                                                <a href="{{ route('public.choosePlan') }}" class="btn btn-danger">UPGRADE</a>
                                            </div>
                                @endif
                            @elseif($enrolled_package->package_id == 2)
                                @if (intval(count($bundle)) < 5)
                                    <form action="{{ route('bundle.store') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="text" placeholder="Bundle Name" class="form-control"
                                                    name="name" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary"
                                                value="Create" />
                                        </div>
                                    </form>
                                @endif
                            @else
                                <form action="{{ route('bundle.store') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="text" placeholder="Bundle Name" class="form-control"
                                                name="name" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary"
                                            value="Create" />
                                    </div>
                                </form>
                            @endif
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            <h4>{{ Session::get('message') }}</h4>
                        </div>
                    @endif

                    <div style="display: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bundle Name</th>
                                <th>Created</th>
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
                                    <td>{{ $b->created_at }}</td>
                                    <td>
                                        {{ $b->totalPages() }}
                                    </td>
                                    <td>
                                        @if ($enrolled_package->package_id == 1)
                                            @if ($b->totalPages() > 60)
                                                <span class="text-danger">You do not have permission to generate
                                                    bundle
                                                    more then 60 pages</span><br>
                                            @endif
                                        @endif
                                        <a href="{{ route('bundle.show_single', [$b->slug, $b->id]) }}"
                                            class="btn btn-outline-primary"><i class="fa fa-eye"></i> VIEW</a>
                                        <a href="{{ route('bundle.edit', $b->id) }}"
                                            class="btn btn-outline-primary"><i class="fa fa-pencil"></i> RENAME</a>
                                        @if ($enrolled_package->package_id == 1)
                                            @if ($b->totalPages() < 60)
                                                @if ($b->generated->count() == 0)
                                                    <a href="{{ route('public.bundle.generate', [$b->id]) }}"
                                                        class="btn btn-outline-info">Generate Bundle</a>
                                                @endif
                                            @else
                                                <a href="#" class="btn btn-outline-info">Generate
                                                    Bundle</a>
                                            @endif
                                        @else
                                            @if ($b->generated->count() == 0)
                                                <a href="{{ route('public.bundle.generate', [$b->id]) }}"
                                                    class="btn btn-outline-info">Generate Bundle</a>
                                            @endif
                                        @endif
                                        @if ($enrolled_package->package_id == 1)
                                            @if ($b->totalPages() < 60)
                                                <a href="{{ route('public.bundle.generated_bundle', [$b->id]) }}"
                                                    class="btn btn-outline-info">View Generated Bundle</a>
                                            @else
                                                <a href="#" class="btn btn-outline-info">View Generated
                                                    Bundle</a>
                                            @endif
                                        @else
                                            <a href="{{ route('public.bundle.generated_bundle', [$b->id]) }}"
                                                class="btn btn-outline-info">View Generated Bundle</a>
                                        @endif
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

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Bundle Name</th>
                                <th>Created</th>
                                <th>Total Page</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($bundle as $b)
                            <tr>
                                <a href="">
                                <td class="py-1 pl-3 align-middle">
                                    {{ $b->name }}
                                </td>

                                <td class="py-1 pl-3 align-middle">{{ $b->created_at }}</td>

                                <td class="py-1 pl-3 align-middle">
                                    {{ $b->totalPages() }}
                                </td>

                                <td class="py-1 pl-3 align-middle text-right">
                                    <a title="view" href="{{ route('bundle.show_single', [$b->slug, $b->id]) }}" class="text-white">
                                        <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                    </a>

                                    <a title="rename" href="{{ route('bundle.edit', $b->id) }}">
                                    <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button>
                                    </a>

                                    <form title="delete" action="{{ route('bundle.destroy', [$b->id]) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    <!-- <script>
        $(document).ready(function() {
            $('table').DataTable({
                select: false,
                searching: false,
                paging: false,
            });
        });
    </script> -->
@endpush
