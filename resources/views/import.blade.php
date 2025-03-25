<!DOCTYPE html>
<html>

<head>
    <title>Import Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Import Users from Excel</h2>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Upload Excel File</label>
                <input type="file" name="file" class="form-control" id="file" accept=".xlsx,.xls" required>
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>

    </div>
    <div class="mt-5 container">
        <a href="/export">
            <button class="btn btn-primary">Export</button>
        </a>

    </div>
</body>

</html>