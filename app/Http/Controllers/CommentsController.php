<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct() {}

    public function new_comment(CommentFormRequest $request){
    	$comment = new Comment(array(
    		'ticket_id' => $request->get('ticket_id'),
    		'content' => $request->get('content'),
    		'user_id' => auth()->user()->id
    		));
		$comment->save();
		return redirect()->back()->with('status', 'Your comment has been created!');
    }
}
