<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Feedback;

class FeedbackController extends Controller
{
    //
    public function store()
    {
    	$this->validate(request(),[
    		'title' => 'required',
    		'body' => 'required',
    		'stars' => 'required'
    	]);
        $user = User::find(1);
    	$data = request()->all();
        $data['user_id'] = $user->id; 
    	Feedback::create($data);

        return redirect()->to('/feedback');
    }
    public function show()
    {
    	$feedbacks = Feedback::latest()->get();

    	return view('feedback.show', compact('feedbacks'));
    }
    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback'));
    }
    public function update(Feedback $feedback)
    {   
        $feedback->update(request()->all());
        return redirect()->to('/feedback');
    }
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->to('/feedback');
    }
}
