@extends('layouts.test')
@section('page-content')
<style>
    .category-container {
        display: flex;
        flex-wrap: wrap;
    }


    .category-button {
        display: inline-block;
        padding: 10px;
        margin: 5px;
        border: none;
        cursor: pointer;
        background-color: #e0e0e0;
        /* Default background color */
    }



    /* Hide the checkboxes */
</style>
@if ($errors->any())
<div class="alert alert-secondary">

    @foreach ($errors->all() as $error)
    <p class="primary">{{ $error }}</p>

    @endforeach

</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Blog Information</h5>
                        </div>

                        <form method="POST" action="{{route('blog.update', $blog->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="mb-4 row align-items-center" @if($errors->has('title'))style="background-color: rgb(248, 186, 181);" @endif>
                                <label class="form-label-title col-sm-3 mb-0">Blog
                                    Title</label>
                                <div class="col-sm-9">
                                    <input name="title" class="form-control" type="text" value='{{$blog->title}}' placeholder="Blog Title">
                                </div>

                            </div>

                            <div class="mb-4 row align-items-center" @if($errors->has('content'))style="background-color: rgb(248, 186, 181);" @endif>
                                <label class="col-sm-3 col-form-label form-label-title">Blog Content</label>
                                <div class="col-sm-9">

                                    <textarea class="mytextarea" name="content" id="editor" cols="30" rows="10">{{$blog->content}}</textarea>
                                </div>

                            </div>
                            <div class="mb-4 row align-items-center" @if($errors->has('quote'))style="background-color: rgb(248, 186, 181);" @endif>
                                <label class="col-sm-3 col-form-label form-label-title">Special Quote</label>
                                <div class="col-sm-9">

                                    <textarea class="form-control" name="quote" id="editor" cols="30" rows="5">{{$blog->quote}}</textarea>
                                </div>

                            </div>

                            <div class="mb-4 row align-items-center" @if($errors->has('quote_author'))style="background-color: rgb(248, 186, 181);" @endif>
                                <label class="form-label-title col-sm-3 mb-0">Quote Author</label>
                                <div class="col-sm-9">
                                    <input name="quote_author" class="form-control" type="text" value='{{$blog->quote_author}}' placeholder="Quote writer name">
                                </div>

                            </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-body" @if($errors->has('images'))style="background-color: rgb(248, 186, 181);" @endif>
                        <div class="card-header-2">
                            <h5>Blog Images</h5>
                        </div>

                        <div class="theme-form theme-form-2 mega-form">
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Images</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-choose" name="images[]" type="file" id="selectImage" multiple>
                                </div>
                            </div>
                            <h4>Preview</h4>
                            <div id="previewContainer"></div>
                            <hr />
                            <h3>Previous Images</h3>
                            @foreach($blog->getMedia('images') as $image)
                            <img src="{{$image->getFullUrl()}}" alt="{{$blog->title}}" height='200px' width="200px">
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Search engine listing</h5>
                        </div>



                        <div class="theme-form theme-form-2 mega-form">
                            <div class="mb-4 row align-items-center" @if($errors->has('meta_title'))style="background-color: rgb(248, 186, 181);" @endif>
                                <label class="form-label-title col-sm-3 mb-0">Page title</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="search" name='meta_title' placeholder="Meta title" value="{{$blog->meta_title}}">
                                </div>
                            </div>

                            <div class="mb-4 row" @if($errors->has('meta_description'))style="background-color: rgb(248, 186, 181);" @endif>
                                <label class="form-label-title col-sm-3 mb-0">Meta
                                    description</label>
                                <div class="col-sm-9">

                                    <textarea id='mytextarea' rows="3" name='meta_description'>{{$blog->meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Publish Now</label>
                                <div class="col-sm-9">
                                    <label class="switch">
                                        <input type="checkbox" name="status" value="published" {{$blog->status === 'published' ? 'checked' : ''}}><span class="switch-state"></span>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-solid" type='submit'>Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    //listens to changes on dom with id selectImage
    selectImage.onchange = evt => {
        // grabs element with id previewContainer
        const previewContainer = document.getElementById('previewContainer');
        // sets its innerHTML to an empty string to clear previous previews
        previewContainer.innerHTML = '';

        const files = selectImage.files;

        for (const file of files) {
            // creates an image element for each file
            const img = document.createElement('img');
            img.style.maxWidth = '200px'; // Adjust the size as needed
            img.style.maxHeight = '200px'; // Adjust the size as needed

            // if there is a file, change src of img to the upload object URL
            if (file) {
                img.src = URL.createObjectURL(file);
                previewContainer.appendChild(img);

            }
        }
    };
</script>


@endsection