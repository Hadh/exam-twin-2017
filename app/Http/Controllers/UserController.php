<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\JobOffer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add_to_fav($job_id){
        $user = Auth::user();
        $user->joboffers()->attach($job_id);
        $job = JobOffer::find($job_id);
        return view('joboffers.show')->with('job',$job);

    }

    public function remove_from_fav($job_id){
        $user = Auth::user();
        $user->joboffers()->detach($job_id);
        $job = JobOffer::find($job_id);
        return view('joboffers.show')->with('job',$job);

    }
}
