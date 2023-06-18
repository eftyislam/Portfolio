@extends('admin.layout.main')
@section('title','Profile')


@section('content')
<div  class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">PAGES</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ul>
            <h1 class="page-header mb-0"> Profile</h1>
        </div>

        <div class="ms-auto">
            <a href="" class="btn btn-outline-theme"> All Blog</a>
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
                                <form  action="{{ route('profile.store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class=" mb-3">
                                        <label for="exampleInputUsername1">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Your Name" >
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="exampleInputUsername1">Designation</label>
                                        <input type="text" name="designation" class="form-control" id="designation"  placeholder="Enter Your Designation" >
                                        @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Profile</label>
                                        <input type="file" name="profile" class="form-control" id="profile">
                                        @error('profile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="exampleInputUsername1">Github</label>
                                        <input type="text" name="github" class="form-control" id="github"  placeholder="Enter Your Github Link" >
                                        @error('github')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="exampleInputUsername1">Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control" id="linkedin"  placeholder="Enter Your Linkedin Link" >
                                        @error('linkedin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="exampleInputUsername1">Facebook</label>
                                        <input type="text" name="facebook" class="form-control" id="facebook"  placeholder="Enter Your Facebook Link" >
                                        @error('facebook')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="get_in_touch" class="form-label">Textarea</label>
                                        <textarea name="get_in_touch" class="form-control" id="summernote" placeholder="Get in Touch " ></textarea>
                                        @error('get_in_touch')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" class="form-control" id="location"  placeholder="Enter Your Location" >
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="email">Location</label>
                                        <input type="email" name="email" class="form-control" id="email"  placeholder="Enter Your email" >
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="number">Number</label>
                                        <input type="text" name="number" class="form-control" id="number"  placeholder="Enter Your Number" >
                                        @error('number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class=" mb-3">
                                        <label for="Freelance">Freelance</label>
                                        <input type="text" name="Freelance" class="form-control" id="Freelance"  placeholder="Enter Your Freelance" >
                                        @error('Freelance')
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
