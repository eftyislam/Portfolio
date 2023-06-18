@extends('admin.layout.main')
@section('title','About Edit')


@section('content')
<div  class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">PAGES</a></li>
                <li class="breadcrumb-item active">About Edit</li>
            </ul>
            <h1 class="page-header mb-0"> About Edit</h1>
        </div>

        <div class="ms-auto">
            <a href="" class="btn btn-outline-theme"> All About</a>
        </div>
    </div>
    <hr class="mb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div  class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form  action="{{ route('about.update',$about->id) }}" method="post" class="forms-sample">
                                    @csrf
                                    <div class=" mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"  placeholder="Enter Your Title" value="{{ $about->title }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="header">Designation</label>
                                        <input type="text" name="header" class="form-control" id="header"  placeholder="Enter Your Header" value="{{ $about->header }}">
                                        @error('header')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="description" class="form-label">Textarea</label>
                                        <textarea name="description" class="form-control" id="summernote" placeholder="Enter Your Description">{{ $about->description }}"</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>




                                    {{-- <div class="mb-3">
                                        <label for="validationTextarea" class="form-label">Textarea</label>
                                        <textarea name="desc" class="form-control" id="summernote" required ></textarea>

                                    </div> --}}



                                    {{-- <div class="mb-3">
                                        <label class="form-label" for="profile"> Add your profile</label>
                                        <input type="file" class="form-control" id="profile" name="image" value="">
                                    </div> --}}

                                    <div class="mb-3 d-grid">
                                        <button type="submit" name="submit" class="btn btn-outline-theme">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                            <div class="hljs-container">
                                <pre><code class="xml" data-url="{{ asset('assets') }}/assets/data/form-plugins/code-1.json"></code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.alert')
@endsection




@section('script')

@endsection
