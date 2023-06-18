



@extends('admin.layout.main')
@section('title','Profile')

@section('style')
<style>
    .tags-input {
        display: inline-block;
        position: relative;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px;
        box-shadow: 2px 2px 5px #00000033;
        width: 50%;
    }

    .tags-input ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .tags-input li {
        display: inline-block;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 20px;
        padding: 5px 10px;
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .tags-input input[type="text"] {
        border: none;
        outline: none;
        padding: 5px;
        font-size: 14px;
    }

    .tags-input input[type="text"]:focus {
        outline: none;
    }

    .tags-input .delete-button {
        background-color: transparent;
        border: none;
        color: #999;
        cursor: pointer;
        margin-left: 5px;
    }
</style>
@endsection

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
                                <form  action="{{ route('portfolio.store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
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
                                        <div class="tags-input">
                                            <ul id="tags"></ul>
                                            <input type="text" name="tags" id="input-tag"class="form-control" placeholder="Enter tag name">
                                        </div>
                                        @error('input-tag')
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

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Profile</label>
                                        <input type="file" name="multi_image[]" multiple class="form-control" id="profile">
                                        @error('profile')
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

<script>

    // Get the tags and input elements from the DOM
    const tags = document.getElementById('tags');
    const input = document.getElementById('input-tag');

    // Add an event listener for keydown on the input element
    input.addEventListener('keydown', function (event) {

        // Check if the key pressed is 'Enter'
        if (event.key === 'Enter') {

            // Prevent the default action of the keypress
            // event (submitting the form)
            event.preventDefault();

            // Create a new list item element for the tag
            const tag = document.createElement('li');

            // Get the trimmed value of the input element
            const tagContent = input.value.trim();

            // If the trimmed value is not an empty string
            if (tagContent !== '') {

                // Set the text content of the tag to
                // the trimmed value
                tag.innerText = tagContent;

                // Add a delete button to the tag
                tag.innerHTML += '<button class="delete-button">X</button>';

                // Append the tag to the tags list
                tags.appendChild(tag);

                // Clear the input element's value
                input.value = '';
            }
        }
    });

    // Add an event listener for click on the tags list
    tags.addEventListener('click', function (event) {

        // If the clicked element has the class 'delete-button'
        if (event.target.classList.contains('delete-button')) {

            // Remove the parent element (the tag)
            event.target.parentNode.remove();
        }
    });
</script>
@endsection

