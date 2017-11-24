<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddJobRequest;
use App\Http\Requests\UpdateJob;
use Illuminate\Http\Request;
use App\JobOffer;
use App\Company;
use Illuminate\Queue\Jobs\Job;

class JobOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }

    public function searchApi($word){

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joboffers = JobOffer::all();
        //$joboffers = JobOffer::orderBy('created_at','desc')->paginate(5);
        return view('joboffers.index')->with('joboffers',$joboffers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('joboffers.create')->with('companies',$companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AddJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddJobRequest $request)
    {
        $job = JobOffer::create($request->only(
            'title', 'description', 'date', 'skills','company_id'
        ));

        return redirect()->route('joboffers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = JobOffer::find($id);
        return view ('joboffers.show')->with('job',$job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = JobOffer::find($id);
        $companies= Company::all();
        return view('joboffers.edit',['job'=>$job,'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJob  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJob $request, $id)
    {
        $job = JobOffer::find($id);
        $job->fill($request->all());
        $job->save();
        return redirect()->route('joboffers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = JobOffer::find($id);
        $job->delete();
        return redirect('/joboffers')->with('success','Offer Deleted
        ');
    }
}
