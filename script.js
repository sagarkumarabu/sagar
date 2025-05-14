
  const toggleButton = document.getElementById('darkModeToggle');
  toggleButton.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
  });
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.buy-button').forEach(button => {
        button.addEventListener('click', function() {
            const quantity = this.previousElementSibling.value;
            const productName = this.parentElement.querySelector('h3').textContent;
            alert(`Added ${quantity} of ${productName} to cart!`);
        });
    });
});
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.product-card').forEach(card => {
        const minusBtn = card.querySelector('.qty-minus');
        const plusBtn = card.querySelector('.qty-plus');
        const qtyInput = card.querySelector('.qty-input');

        minusBtn.addEventListener('click', () => {
            let qty = parseInt(qtyInput.value);
            if (qty > 1) {
                qtyInput.value = qty - 1;
            }
        });

        plusBtn.addEventListener('click', () => {
            let qty = parseInt(qtyInput.value);
            qtyInput.value = qty + 1;
        });

        card.querySelector('.buy-button').addEventListener('click', () => {
            const productName = card.querySelector('h3').textContent;
            const quantity = qtyInput.value;
            alert(`You added ${quantity} x ${productName} to your cart.`);
        });
    });
});
    $(document).ready(function() {
    $('.editBtn').click(function() {
        var row = $(this).closest('tr');
        var id = $(this).data('id');
        var name = row.find('.editable[data-column="name"]').text();
        var price = row.find('.editable[data-column="price"]').text();
        var category = row.find('.editable[data-column="category"]').text();
        var description = row.find('.editable[data-column="description"]').text(); // Add this line

        $.ajax({
            url: 'update.php',
            type: 'POST',
            data: {
                id: id,
                name: name,
                price: price,
                category: category,
                description: description // Include it here too
            },
            success: function(response) {
                alert(response);
            }
        });
    });
});

    // Delete product
   $.ajax({
    url: 'delete.php',
    type: 'POST',
    data: { id: id },
    success: function(response) {
        console.log("Server response:", response); // 👈 Add this
        if (response.trim() === 'success') {
            row.remove();
        } else {
            alert('Error deleting product: ' + response);
        }
    }
});



