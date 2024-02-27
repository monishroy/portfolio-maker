@extends('backend.layouts.main')

@section('title', 'Create Template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('templates.store') }}" autocomplete="off" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Template Name</label>
                                <input type="text" name="temp_name" class="form-control @error('temp_name') border-danger @enderror" id="product-title-input" placeholder="Enter product title" value="{{old('temp_name')}}" required>
                                <div class="invalid-feedback">Please Enter a template name.</div>
                                @error('temp_name')<small class="text-danger form-text">{{$message}}</small>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Template Folder</label>
                                <input type="text" name="temp_path" class="form-control @error('temp_path') border-danger @enderror" id="product-title-input" placeholder="Enter product title" value="{{old('temp_path')}}" required>
                                <div class="invalid-feedback">Please Enter a template folder.</div>
                                @error('temp_path')<small class="text-danger form-text">{{$message}}</small>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Product Description</label>
                                <textarea id="content" name="description" required>{{old('description')}}</textarea>
                                <div class="invalid-feedback">Please Enter a template description.</div>
                                @error('description')<small class="text-danger form-text">{{$message}}</small>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Template Gallery</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5 class="fs-14 mb-1">Template Gallery</h5>
                                <p class="text-muted">Add Template Gallery Images.</p>
                                <div class="w-100">
                                    <input class="form-control d-none" name="images[]" type="file" id="image-input" multiple="multiple" required>
                                    <label for="image-input" class="p-5 rounded border border-2 border-dashed cursor-pointer w-100" style="">
                                        <div class="mb-3 text-center">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>
                                        <h5 class="text-center">Drop files here or click to upload.</h5>
                                    </label>
                                    @error('images.*')<small class="text-danger form-text">{{$message}}</small>@enderror
                                    <div class="invalid-feedback">Please Enter a Template images.</div>
                                </div>
                            </div>
                            <div class="row" id="image-preview-container">
                                
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-primary w-sm">Submit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
@push('js')

    <!-- ckeditor -->
    <script src="{{ asset('backend/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('backend/assets/libs/dropzone/dropzone-min.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script> --}}
    <script>
        ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <script src="{{ url('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    {{-- validation init  --}}
    <script src="{{ url('backend/assets/js/pages/form-validation.init.js') }}"></script>
    
    <script>
        $(document).ready(function() {

            // Category Dropdown
            $('#category-dropdown').on('change', function() {
                var categoryId = $(this).val();
                
                $('#sub-category-dropdown').html('');
                $.ajax({
                url: '/fetch/sub_categories',
                method: 'POST',
                dataType: 'json',
                data:{category_id: categoryId,_token:"{{ csrf_token() }}"},
                success: function(response) {
                    
                    $('#sub-category-dropdown').html('<option value="">Select Sub Category</option>');
                    $.each(response.sub_categories,function(index, val){
                        $('#sub-category-dropdown').append('<option value="'+val.id+'">'+val.name+'</option>')
                    });
                }
                });
            });

            //Product Image Show
            // Function to handle file input change event
            $('#image-input').change(function() {
                // Clear existing previews
                $('#image-preview-container').empty();

                // Get selected files
                var files = $(this)[0].files;

                // Loop through each selected file
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];

                    // Create a FileReader object
                    var reader = new FileReader();

                    // Closure to capture the file information
                    reader.onload = (function(file) {
                        return function(e) {
                            // Append the image to the preview container
                            $('#image-preview-container').append(`<div class="col-12 mt-3">
                                <div class="border bg-light rounded">
                                    <div class="d-flex row">
                                        <div class="col-6">
                                            <div class="bg-light rounded">
                                                <img class="img-fluid rounded d-block" src="${e.target.result}" alt="Product-Image" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pt-1">
                                                <h5 class="fs-14 mb-1">${file.name}</h5>
                                                <p class="fs-13 text-muted mb-0">${formatBytes(file.size)}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`);
                        };

                    })(file);

                    // Read the file as a data URL
                    reader.readAsDataURL(file);
                }
            });
            
            // Function to format file size in bytes to human-readable format
            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }
        });
    </script>
@endpush