<div class="modal fade" data-bs-backdrop="static" id="create-product-modal" tabindex="-1"
    aria-labelledby="create-product-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create-product-modalLabel">Add New Product</h1>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form action="#" id="create-product-form" method="POST" novalidate>
                @csrf
                <div class="modal-body">

                    // Write your form fields here

                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-sm btn-secondary"
                            data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit"
                            class="btn btn-sm btn-primary"
                            id="save-product">
                        Save
                    </button>
                    <button class="btn btn-primary btn-sm d-none"
                            type="button"
                            disabled
                            id="loader">
                        <span class="spinner-border spinner-border-sm"
                              aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>