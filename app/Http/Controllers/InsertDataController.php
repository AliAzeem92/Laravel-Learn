<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsertData;

class InsertDataController extends Controller
{
    function add(Request $request)
    {
        InsertData::create([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('Inserted-Data-Fetch');
    }
    
    function fetchData()
    {
        $data = InsertData::paginate(5);
        return view('Inserted-Data-Fetch', ['data' => $data]);
    }

    function delete($id)
    {
        InsertData::destroy($id);

        return redirect()->route('Inserted-Data-Fetch');
    }

    function populateData($id){
        $data = InsertData::find($id);

        return view('edit', ['data' => $data]);
    }

    function update(Request $request, $id){
        $data = InsertData::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();

        return redirect()->route('Inserted-Data-Fetch');
    }

    function search(Request $request){
        $data = InsertData::where('name', 'like', '%'.$request->search.'%')->paginate(5);
        return view('Inserted-Data-Fetch', ['data' => $data, 'search' => $request->search]);
    }

}
