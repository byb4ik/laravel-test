<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('user', 'category')
            ->get();

        return $articles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return $article;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with('user', 'category')
            ->findOrFail($id);


        return response()->json($article);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::with('user', 'category')
            ->findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return '';
    }

    /**
     * @param $id
     * @param $user_id
     */
    public function addRate($id, $user_id)
    {
        $article = Article::findOrFail($id);
        $arr_rate = json_decode($article->rating, true);
        foreach ($arr_rate as $value) {
            if (array_key_exists($user_id, $value)) {

                return 'уже';
            }
            $arr_rate[] = [$user_id => '1'];
        }
        $article->rating = json_encode($arr_rate);
        $article->save();

        return 'голос учтен';
    }

    public function articlesByCategory($category)
    {
        return Article::with('user')->where('category_id', $category)->get();

    }
}
