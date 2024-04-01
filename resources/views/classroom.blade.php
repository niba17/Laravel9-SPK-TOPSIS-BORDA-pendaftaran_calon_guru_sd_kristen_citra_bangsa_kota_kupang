@extends('layouts.main')

@section('title', 'Classroom')

@section('content')
    <h1>Classroom</h1> 
    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $class->name }}</td>
                    <td><a href="classroom/{{ $class->id }}" class="btn btn-secondary btn-sm">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
