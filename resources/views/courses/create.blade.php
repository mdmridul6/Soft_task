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
                <a href="javascript:void(0);" class="btn bg-warning-transparent text-warning btn-sm" data-bs-toggle="tooltip"
                    title="" data-bs-placement="bottom" data-bs-original-title="Back">
                    <span>
                        <i class="fa fa-right-arrow"></i>
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
                <div class="card-header">
                    All Cources
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.store') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Course Title</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="category" value="{{ old('category') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Feature Video</label>
                            <input type="text" name="feature_video" value="{{ old('feature_video') }}"
                                class="form-control">
                        </div>

                        <hr>
                        <div id="modules-wrapper"></div>
                        <button type="button" onclick="addModule()" class="btn btn-primary">Add Module +</button>

                        <hr>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->


@endsection

@push('script')
    <script>
        let moduleIndex = 0;

        function addModule() {
            let moduleHtml = `
    <div class="card mt-4 p-3" id="module-${moduleIndex}">
<div class="card-header d-flex justify-content-between">

<h5>Module</h5>
<button type="button" class="btn bg-danger text-lught btn-sm" onclick="removeModule(${moduleIndex})">
        <span>
            Remove Module
        </span>
    </button>
    </div>

        <input name="modules[${moduleIndex}][title]" class="form-control mb-2" placeholder="Module Title" required>
        <div id="contents-${moduleIndex}"></div>
        <button type="button" class="btn btn-sm btn-info" onclick="addContent(${moduleIndex})">Add Content +</button>
    </div>`;
            document.getElementById('modules-wrapper').insertAdjacentHTML('beforeend', moduleHtml);
            moduleIndex++;
        }

        function addContent(modIndex) {
            let contentWrapper = document.getElementById(`contents-${modIndex}`);
            let contentCount = contentWrapper.childElementCount;
            let html = `
    <div class="border p-2 mt-2" id="content-${modIndex}-${contentCount}">
        <button type="button" class="btn bg-danger text-lught btn-sm pull-right mb-2" onclick="removeContent(${modIndex},${contentCount})">
        <span>
            Remove Content
        </span>
    </button>
    <span>content-${modIndex}-${contentCount}</span>
        <input name="modules[${modIndex}][contents][${contentCount}][title]" class="form-control mb-1" placeholder="Content Title" required>
        <input name="modules[${modIndex}][contents][${contentCount}][video_source_type]" class="form-control mb-1" placeholder="Video Source Type">
        <input type="url" name="modules[${modIndex}][contents][${contentCount}][video_url]" class="form-control mb-1" placeholder="Video URL" required>
        <input name="modules[${modIndex}][contents][${contentCount}][video_length]" class="form-control mb-1" placeholder="Video Length (HH:MM:SS)">
    </div>`;
            contentWrapper.insertAdjacentHTML('beforeend', html);
        }



        function removeContent(modIndex, contentCount) {
      event.target.closest(`#content-${modIndex}-${contentCount}`).remove()


        }

        function removeModule(modIndex) {
           event.target.closest(`#module-${modIndex}`).remove()


        }
    </script>
@endpush
