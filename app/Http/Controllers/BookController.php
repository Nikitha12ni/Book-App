<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
class BookController extends Controller
{
    public function addBook(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|string',
        ]);

        // Create a new book
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');
        $book->save();

        return response()->json(['message' => 'Book added successfully']);
    }
    public function assignBook(Request $request)
{
    // Validate input
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'book_id' => 'required|exists:books,id',
    ]);

    // Logic for assigning the book to the user (you should have a pivot table for user_book relationships)
    $user = User::find($request->input('user_id'));
    $book = Book::find($request->input('book_id'));

    $user->books()->attach($book->id);

    return response()->json(['message' => 'Book assigned successfully']);
}
// Example store method in BookController.php

public function store(Request $request)
{
    // Validate input
    $request->validate([
        'title' => 'required|string',
        'author' => 'required|string',
        'isbn' => 'required|string',
        // Add more validation rules as needed
    ]);

    // Logic to store the book in the database
    Book::create($request->all());

    // Redirect back or to a success page
    return redirect()->back()->with('success', 'Book added successfully');
}


}
