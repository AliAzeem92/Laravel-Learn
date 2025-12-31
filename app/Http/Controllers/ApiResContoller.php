<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiData;
use Illuminate\Support\Facades\Validator;

class ApiResContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = ApiData::all();
        return response()->json([
            'status' => 'success',
            'total' => ApiData::count(),
            'data' => ApiData::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|email|unique:api_data,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->errors(),
            ]);
        } else {
            $data = new ApiData();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->save();
            if ($data) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Data saved successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Data not saved',
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $validator = Validator::make(
            ['id' => $id],
            [
                'id' => 'required|integer|exists:api_data,id',
            ],
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->errors(),
            ]);
        }

        $data = ApiData::find($id);

        if ($data->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data deleted successfully',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Data not deleted',
            ]);
        }
    }
}
