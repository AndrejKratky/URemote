<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\WebsiteReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriteController extends Controller
{
    public function index($what) {
        return view('write', ['what' => $what]);
    }

    public function writeWebsiteReview(Request $request) {
        dd('here');
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'reviewText' => 'required|string'
        ]);

        $user = $request->user();
        $websiteReview = new WebsiteReview();
        $websiteReview->user_id = $user->id;
        $websiteReview->review_text = $request->input('reviewText');
        $websiteReview->rating = $request->input('rating');
        $websiteReview->save();

        return response()->json(['message' => 'Review submitted successfully']);
    }


    public function writeBookReview($bookId) {

    }
}
