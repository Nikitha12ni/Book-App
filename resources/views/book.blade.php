<!-- resources/views/books/add.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file, adjust as needed -->

@section('content')
    <div class="container">
        <h2>Add a Book</h2>

        <form method="post" action="{{ route('books.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" class="form-control" required>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
@endsection
