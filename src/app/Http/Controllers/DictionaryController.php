<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dictionary;
use\App\Http\Requests\DictionaryRequest;

class DictionaryController extends Controller
{
    //
    public function index(Request $request)
    {
        $dictionaries = Dictionary::latest('created_at')->get();
        return view ('index',compact('dictionaries'));
    }

    public function register()
    {
        return view ('register');
    }

    public function store(DictionaryRequest $request)
    {
        $dictionary = $request->only(['keyword','description']);
        Dictionary::create($dictionary);

        return redirect('/')->with('message','登録しました');
    }

    public function update(DictionaryRequest $request)
    {
        $dictionary = $request->only(['keyword','description']);
        Dictionary::find($request->id)->update($dictionary);

        return redirect('/')->with('message', '更新しました');
    }

    public function destroy(Request $request)
    {
        Dictionary::find($request->id)->delete();
        return redirect('/')->with('message', '削除しました');
    }

    public function search (Request $request)
    {
        $dictionaries = Dictionary::KeywordSearch($request->keyword)->get();

        return view('index',compact('dictionaries'));
    }
}
