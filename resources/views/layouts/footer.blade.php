<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).on('click', '.delete-cart', function() {
    var cartURL = $(this).data('url');
    var trObj = $(this);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: cartURL,
        type: 'DELETE', // Ensure that the DELETE method is used
        dataType: 'json',
        success: function(data) {
            console.log(data.message); // Check the response in the browser console
            trObj.closest("tr").remove(); // Remove the closest <tr> element
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(xhr.responseText); // Log any errors to the console
        }
    });
});

$(document).on('click', '.delete-product', function() {
    var productURL = $(this).data('url');
    var trObj = $(this);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: productURL,
        type: 'DELETE', // Ensure that the DELETE method is used
        dataType: 'json',
        success: function(data) {
            console.log(data.message); // Check the response in the browser console
            trObj.closest("tr").remove(); // Remove the closest <tr> element
        },
        error: function(xhr, textStatus, errorThrown) {
            console.error(xhr.responseText); // Log any errors to the console
        }
    });
});

</script>
<!--xóa sản phẩm tiền cũng giảm -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-cart');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const price = parseFloat(row.cells[4].innerText);
            const totalPriceElement = document.getElementById('total-price');
            const totalPrice = parseFloat(totalPriceElement.innerText);
            totalPriceElement.innerText = totalPrice - price;
        });
    });
});
</script>


</body>

</html>
