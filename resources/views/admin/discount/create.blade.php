@extends('layouts.admin')

@section('title', 'Discount Create')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Discount Create</h1>
                <a href="{{ route('discount.index') }}" class="btn btn-dark">Back</a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card my-4">
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('discount.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="name">Discount Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @endif"
                                        value="{{ old('name') }}" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="percent">Discount Percent</label>
                                    <input type="number" name="percent" id="percent"
                                        class="form-control @error('percent') is-invalid @endif"
                                        value="{{ old('percent') }}" />
                                    @error('percent')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="start_date">Start Date</label>
                                    <input type="text" name="start_date" id="start_date"
                                        class="form-control @error('start_date') is-invalid @endif"
                                        value="{{ old('start_date') }}" />
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="end_date">End Date</label>
                                    <input type="text" name="end_date" id="end_date"
                                        class="form-control @error('end_date') is-invalid @endif"
                                        value="{{ old('end_date') }}" />
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit"
                                        class="btn btn-primary w-100">Create</button>
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
