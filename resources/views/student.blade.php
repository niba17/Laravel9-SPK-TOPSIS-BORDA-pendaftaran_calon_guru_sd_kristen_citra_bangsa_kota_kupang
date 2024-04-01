@extends('layouts.main')

@section('title', 'Student')

@section('content')

    @if (Session::has('succMessage'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('succMessage') }}
        </div>
    @elseif(Session::has('errMessage'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('errMessage') }}
        </div>
    @endif

    <h1>Student</h1>

    <div class="my-3 col-lg-5 col-md-6 col-sm-12">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Keyword" aria-label="Username"
                    aria-describedby="basic-addon1" name="keyword">
                <button class="input-group-text btn btn-secondary">Search</button>
            </div>
        </form>
    </div>

    <a href="/student-add" class="btn btn-secondary btn-sm mb-3">Add Student</a>

    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Class</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->class->name }}</td>
                    <td>
                        @if (Auth::user()->role_id == 1)
                            <a href="/student-edit/{{ $student->id }}" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="/student-delete/{{ $student->id }}" class="btn btn-secondary btn-sm">Delete</a>
                        @endif
                        <a href="/student/{{ $student->id }}" class="btn btn-secondary btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-3">
        {{ $students->withQueryString()->links() }}
    </div>
@endsection
