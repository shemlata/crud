<table id="product-table" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Created At</th>
            <th style="width:130px">Action</th>
        </tr>
    </thead>
    <tbody id="product-table-body">
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->created_at_formatted }}</td>
            <td>
                <div class="d-flex justify-content-evenly">
                    <a href="javascript:void(0)"
                       data-id="{{ $product->encrypted_id }}"
                       class="delete-product">
                       <i class="fa-solid fa-trash text-danger"></i>
                    </a>
                    <a href="javascript:void(0)"
                       data-id="{{ $product->encrypted_id }}"
                       class="edit-product">
                       <i class="fa-solid fa-pen-to-square text-success"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagenate">
    {{ $products->links('pagination::bootstrap-5') }}
</div>