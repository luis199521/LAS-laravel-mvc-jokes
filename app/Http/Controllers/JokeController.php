<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joke;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Parsedown;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JokeController extends Controller
{
    use AuthorizesRequests;

    public function numberJokes()
    {

        $totalJokes = Joke::count();

        return $totalJokes;
    }


    public function index()
    {

        $jokes = Joke::all();
        $parsedown = new Parsedown();
        foreach ($jokes as $joke) {

            $joke->joke = $parsedown->text($joke->joke);
        }

        return view('jokes.home', [
            'jokes' => $jokes

        ]);
    }


    public function showRandomJoke()
{
   
    $jokes = Joke::inRandomOrder()->limit(1)->get();

 
    $parsedown = new Parsedown();

   
    foreach ($jokes as $joke) {
        $joke->joke = $parsedown->text($joke->joke);
    }

   
    return $jokes;
}


    /**
     * Search users by keywords/location.
     */
    public function search(Request $request)
    {
        $keywords = $request->input('keywords', '');


        $jokes = Joke::where('joke', 'like', "%{$keywords}%")
            ->orWhere('tags', 'like', "%{$keywords}%")
            ->orderBy('joke')
            ->orderBy('tags')
            ->get();
            $parsedown = new Parsedown();
            foreach ($jokes as $joke)
             { 
                $joke->joke = $parsedown->text($joke->joke);
             }

        if (Auth::check()) {
           

            return view('jokes.home', [
                'jokes' => $jokes,
                'keywords' => $keywords,
            ]);
        } else {
          
            return view('jokes.search', [
                'jokes' => $jokes,
                'keywords' => $keywords,
            ]);
        }
    }


    public function show($id)
    {
        $joke = Joke::select(
            'jokes.id as id', 
            'jokes.joke as joke_title',
            'jokes.category_id as category',
            'jokes.tags as tags',
            'jokes.author_id as author',
            'users.given_name as author_name',
            'jokes.created_at as created_at',
            'jokes.updated_at as updated_at'
        )
        ->join('users', 'jokes.author_id', '=', 'users.id') 
        ->where('jokes.id', $id)
        ->first();

        if (!$joke) {
            return response()->view('errors.404', ['message' => 'Joke not found'], 404);
        }
    
        $parsedown = new Parsedown();
        $joke->joke_title = $parsedown->text($joke->joke_title);
    
        return view('jokes.show', [
            'joke' => $joke,
        ]);
    }
    


    /**
     * Show the jokes create form
     *
     */
     public function create()
    {
        return view('jokes.create');
    }

    /**
     * Store Jokes in database
     */

     public function store(Request $request)
     {
       
         $allowedFields = ['joke', 'category_id', 'tags', 'author_id'];
     
       
         $validator = Validator::make($request->all(), [
             'joke' => 'required|string|max:255',
             'category_id' => 'required|integer',
             'tags' => 'nullable|string',
             'author_id' => 'required|integer|exists:users,id',
         ], [
             'joke.required' => 'joke  is required.',
             'category_id.required' => 'category is required.',
             'author_id.required' => 'Author ID is required.'
         ]);
     
        
         if ($validator->fails()) {
             return redirect()->back()
                 ->withErrors($validator)
                 ->withInput();
         }
     
         
         $newJokeData = $request->only($allowedFields);
         $newJokeData['author_id'] = Auth::id();
     
         
         Joke::create($newJokeData);
     
        
         Session::flash('success', 'Joke created successfully.');
     
         
         return redirect()->route('jokes.home');
     }
     
    /**
     * Show the user edit form
     */
    public function edit(Joke $joke)
    {
       
    
        $this->authorize('update', $joke);
    
        return view('jokes.edit', ['joke' => $joke]);
    }
    


    /**
     * Update a user
     */


     public function update(Request $request, Joke $joke)
     {
       
         $this->authorize('update', $joke);
     
       
         $request->validate([
             'joke' => 'required|string|max:255',
             'category_id' => 'nullable',
             'tags' => 'nullable|string',
         ], [
             'joke_title.required' => 'Joke title is required',
         ]);
         
    
         $allowedFields = ['joke', 'category_id', 'tags'];
         $updateValues = $request->only($allowedFields);
         $updateValues['updated_at'] = now(); 
     

         $joke->update($updateValues);
         
     
       
         Session::flash('success', 'Joke updated successfully');
        
     
         return redirect()->route('jokes.show', $joke->id);
     }
     


    /**
     * Delete a user
     */
    public function destroy(Joke $joke)
    {
       
       
        $this->authorize('delete', $joke);
     
       
        $joke->delete();
    
        Session::flash('success', 'Joke deleted successfully');
    
        return redirect()->route('jokes.home'); 
    }
}
