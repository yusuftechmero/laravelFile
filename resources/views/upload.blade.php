<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".png, .webp, .pdf, .doc, .docx">
    <button type="submit">Upload</button>
</form>


<!-- resources/views/upload.blade.php -->
@if(session('path'))
    <p>File uploaded successfully. <a href="{{ route('get-file', basename(session('path'))) }}">View file</a></p>
@endif
