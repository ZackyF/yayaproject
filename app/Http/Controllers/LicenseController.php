<?php

namespace App\Http\Controllers;

use App\Models\license;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index(){
        $license = License::orderBy('created_at','DESC')->get();
        return view('licenses.index',compact('license'));
    }
    public function create(){
        return view('licenses.create');

    }
    public function store(Request $request){
        License::create($request->all());
        return redirect()->route('admin/licenses')->with('success','added successfully');
    }
    public function show(string $id){
        $license = License::findOrFail($id);
        return view('licenses.show',compact('license'));
    }
    public function edit(string $id){
        $license = License::findOrFail($id);
        return view('licenses.edit',compact('license'));
    }
    public function update(Request $request,string $id){
        $license = License::findOrFail($id);
        $license->update($request->all());
        return redirect()->route('admin/licenses')->with('success','updated successfully');
    }
    public function destroy(string $id){
        $license = License::findOrFail($id);
        $license->delete();
        return redirect()->route('admin/licenses')->with('success','deleted successfully');
    }
    public function search(Request $request)
{
    $query = $request->input('query');
    $license = License::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('tag', 'LIKE', "%{$query}%")
                    ->orWhere('serial', 'LIKE', "%{$query}%")
                    ->get();

    return view('admin.licenses.index', compact('licenses'));
}

}
