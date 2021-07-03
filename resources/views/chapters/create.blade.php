@extends('layouts.dashboard')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable-extension.css') }}">
@endsection
@section('page-title', 'Add Chapter')

@section('main-content')

    

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Add Chapter</h5>
                <h4><a href="">Back to Series</a></h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store.series.chapters') }}" method="POST" class="form theme-form">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                      <div class="row">
                        <input type="hidden" name="series_id" value="{{ $series->id }}">
                        <div class="col">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Series Name</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" name="series_name" value="{{ $series->name }}" autocomplete="off" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Chapter Name</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" name="name" autocomplete="off">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="col-sm-9 offset-sm-3">
                        <button class="btn btn-primary" type="submit" data-original-title="" title="">Save</button>
                        <input class="btn btn-white" type="reset" value="Cancel" data-original-title="" title="">
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection

@push('custom-js')
    
@endpush