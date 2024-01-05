<!-- resources/views/categories/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>

    <h2>Create Category</h2>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="parent_id">Parent Category:</label>
        <select name="parent_id">
            <option value="">None</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>

</body>
</html>
