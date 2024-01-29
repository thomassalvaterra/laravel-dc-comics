<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comics;

use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{

    public function validation($data)
    {
        $validated = Validator::make($data, [
            "title" => "required|min:5|max:30",
            "description" => "required|max:300",
            "thumb" => "required|min:1",
            "price" => "required|max:20",
            "series" => "required|max:20",
            "sale_date" => "required",
            "type" => "required|min:2|max:30",
        ], [
            'title.required' => 'Campo obbligatorio',
            'title.max' => 'Hai superato il numero massimo dai caratteri consentiti',
            'title.min' => 'E necessario inserire più caratteri',
            'description.required' => 'Campo obbligatorio',
            'description.max' => 'Hai superato il numero massimo dai caratteri consentiti',
            'thumb.required' => 'Campo obbligatorio',
            'thumb.min' => 'E necessario inserire più caratteri',
            'price.required' => 'Campo obbligatorio',
            'price.max' => 'Hai superato il numero massimo dai caratteri consentiti',
            'series.required' => 'Campo obbligatorio',
            'series.max' => 'Hai superato il numero massimo dai caratteri consentiti',
            'sale_date.required' => 'Campo obbligatorio',
            'type.required' => 'Campo obbligatorio',
            'type.min' => 'E necessario inserire più caratteri',
            'type.max' => 'Hai superato il numero massimo dai caratteri consentiti'
        ])->validate();

        return $validated;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elements = Comics::all();

        return view("comics.index", compact("elements"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);

        $comic = new Comics();
        $comic->fill($dati_validati);
        $comic->save();

        return redirect()->route("comics.show", $comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comics::find($id);
        return view("comics.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comics $comic)
    {
        return view("comics.edit", compact("comic"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comics $comic)
    {
        $data = $request->all();
        $dati_validati = $this->validation($data);

        $comic->update($dati_validati);

        return redirect()->route("comics.show", $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comics $comic)
    {
        $comic->delete();

        return redirect()->route("comics.index");
    }
}
