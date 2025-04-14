<?php

namespace App\Http\Controllers\website;

use App\Models\News;
use App\Traits\PictureTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    use PictureTrait;
    public function allNews(): object
    {
        $news = News::with('picture')->get();
        return response()->json($news);
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
            'titleEn' => 'nullable',
            'descriptionEn' => 'nullable',
            'titleFr' => 'nullable',
            'descriptionFr' => 'nullable',
            'background_color'=>'nullable',
            'background_opacity'=>'nullable',
            'picture1' => 'nullable',
            'picture2' => 'nullable',
        ]);

        $news = News::findOrFail($id);

        for ($i = 1; $i <= 2; $i++) {
            if (isset($newsUpdate["picture$i"])) {
                $oldPicture = $news->picture()->skip($i - 1)->first();

                if ($oldPicture) {
                    if (Storage::exists($oldPicture->picturePath)) {
                        Storage::delete($oldPicture->picturePath);
                    }

                    $imagePath = $this->saveImage($newsUpdate["picture$i"]);

                    $oldPicture->picturePath = "http://127.0.0.1:8000/storage/".$imagePath;
                    $oldPicture->save();
                }
            }
        }

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
                'picture_id' => 'nullable',
                'background_color'=>'nullable',
                'background_opacity'=>'nullable',
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
