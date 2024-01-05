<!-- resources/views/products/show_images.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Images</title>
</head>
<body>

    <h2>Product Images</h2>

    <img src="{{ $mainImage }}" alt="Main Image">
    
    @foreach ($additionalImages as $additionalImage)
        <img src="{{ $additionalImage }}" alt="Additional Image">
    @endforeach

</body>
</html>
