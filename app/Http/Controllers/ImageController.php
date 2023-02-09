<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ImageController extends Controller
{

    public function index()
    {

        return view('home', [
            'images' => Images::all(),

        ]);
    }

    public function storeImage(Request $request)
    {

        $request->validate([
            'files.*' => 'required|mimes:png,jpg,jpeg,svg,gif|max:2048'
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->storeAs("images", $image->getClientOriginalName(),'public');
            $image = new Images();
            $image->title = $path;
            $image->img = $path;
            $image->save();
        }



//        $request->images->move(public_path('storage/images/'), $imageName);

//        $image = new Images();
//        $image->title = $imageName;
//        $image->img = 'storage/images/' . $imageName;
//        $image->save();
//

        return back()->with('success', 'Image uploaded Successfully!');

    }

    public function delete($id)
    {
        $image = Images::query()->where(['id' => $id])->first();
        if (!$image) {
            throw new NotFoundHttpException();
        }
        if (Storage::disk('public')->exists($image->img)) {
            Storage::disk('public')->delete($image->img);
        }
        $image->delete();
        return back();

    }
}
