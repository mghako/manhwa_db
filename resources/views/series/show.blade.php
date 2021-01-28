@extends('layouts.dashboard')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable-extension.css') }}">
@endsection
@section('page-title', 'Series Page')

@section('main-content')



    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Series-({{ $series->name }}) / Released Date: {{ $series->released_date }}</h5>
                    <a href="{{ route('admin.create.series.chapters', $series->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Chapter</a>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <img src="{{ asset('images/onepunchman_season1.jpg') }}" alt=""
                        class="d-block text-center mx-auto my-2">
                    <section id="description">

                        <h5>Description</h5>
                        <p>{{ $series->description }}</p>
                    </section>
                    <section id="category" class="my-4">
                        <h5>Category</h5>
                        <p><span class="badge badge-info">{{ $series->category->name }}</span></p>
                    </section>
                </div>
                <div class="card-footer">
                    <div class="col-sm-9">
                        
                        <section id="chapter">
                            <h5>Chapters</h5>
                            <div class="d-flex justify-content-start align-items-center">
                            @foreach($series->chapters as $chapter)
                                <a href="{{ route('admin.show.series.chapters', [$series->id, $chapter->id]) }}" class="badge badge-primary">{{ $chapter->name }}</a>
                            @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-js')

@endpush
