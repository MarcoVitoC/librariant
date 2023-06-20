<?php

namespace App\Http\Controllers\librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\librarian\UpdateBookRequest;
use App\Http\Requests\librarian\AddBookRequest;
use App\Services\librarian\BookService;

class BookController extends Controller
{
   private $bookService;

   public function __construct() {
      $this->bookService = new BookService();
   }

   public function addBook(AddBookRequest $request) {
      $this->bookService->addBook($request);
      return response()->json(['message' => 'Book added successfully!'], 200);
   }

   public function showBooks() {
      $books = $this->bookService->showBooks();
      return view('librarian.books', ['books' => $books]);
   }

   public function showBookDetails(Request $request) {
      $bookDetails = $this->bookService->showBookDetails($request);
      return response()->json(['book' => $bookDetails]);
   }

   public function updateBook(UpdateBookRequest $request) {
      $this->bookService->updateBook($request);
      return response()->json(['message' => 'Book updated successfully!'], 200);
   }

   public function removeBook(Request $request) {
      $this->bookService->removeBook($request);
      return response()->json(['message' => 'Book removed successfully!'], 200);
   }
}
