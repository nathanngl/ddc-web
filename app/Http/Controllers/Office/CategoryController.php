<?php

namespace App\Http\Controllers\Office;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $category = Category::
            where('tc_title','like','%'.$request->keywords.'%')->
            paginate(10);
            return view('page.office.category.list', compact('category'));
        }
        return view('page.office.category.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('page.office.category.modal', ['category' => new Category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'tc_title' => 'required|string',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
        try {
            $category = new Category;
            $category->tc_title = $request->tc_title;
            $category->id_user = Auth::user()->id;
            $category->save();
            return response()->json([
                'alert' => 'success',
                'message' => 'Kategori '. $request->tc_title . ' telah ditambahkan',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('page.office.category.modal', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Category $category)
    {
        try {
            $category->tc_title = $request->tc_title;
            $category->id_user = Auth::user()->id;
            $category->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Kategori '. $request->tc_title . ' telah di Update',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json([
                'alert' => 'success',
                'message' => 'Kategori '. $category->tc_title . ' Dihapus',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
}
