@extends('layouts.main')

@section('title', 'Extracurricular')

@section('content')
    <h1>Extracurricular</h1>
    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Extracurriculars</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($extracurriculars as $extracurricular)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $extracurricular->name }}</td> 
                    <td>
                        <a href="extracurricular/{{ $extracurricular->id }}" class="btn btn-secondary btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
