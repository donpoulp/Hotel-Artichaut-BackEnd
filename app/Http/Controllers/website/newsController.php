<?php

namespace App\Http\Controllers\website;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class newsController extends Controller
{
    public function allNews(): object{
        return response()->json(News::all());
    }
    public function newsShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $newsId = News::findOrFail($id)]);

        return response()->json([$newsId]);
    }
    public function newsUpdate($id, Request $request)
    {
        $newsUpdate = $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'content' => 'nullable',
            'image' => 'nullable',
        ]);

        $news = News::findOrFail($id);
        $news->update($newsUpdate);

        return response()->json($newsUpdate);

    }
    public function PostNews(Request $request)
    {
        try {
            $validate = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'content' => 'required|string|max:255',
                'image' => 'required|string|max:255',
            ]);


            $postNews = new News($validate);
            $postNews->save();
            return response()->json($postNews);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteNews(Request $request, $id)
    {
        $deleteNews = News::findOrFail($id);
        $deleteNews->delete();
        return response()->json(News::all());
    }
}
