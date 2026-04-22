
const Product = {

    init() {
        this.create();
        this.update();
        this.events();
    },

    events() {

        $(document).on('click', '.delete-product', (e) => this.delete(e));
        $(document).on('click', '.edit-product', (e) => this.edit(e));

    },

    create() {

        $('#create-product-form').validate({

            rules: {
                product: { required: true }
            },

            submitHandler: (form) => {

                AjaxHelper.request({
                    url: '/products',
                    method: 'POST',
                    data: $(form).serialize(),
                    loader: '#loader',
                    button: '#save-product'
                })

                .then(res => {

                    UI.toast(res.message);

                    $('#create-product-modal').modal('hide');

                    form.reset();
                    $(form).validate().resetForm();

                    Product.render(res.products);

                });

            }

        });

    },

    update() {

        $('#edit-product-form').validate({

            rules: {
                product: { required: true }
            },

            submitHandler: (form) => {

                const id = $('#edit-product-id').val();

                AjaxHelper.request({
                    url: '/products/' + id,
                    method: 'PUT',
                    data: $(form).serialize(),
                    loader: '#edit-loader',
                    button: '#edit-save-product'
                })

                .then(res => {

                    UI.toast(res.message);

                    $('#edit-product-modal').modal('hide');

                    form.reset();
                    $(form).validate().resetForm();

                    Product.render(res.products);

                });

            }

        });

    },

    delete(event) {

        event.preventDefault();

        const id = $(event.currentTarget).data('id');

        UI.confirm().then(result => {

            if (!result.isConfirmed) return;

            AjaxHelper.request({
                url: '/products/' + id,
                method: 'DELETE'
            })

            .then(res => {

                UI.toast(res.message);

                Product.render(res.products);

            });

        });

    },

    edit(event) {

        event.preventDefault();

        const id = $(event.currentTarget).data('id');

        AjaxHelper.request({
            url: '/products/' + id + '/edit',
            method: 'GET'
        })

        .then(res => {

            $('#edit-product-name').val(res.product.name);
            $('#edit-product-id').val(id);

            $('#edit-product-modal').modal('show');

        });

    },

    render(products) {

        const tbody = $('#product-table-body');

        tbody.empty();

        let startIndex = products.from || 0;

        products.data.forEach((product, index) => {

            tbody.append(`
                <tr>
                    <td>${startIndex + index}</td>
                    <td>${product.created_at_formatted}</td>
                    <td>
                        <div class="d-flex justify-content-evenly">

                            <a href="#"
                               class="delete-product"
                               data-id="${product.encrypted_id}">
                               <i class="fa-solid fa-trash text-danger"></i>
                            </a>

                            <a href="#"
                               class="edit-product"
                               data-id="${product.encrypted_id}">
                               <i class="fa-solid fa-pen-to-square text-success"></i>
                            </a>

                        </div>
                    </td>
                </tr>
            `);

        });

    }

};

$(document).ready(function () {
    Product.init();
});