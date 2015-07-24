<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DrexelClass;
use DB;
use Input;
use Response;

use Illuminate\Http\Request;

class SchedulizerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    public function search() {
        return view('schedulizer.search');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $results = array();

        $queries = DrexelClass::allCourseNo();

        foreach($queries as $query)
        {
            $results[] = [
                'id' => $query->crn,
                'value' => $query->subject_code . ' ' .
                           $query->course_no . ' ' .
                           $query->course_title . ' ',
                'desc' => $query->description];
        }

        return Response::json($results);
	}

    public function result() {
        $term = Input::get('q');

        $results = array();

        $queries = DrexelClass::search($term)->get();

        foreach($queries as $query)
        {
            $results[] = [
                'id' => $query->crn,
                'value' => $query->subject_code . ' ' .
                    $query->course_no . ' ' .
                    $query->course_title . ' ',
                'desc' => $query->description];
        }

        return Response::json($results);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
