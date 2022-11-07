<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="{{ Route('edit_data') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $data_category->id }}">
        <input value="{{ $data_category->name }}" class="@error('name') is-invalid @enderror" type="text" name="name" placeholder="Nama">
        <input value="{{ $data_category->is_publish }}" class="@error('is_publish') is-invalid @enderror" type="boolval" name="is_publish" placeholder="Apakah di Publish">
        <button type="submit">Simpan</button>
    </form>

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('is_publish')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</body>
</html>