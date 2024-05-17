<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(){
        $asset = Asset::orderBy('created_at','DESC')->get();
        return view('assets.index',compact('asset'));
    }
    public function create(){
        return view('assets.create');

    }
    public function store(Request $request){
        Asset::create($request->all());
        return redirect()->route('admin/assets')->with('success','added successfully');
    }
    public function show(string $id){
        $asset = Asset::findOrFail($id);
        return view('assets.show',compact('asset'));
    }
    public function edit(string $id){
        $asset = Asset::findOrFail($id);
        return view('assets.edit',compact('asset'));
    }
    public function update(Request $request,string $id){
        $asset = Asset::findOrFail($id);
        $asset->update($request->all());
        return redirect()->route('admin/assets')->with('success','updated successfully');
    }
    public function destroy(string $id){
        $asset = Asset::findOrFail($id);
        $asset->delete();
        return redirect()->route('admin/assets')->with('success','deleted successfully');
    }
    public function search(Request $request)
{
    $query = $request->input('query');
    $assets = Asset::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('tag', 'LIKE', "%{$query}%")
                    ->orWhere('serial', 'LIKE', "%{$query}%")
                    ->get();

    return view('admin.assets.index', compact('assets'));
}

}
