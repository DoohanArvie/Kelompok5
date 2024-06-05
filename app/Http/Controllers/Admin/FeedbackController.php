<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\FeedbackRequest;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::get();

        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function destroy($id)
    {
        $feedback = Feedback::findorFail($id);
        $feedback->delete();
        return back();
    }
}    