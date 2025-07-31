@extends('layouts.admin')

@section('title', 'Discount Create')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Discount Item</h1>
                <a href="{{ route('discount.index') }}" class="btn btn-dark">Back</a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $discount->name }}</h4>
                            <h4>{{ $discount->percent }}%</h4>
                            <h4>{{ $discount->start_date }}</h4>
                            <h4>{{ $discount->end_date }}</h4>
                        </div>
                    </div>
                    <div class="card my-4">
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('discount.storeItem', $discount->id) }}" method="POST">
                                @csrf

                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-md-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2"
                                                        id="product_{{ $product->id }}" name="products[]"
                                                        value="{{ $product->id }}" @checked(in_array($product->id, $discount_products))>

                                                    <label class="form-check-label flex-grow-1"
                                                        for="product_{{ $product->id }}">
                                                        @if ($product->thumb_img)
                                                            <img src="{{ $product->image() }}" alt="{{ $product->name }}"
                                                                class="me-2"
                                                                style="width:50px; object-fit:cover; border-radius:4px;">
                                                        @endif
                                                        {{ $product->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
    <script>
        $('#start_date').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false,
            minDate: moment()
        }).on('change', function(e, date) {
            // $('#end_date').val('')
            $('#end_date').bootstrapMaterialDatePicker('setMinDate', date);
        });

        $('#end_date').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });
    </script>
@endsection
