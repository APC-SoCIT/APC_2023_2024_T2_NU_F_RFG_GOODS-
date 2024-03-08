$(document).ready(function() {
    $(document).on('click', '.category_checkbox', function () {
        var ids = [];
        var counter = 0;
        $('#catFilters').empty();
        $('.category_checkbox').each(function () {
            if ($(this).is(":checked"))
            ids.push($(this).attr('id'));
            $('#catFilters').append(`<div class="text-black"> 
            ${$(this).attr('attr-name')} 
            <button type="button" class="bg-rfg-accent" </button></div>`);
            counter++;

        });
    });

});

console.log('javascript loaded');

$(document).ready(function(){

    document.addEventListener('DOMContentLoaded', function() {
        const editProductButtons = document.querySelectorAll('.edit-product-button');
        editProductButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const productData = JSON.parse(button.getAttribute('data-product'));
                openModal(productData);
            });
        });
    
        function openModal(productData) {
            const editProductModal = document.getElementById('edit-product-modal');
    
            // Update modal content with productData
            const skuInput = editProductModal.querySelector('#sku');
            const nameInput = editProductModal.querySelector('#name');
            const priceInput = editProductModal.querySelector('#price');
            const categoryInput = editProductModal.querySelector('#category_id');
            const imageInput = editProductModal.querySelector('#image');
            const minQtyInput = editProductModal.querySelector('#min_qty');
            const maxQtyInput = editProductModal.querySelector('#max_qty');
            const reorderPtInput = editProductModal.querySelector('#reorder_pt');
            const descTextarea = editProductModal.querySelector('#desc');
    
            // Set input values
            skuInput.value = productData.sku;
            nameInput.value = productData.name;
            priceInput.value = productData.price;
            categoryInput.value = productData.category_id; // Assuming category_id is a property in $productData
            minQtyInput.value = productData.min_qty;
            maxQtyInput.value = productData.max_qty;
            reorderPtInput.value = productData.reorder_pt;
            descTextarea.value = productData.desc;
    
            // Show the modal
    
            console.log(productData);
        }
    
    });

});

function activateFunction(productData) {
    console.log(productData);
}