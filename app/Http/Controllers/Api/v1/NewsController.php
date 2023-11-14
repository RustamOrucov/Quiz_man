<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\News\NewsStoreRequest;
use App\Http\Requests\Api\v1\News\NewsUpdateRequest;
use App\Http\Resources\Api\v1\News\NewsDetailResource;
use App\Http\Resources\Api\v1\News\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
    //    return 'test';
        $news = News::paginate($this->limit);
        // $news=News::all();
        $newsCount = $news->total();
        $newsResource  = NewsResource::collection($news);
        return $this->sendResponse($newsResource, $newsCount);
    }

    public function store(NewsStoreRequest $request)
    {
        // $this->validate($request,[
        //     'az.*'=>['require','array'],
        //     'az.title '=>['require ','max_225'],
        //     'az_description'=>['require','max_225'],

        //     'en.*'=>['null','array'],
        //     'en.title '=>['null ','max_225'],
        //     'en_description'=>['null','max_225'],

        //     'ru.*'=>['null','array'],
        //     'ru.title '=>['null ','max_225'],
        //     'ru_description'=>['null','max_225'],
        // ]);

        $request = $request->all();
        try {
            DB::beginTransaction();

            News::create($request);

            DB::commit();
            return $this->sendResponseOperation();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

  public function show(News $news)
    {
        $news->increment('view_count');
        $newsDetail = new NewsDetailResource($news);
        return $this->sendResponse($newsDetail);
    }

    public function update(NewsUpdateRequest $request, News $news)
    {
        // $request = Validator::make($request->all(),[
        //     'az.*'=>['required','array'],
        //     'az.title'=>['required','max:225'],
        //     'az.description'=>['required','max:225'],

        //     'en.*'=>['null','array'],
        //     'en.title '=>['null ','max_225'],
        //     'en_description'=>['null','max_225'],

        //     'ru.*'=>['null','array'],
        //     'ru.title '=>['null ','max_225'],
        //     'ru_description'=>['null','max_225'],
        // ]);

        $request = $request->validated();
        // dd($request);
        try {
            DB::beginTransaction();

            $news->update($request);

            DB::commit();
            return $this->sendResponseOperation();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function destroy(News $news)
    {
        try {
            DB::beginTransaction();

            $news->delete();

            DB::commit();
            return $this->sendResponseOperation();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
