<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BorrowAndReturn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>ระบบยืมคืนครุภัณฑ์โรงพยาบาลส่งเสริมสุขภาพตำบลบ้านเกาะ</h2>
            </div>
            <div>
                <a href="{{ route('nameoftools.create') }}"class="btn btn-success">เพิ่มอุปกรณ์</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
            <tr>
                    <th>รหัส</th>
                    <th>ชื่ออุปกรณ์</th>
                    <th>จำนวน</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach($nameoftools as $nameoftool)
                    <tr>
                        <td>{{ $nameoftool->id }}</td>
                        <td>{{ $nameoftool->name }}</td>
                        <td>{{ $nameoftool->amount }}</td>
                        <td>
                            <form action="{{ route('nameoftools.destroy', $nameoftool->id) }}" method="POST">
                                <a href="{{ route('nameoftools.edit', $nameoftool->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $nameoftools->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</body>
</html>