@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">

        @include('pages.product.create')
        @include('pages.product.edit')

        <div class="card mt-2">
            <div class="card-header">
                <div class="d-flex inv-list-top-section justify-content-between">
                    <h5>Products List</h5>
                    <div class="dt-buttons">
                        <button
                            class="btn btn-primary btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#create-product-modal">
                            <span>Add New</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive mt-2 px-2">
                    @include('pages.product.table')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/product.js') }}"></script>
@endsection