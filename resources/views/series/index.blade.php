@extends('layouts.dashboard')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable-extension.css') }}">
@endsection
@section('page-title', 'Series')

@section('main-content')

    

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Series Page</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="mySeriesTbl" class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Released date</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($series as $s)
                        <tr>
                            <th scope="row">{{ $s->id }}</th>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->released_date }}</td>
                            <td>{{ $s->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('admin.series.show', $s->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>View</a>
                                <a href="{{ route('admin.series.edit', $s->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Edit</a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-js')
    <script src="{{ asset('js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/jszip.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('js/datatable/datatable-extension/custom.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#mySeriesTbl').DataTable();
        });
    </script>
@endpush