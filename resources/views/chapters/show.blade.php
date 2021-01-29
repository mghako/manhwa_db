@extends('layouts.dashboard')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable-extension.css') }}">
@endsection
@section('page-title', 'View Chapter')

@section('main-content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items center">
                  <h5>Chapter - {{ $chapter->name }} / Series- {{$chapter->series->name}}</h5>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addContents">Add Contents</a>
                </div>
            </div>
            <div class="card-body">
                <!-- Vertically centered modal -->
                <!-- Modal -->
                <div class="modal fade" id="addContents" tabindex="-1" aria-labelledby="addContentsLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addContentsLabel">Add Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.upload.series.chapters', [$chapter->series->id, $chapter->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <input type="file" name="contents[]" multiple>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-js')
    
@endpush