<x-guest-layout>
<form method="POST" action="{{ route('addBook') }}">
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

</x-guest-layout>