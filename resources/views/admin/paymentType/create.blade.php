@extends('layouts.admin')

@section('title', 'Payment Type Create')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Payment Type Create</h1>
                <a href="{{ route('paymentType.list') }}" class="btn btn-dark">Back</a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card my-4">
                        <div class="card-body">
                            <form action="{{ route('paymentType.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="name">Payment Type Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @endif"
                                        value="{{ old('name') }}" />
                                    @error('name')
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
