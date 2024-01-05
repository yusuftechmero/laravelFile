<!-- resources/views/products/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>

    <h2>Create Product</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" name="name" required>
        <br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br>

        <label for="main_image">Main Image:</label>
        <input type="file" name="main_image" accept="image/*" required>
        <br>

        <label for="additional_images">Additional Images:</label>
        <input type="file" name="additional_images[]" accept="image/*" multiple>
        <br>

        <button type="submit">Submit</button>
    </form>
<!-- Add this script to your create.blade.php file -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Add more input fields for additional images
        $('#add_image').click(function() {
            $('#additional_images').append('<input type="file" name="additional_images[]" accept="image/*">');
        });
    });
</script>

</body>
</html>
