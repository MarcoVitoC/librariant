<?php

namespace App\Http\Controllers\librarian;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\librarian\AddBookRequest;
use App\Http\Requests\librarian\UpdateBookRequest;
use App\Http\Controllers\Controller;
use App\Services\librarian\BookService;

class BookController extends Controller
{
   private $bookService;

   public function __construct() {
      $this->bookService = new BookService();
   }

   public function index() {
      $books = $this->bookService->showBooks();
      return view('librarian.books', ['books' => $books]);
   }

   public function store(AddBookRequest $request) {
      $this->bookService->addBook($request);
      return response()->json(['message' => 'New book added successfully!'], 200);
   }

   public function edit(Book $book) {
      return response()->json(['book' => $book]);
   }

   public function update(UpdateBookRequest $request, Book $book) {
      $this->bookService->updateBook($request, $book);
      return response()->json(['message' => 'Book updated successfully!'], 200);
   }

   public function destroy(Book $book) {
      $this->bookService->removeBook($book);
      return response()->json(['message' => 'Book removed successfully!'], 200);
   }
}
