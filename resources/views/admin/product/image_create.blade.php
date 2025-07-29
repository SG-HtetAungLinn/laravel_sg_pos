@extends('layouts.admin')

@section('title', 'Product Image Create')
@section('style')
    <style>
        .preview_img_container {
            overflow-x: hidden;
            height: 400px;
            border: 1px solid gray;
            border-radius: 8px;
            overflow-y: auto;
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        .preview_img img {
            width: 200px;
            height: auto;
            border: 1px solid gray;
            border-radius: 8px;
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h1>Product Create</h1>
        <div class="">
            <a href="" class="btn btn-dark">
                Back
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-md-8 col-sm-10 col-12">

            <div class="card">
                <div class="card-body">
                    <div class="preview_img_container">
                        <div class="d-flex flex-wrap my-3 preview_img" style="gap: 10px;">

                        </div>
                    </div>
                    <form action="{{ route('product.imageStore', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="file" name="product_img[]" multiple class="form-control" id="product_img">
                            <span class="error_msg text-danger"></span>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- {!! JsValidator::formRequest('App\Http\Requests\Product\ProductCreateRequest', '#create_form') !!} --}}
    <script>
        $('.error_msg').hide()
        // let currentFiles = [];
        // $('#product_img').change(function() {
        //     let files = $(this)[0]?.files;
        //     $('.error_msg').hide()
        //     if (files.length > 5) {
        //         $('.error_msg').show()
        //         $('.error_msg').text('File only can fill 5');
        //         $('#product_img').val('')
        //         return
        //     }
        //     if (files && files.length > 0) {
        //         $('.preview_img_container').html('');
        //         Array.from(files).forEach((item) => {
        //             const fileName = item.name
        //             const extension = fileName.split('.').pop().toLowerCase()
        //             if (extension == 'png' ||
        //                 extension == 'jpg' ||
        //                 extension == 'jpeg') {
        //                 const imageUrl = URL.createObjectURL(item);
        //                 const img = `<img src="${imageUrl}" class="preview_img">`
        //                 $('.preview_img_container').append(img);
        //             } else {
        //                 $('.error_msg').show()
        //                 $('.preview_img_container').html('');
        //                 $('.error_msg').text('File only allow png, jpg, jpeg');
        //                 $('#product_img').val('')
        //                 return
        //             }
        //         });
        //     }
        // });
        let currentFiles = [];

        $('#product_img').change(function() {
            const files = Array.from(this.files);
            $('.error_msg').hide();

            // Validate new files
            for (let file of files) {
                const extension = file.name.split('.').pop().toLowerCase();
                if (!['png', 'jpg', 'jpeg'].includes(extension)) {
                    $('.error_msg').show().text('File only allow png, jpg, jpeg');
                    $('#product_img').val('');
                    return;
                }
            }

            // Combine current + new files
            let combinedFiles = [...currentFiles, ...files];

            // Check total limit
            if (combinedFiles.length > 5) {
                $('.error_msg').show().text('Only up to 5 files allowed');
                $('#product_img').val('');
                return;
            }

            currentFiles = combinedFiles;

            // Show previews
            $('.preview_img').html('');
            currentFiles.forEach(file => {
                const imageUrl = URL.createObjectURL(file);
                const img = `<img src="${imageUrl}" class="preview_img">`;
                $('.preview_img').append(img);
            });

            // Clear input to allow re-upload of same file name if needed
            // $('#product_img').val('');
            console.log(currentFiles);

        });
    </script>
@endsection
