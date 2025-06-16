@extends('layouts.app')
@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <ol class="breadcrumb mb-sm-0 mb-3">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Courses</li>
        </ol><!-- End breadcrumb -->
        <div class="ms-auto">
            <div>
                <a href="{{ route('courses.create') }}" class="btn bg-warning-transparent text-warning btn-sm"
                    data-bs-toggle="tooltip" title="" data-bs-placement="bottom" data-bs-original-title="Add New">
                    <span>
                        <i class="fa fa-plus"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="container">
                    <h2>Course: {{ $course->title }}</h2>
                    <p><strong>Description:</strong> {{ $course->description }}</p>
                    <p><strong>Category:</strong> {{ $course->category }}</p>
                    <p><strong>Feature Video:</strong> {{ $course->feature_video }}</p>
                    <p><strong>Total Modules:</strong> {{ $course->modules->count() }}</p>

                    <a href="{{ route('courses.modules', $course->id) }}" class="btn btn-outline-primary">See Modules</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
@endsection
