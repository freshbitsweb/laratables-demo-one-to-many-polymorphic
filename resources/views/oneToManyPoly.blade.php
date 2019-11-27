@extends('layouts.master')

@section('content')

    <div class="container">
        <table id="one-to-many-poly" class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Post Title</th>
                    <th>Post Image</th>
                    <th>Liked By</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

@endsection
