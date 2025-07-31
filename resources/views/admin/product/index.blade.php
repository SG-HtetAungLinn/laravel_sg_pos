@extends('layouts.admin')

@section('title', 'Product List')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Product List</h1>
                <a href="{{ route('product.create') }}" class="btn btn-primary">Create</a>
            </div>
            @if (session('success'))
                <div class="col-md-4 offset-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="col-md-4 offset-md-8">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-4">
                        <input type="search" name="search" id="search" class="form-control" placeholder="Search here">
                    </div>
                    <div class="col-md-4">
                        <select name="category" id="category" class="form-control">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="discount" id="discount" class="form-control">
                            <option value="">All</option>
                            @foreach ($discounts as $discount)
                                <option value="{{ $discount->id }}">{{ $discount->name }} ({{ $discount->percent }}%)
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card my-4">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th class="sort" data-name="name">Name</th>
                                <th class="sort" data-name="category_id">Category</th>
                                <th class="sort" data-name="stock_count">Stock</th>
                                <th class="sort" data-name="sale_price">Sale Price</th>
                                <th class="sort" data-name="purchase_price">Purchase Price</th>
                                <th class="sort" data-name="created_at">Create Date</th>
                                <th class="sort" data-name="updated_at">Update Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="product_body">

                        </tbody>
                        <input type="hidden" id="sort_by" value="id">
                        <input type="hidden" id="sort_dir" value="desc">
                    </table>
                    <div id="paginationLinks" class="mt-3 d-flex justify-content-end"></div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            getData()
            $('#search,#category,#discount').change(function() {
                getData()
            });
            $('.sort').click(function() {
                let column = $(this).data('name')
                let currentSort = $('#sort_dir').val()
                $('#sort_by').val(column)
                currentSort === 'asc' ? $('#sort_dir').val('desc') : $('#sort_dir').val('asc')
                getData()
            });

            function getData(pageUrl = null) {
                let page = 1;
                if (pageUrl) {
                    const urlParams = new URLSearchParams(pageUrl.split('?')[1]);
                    page = urlParams.get('page') || 1;
                }
                $.ajax({
                    url: "{{ route('product.discountProduct') }}",
                    type: 'POST',
                    data: {
                        search: $('#search').val(),
                        category: $('#category').val(),
                        discount: $('#discount').val(),
                        sort_dir: $('#sort_dir').val(),
                        sort_by: $('#sort_by').val(),
                        page: page // <-- send the page number
                    },
                    success: function(res) {
                        let html = `<tr>
                                <td colspan="10" class="text-center">
                                    There is no data.
                                </td>
                            </tr>`;
                        if (res.success) {
                            let index = 0;
                            if (res.products.length > 0) {
                                html = '';
                                res.products.forEach(product => {
                                    index++
                                    const percent = product.discounts.length > 0 ? product
                                        .discounts[0]
                                        .percent : 0
                                    const sale_price = product.sale_price - (product
                                        .sale_price *
                                        percent / 100)

                                    html += `
                                    <tr>
                                        <td>${index}</td>
                                        <td><img src="${product.image}" alt=""
                                                style="width:80px;">
                                        </td>
                                        <td>${product.name}</td>
                                        <td>${product.category.name}</td>
                                        <td>${ product.stock_count }</td>
                                        <td>
                                            <span class="me-2" style="${percent?'text-decoration:line-through; color: red;':''}">${product.sale_price} MMK</span>${percent?sale_price+' MMK':''} 
                                        </td>
                                        <td>${product.purchase_price}MMK</td>
                                        <td>${product.created_at}</td>
                                        <td>${product.updated_at}</td>
                                        <td>
                                            <a href="${product.edit}"
                                                    class="btn btn-sm btn-info">Edit</a>
                                                <a href="${product.imageCreate}"
                                                    class="btn btn-sm btn-primary">Image</a>
                                                <a href="${product.delete}"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                                <a href="${product.details}"
                                                    class="btn btn-sm btn-secondary">Details</a>
                                        </td>
                                    </tr>
                                `;

                                });
                            }
                            $('.product_body').html(html)
                            renderPagination(res.pagination);
                        }
                    }
                })
            }

            function renderPagination(pagination) {
                let html = `<nav><ul class="pagination">`;

                if (pagination.prev_page_url) {
                    html +=
                        `<li class="page-item"><a class="page-link" href="${pagination.prev_page_url}">&laquo;</a></li>`;
                } else {
                    html += `<li class="page-item disabled"><span class="page-link">&laquo;</span></li>`;
                }

                const totalPages = pagination.last_page;
                const currentPage = pagination.current_page;

                const range = 2;
                let start = Math.max(currentPage - range, 1);
                let end = Math.min(currentPage + range, totalPages);

                if (start > 1) {
                    html +=
                        `<li class="page-item"><a class="page-link" href="${pagination.path}?page=1">1</a></li>`;
                    if (start > 2) {
                        html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                    }
                }

                for (let i = start; i <= end; i++) {
                    if (i === currentPage) {
                        html += `<li class="page-item active"><span class="page-link">${i}</span></li>`;
                    } else {
                        html +=
                            `<li class="page-item"><a class="page-link" href="${pagination.path}?page=${i}">${i}</a></li>`;
                    }
                }

                if (end < totalPages) {
                    if (end < totalPages - 1) {
                        html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                    }
                    html +=
                        `<li class="page-item"><a class="page-link" href="${pagination.path}?page=${totalPages}">${totalPages}</a></li>`;
                }

                if (pagination.next_page_url) {
                    html +=
                        `<li class="page-item"><a class="page-link" href="${pagination.next_page_url}">&raquo;</a></li>`;
                } else {
                    html += `<li class="page-item disabled"><span class="page-link">&raquo;</span></li>`;
                }

                html += '</ul></nav>';

                $('#paginationLinks').html(html);

                // rebind AJAX click
                $('#paginationLinks .page-link').click(function(e) {
                    e.preventDefault();
                    const url = $(this).attr('href');
                    if (url) getData(url);
                });
            }



        })
    </script>
@endsection
