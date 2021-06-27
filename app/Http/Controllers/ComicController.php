<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // recupero i fumetti dal database
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // grazie a $request->all prendo tutte le coppie chiave valore inviate/registrate nel form dall utente
        // salvandole in comicData ottengo un array associativo
        $comicData = $request->all();
        // ora posso salvare questi dati in una nuova riga della mia tabella
        // prima di instanziare un nuovo fumetto creo una validazione per i dati che deve inserire l utente
        // grazie a laravel con il metodo validate
        // per la validazione prendo spunto dalla migration che ho creato per la tabella
        $request->validate([
            'title' => 'string|required|max:100',
            'type' => 'string|required|max:50',
            'series' => 'string|required|max:50',
            'sale_date' => 'date|required',
            'price' => 'numeric',
            'thumb' => 'string|nullable|max:150',
            'description' => 'string|nullable',
        ]);
        // istanzio un nuovo fumetto
        $newComic = new Comic;
        $newComic->title = $comicData['title'];
        $newComic->type = $comicData['type'];
        $newComic->series = $comicData['series'];
        $newComic->sale_date = $comicData['sale_date'];
        $newComic->price = $comicData['price'];
        $newComic->thumb = $comicData['thumb'];
        $newComic->description = $comicData['description'];

        // per salvare i dati si usa il metodo save del Model
        $newComic->save();

        //essendo un metodo post il return della funzione non mi dara' una view
        // a tramite un redirect mi mostrera' la pagina dettagli del fumetto appena inserito
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic) {

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic) {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $modifiedComic = Comic::find($id); 

        // come in store leggiamo tutti i dati passati dal form usando il metodo all di request
        $modifiedData = $request->all();

        $request->validate([
            'title' => 'string|required|max:100',
            'type' => 'string|required|max:50',
            'series' => 'string|required|max:50',
            'sale_date' => 'date|required',
            'price' => 'numeric',
            'thumb' => 'string|nullable|max:150',
            'description' => 'string|nullable',
        ]);


        $modifiedComic->title = $modifiedData['title'];
        $modifiedComic->type = $modifiedData['type'];
        $modifiedComic->series = $modifiedData['series'];
        $modifiedComic->sale_date = $modifiedData['sale_date'];
        $modifiedComic->price = $modifiedData['price'];
        $modifiedComic->thumb = $modifiedData['thumb'];
        $modifiedComic->description = $modifiedData['description'];

        $modifiedComic->save();

        // tramite il metodo update aggiorniamo i dati che abbiamo raccolto
        //$modifiedComic->update($modifiedData);

        // il return di questa funzione come per lo store non mostrera' una view
        // ma tramite un redirect ci mostrera' la pagina del dettaglio modificato
        return redirect()->route('comics.show', $modifiedComic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
