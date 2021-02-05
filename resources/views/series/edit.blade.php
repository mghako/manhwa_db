@extends('layouts.dashboard')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable-extension.css') }}">
@endsection
@section('page-title', 'Add Series')

@section('main-content')

    

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Series</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.series.store') }}" method="POST" class="form theme-form">
                @csrf
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Series Name</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" name="name" autocomplete="off" value="{{ $series->name }}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value="{{ $series->category->id }}" selected>{{ $series->category->name }}</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Released Date</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="date" name="released_date" value="{{ $series->released_date }}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status_id">
                                  <option value="{{ $series->status->id }}">{{ $series->status->name }}</option>
                                  @foreach($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label pt-0">Thumbnails</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="thumbnail" accept="image/*" placeholder="image type only">
                            </div>
                          </div>
                          <div class="form-group row mb-0">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" placeholder="Add Description Here..." name="description">{{ $series->description }}</textarea>
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