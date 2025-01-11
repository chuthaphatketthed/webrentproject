<?php

namespace App\Http\Controllers;

use App\Models\nameoftool;
use Illuminate\Http\Request;

class NameoftollCRUD extends Controller
{
    //
    public function index()
    {
        $data['nameoftools'] = nameoftool::orderBy('id', 'asc')->paginate(5);
        return view('nameoftools.index', $data);
    }
    public function create()
    {
        return view('nameoftools.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'amount' => 'required'
        ]);

        $nameoftools = new nameoftool;
        $nameoftools->id = $request->id;
        $nameoftools->name = $request->name;
        $nameoftools->amount = $request->amount;
        $nameoftools->save();
        return redirect()->route('nameoftools.index')->with('success', ' tool created successfully.');
    }
    public function edit($id)
    {
        $nameoftools = nameoftool::find($id);
        return view('nameoftools.edit', compact('nameoftools'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required'
        ]);
        $nameoftools = nameoftool::find($id);
        $nameoftools->name = $request->name;
        $nameoftools->amount = $request->amount;
        $nameoftools->save();
        return redirect()->route('nameoftools.index')->with('success', 'Tool has been updated successfully.');
    }
    public function destroy(nameoftool $nameoftool)
    {
        $nameoftool->delete();
        return redirect()->route('nameoftools.index')->with('success', 'Tool has been deleted successfully.');
    }
}
