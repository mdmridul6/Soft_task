@extends('layouts.app')
@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <ol class="breadcrumb mb-sm-0 mb-3">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
            <li class="breadcrumb-item"> <a href="{{ route('courses.index') }}">Course</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Module</li>
        </ol><!-- End breadcrumb -->
        <div class="ms-auto">
            <div>
                <a href="{{ route('courses.index') }}" class="btn bg-warning-transparent text-warning btn-sm"
                    data-bs-toggle="tooltip" title="" data-bs-placement="bottom" data-bs-original-title="Back">
                    <span>
                        <i class="fa fa-arrow-left"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->

    <div class="col-md-12">


        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($course->modules as $index => $module)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        {{ $module->title }}
                                    </div>
                                    <div class="card-body">
                                        @if ($module->contents->count())
                                            <div class="accordion" id="accordionContent">

                                                @foreach ($module->contents as $index => $content)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse-{{ $loop->parent->index }}-{{ $index }}"
                                                                aria-expanded="true"
                                                                aria-controls="collapse-{{ $loop->parent->index }}-{{ $index }}">
                                                                {{ $content->title }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse-{{ $loop->parent->index }}-{{ $index }}"
                                                            class="accordion-collapse collapse show"
                                                            data-bs-parent="#accordionContent">
                                                            <div class="accordion-body">
                                                                <small>Source: {{ $content->video_source_type }} |
                                                                    Length:
                                                                    {{ $content->video_length }}</small><br>
                                                                <small>URL: <a href="{{ $content->video_url }}"
                                                                        target="_blank">{{ $content->video_url }}</a></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-muted">No content available in this module.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- END ROW -->
@endsection

<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse{{ $index }}" aria-expanded="false"
            aria-controls="flush-collapse{{ $index }}">
            {{ $module->title }}
        </button>
    </h2>
    <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#moduleAccordion">
        <div class="accordion-body">
            @if ($module->contents->count())
                <ul class="list-group">
                    @foreach ($module->contents as $content)
                        <li class="list-group-item">
                            <strong>{{ $content->title }}</strong><br>
                            <small>Source: {{ $content->video_source_type }} | Length:
                                {{ $content->video_length }}</small><br>
                            <small>URL: <a href="{{ $content->video_url }}"
                                    target="_blank">{{ $content->video_url }}</a></small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No content available in this module.</p>
            @endif
        </div>
    </div>
</div>
