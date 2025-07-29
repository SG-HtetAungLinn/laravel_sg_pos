@extends('layouts.admin')

@section('title', 'Product Create')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Product Create</h1>
                <a href="{{ route('product.list') }}" class="btn btn-dark">Back</a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card my-4">
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" id="create_form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control "
                                        value="{{ old('name') }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Please choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="stock_count">Stock Count</label>
                                    <input type="number" name="stock_count" id="stock_count" class="form-control "
                                        value="{{ old('stock_count') }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="sale_price">Sale Price</label>
                                    <input type="number" name="sale_price" id="sale_price" class="form-control "
                                        value="{{ old('sale_price') }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="purchase_price">Purchase Price</label>
                                    <input type="number" name="purchase_price" id="purchase_price" class="form-control "
                                        value="{{ old('purchase_price') }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="expire_date">Expire Date</label>
                                    <input type="text" name="expire_date" id="expire_date" class="form-control "
                                        value="{{ old('expire_date') }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="thumb_img">Thumbnail</label>
                                    <input type="file" name="thumb_img" id="thumb_img" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\Product\ProductCreateRequest', '#create_form') !!}
    <script>
        $('#expire_date').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });
    </script>
@endsection
