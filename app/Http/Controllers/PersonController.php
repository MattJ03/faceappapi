<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::all();
        return response()->json($people);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $person = Person::create();
        return response()->json($person);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $request->validate([
               'first_name' => 'required|string|max:50',
               'last_name' => 'required|string|max:50',
               'age' => 'required|integer|max:150',
              'hobby' => 'nullable|string|max:250',
               'gender' => 'required|in:male,female',
               'married' => 'required|boolean'

           ]);

           $person = Person::create(([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'age' => $request->age,
               'hobby' => $request->hobby,
               'gender' => $request->gender,
               'married' => $request->married,

           ]));
           return response()->json($person);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'age' => 'required|integer|max:150',
            'hobby' => 'nullable|string|max:250',
            'gender' => 'required|in:male,female',
            'married' => 'required|boolean'
        ]);

        $person = Person::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'hobby' => $request->hobby,
            'gender' => $request->gender,
            'married' => $request->married,
        ]);

        return response()->json($person);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $person = Person::find($id);
        if(!$person) {
            return response()->json(['error' => 'Person not found']);
        }
        $person->delete();
        return response()->json(['success' => 'Person deleted successfully']);
    }
}
