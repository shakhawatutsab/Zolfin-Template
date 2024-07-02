<form action="{{route('upload-image')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="thumbnail">

    <input type="submit" value="Upload Image">
</form>
