<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    <div>
        <div>
            <h1>Tabel Category</h1>
        </div>

        @if(Session::has('success'))
            <div>{{ session('success') }}</div>
        @endif

        <div>
            <a href="{{ Route('tambah_data') }}"><button>Tambah Data</button></a>
        </div>

        <form action="{{ route('data_category') }}" method="POST">
            @csrf
            <input type="text" name="search" value="{{ $search }}">
            <button type="submit">Search</button>
            <a href="{{ route('data_category') }}"><Button>Reset</Button></a>
        </form>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Apakah Di Publish</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_category as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->is_publish }}</td>
                        <td>
                            <a href="{{ url('/edit_data/'.$value->id) }}"><button>Edit</button></a>
                            <a href="{{ url('/hapus_data/'.$value->id) }}"><button>Hapus</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data_category->links() }}
        </div>
    </div>
    
</body>
</html>