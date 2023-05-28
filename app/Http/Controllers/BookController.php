<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
