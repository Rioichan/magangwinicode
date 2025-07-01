<?php

namespace App\Http\Controllers;

use App\Models\Artikels;
use App\Models\Category;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class pages extends Controller
{
    public function home()
    {
        $data = [
            "title" => "home",
            "trendingcategory" => Artikels::orderBy('click_count', 'DESC')-> with('Category')->get(),
            "dataartikel" => Artikels::with('Category')->inRandomOrder()->get(),
            "category" => Category::all()
        ];
        return view("Pages.Home", $data);
    }
    public function New()
    {
        $data = [
            "title" => "home",
            "trendingcategory" => Artikels::orderBy('click_count', 'DESC')->get(),
            "dataartikel" => Artikels::with('Category')->orderBy('created_at', 'DESC')->get(),
            "category" => Category::all()
        ];
        return view("Pages.Home", $data);
    }
    public function Category(Request $request)
    {
        $data = [
            "title" => "home",
            "trendingcategory" => Artikels::orderBy('click_count', 'DESC')->get(),
            "category" => Category::all(),
            "dataartikel" => Artikels::with('Category')
                ->where('id_category', $request->id)
                ->orderBy('created_at', 'DESC')
                ->get()
        ];
        return view("Pages.Home", $data);
    }
    public function artikelpage(Request $request)
    {
        $data = [
            "dataartikel" => Artikels::find($request->id),
            "category" => Category::all(),
            "komentar"=>Komentar::where('artikels_id',$request->id)->get()
        ];
        $data['dataartikel']->increment('click_count');

        return view("Pages.Articel", $data);
    }
    public function Trending()
    {
        $data = [
            "trendingcategory" => Artikels::orderBy('click_count', 'DESC')->get(),
            "dataartikel" => Artikels::orderBy('click_count', 'DESC')->get(),
            "category" => Category::all()
        ];
        return view("Pages.Home", $data);
    }
    public function Addkomentar(Request $request){
        try {
            $validated = $request->validate([
                'isi_komentar' => 'required',
            ]);
            $validated["user_id"]=Auth::user()->id;
            $validated["artikels_id"]=$request->artikels_id;
            $validated["tanggal_komentar"]=now();
            Komentar::create($validated);
            return back()->with('success', 'Berhasil pos komentar');
        } catch (\Exception $e) {
                dd($e->getMessage());
        }

    }
}
