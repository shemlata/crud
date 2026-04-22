<div class="modal fade" data-bs-backdrop="static" id="edit-product-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="edit-product-form" method="POST" novalidate>
                @csrf
                <input type="hidden" id="edit-product-id" name="product_id">
                <div class="modal-body">
                    // Write your form fields here
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-sm btn-primary" id="edit-save-product">
                        Save
                    </button>
                    <button class="btn btn-primary btn-sm d-none" type="button" disabled id="edit-loader">
                        <span class="spinner-border spinner-border-sm"></span>
                        Loading...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>