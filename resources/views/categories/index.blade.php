<!-- resources/views/categories/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>

    <h2>Categories</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}
                @if ($category->children->count() > 0)
                    <ul>
                        @foreach ($category->children as $child)
                            <li>{{ $child->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>

    <a href="{{ route('categories.create') }}">Add Category</a>

</body>
</html>
