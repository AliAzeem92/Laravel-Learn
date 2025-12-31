<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiData;
use Illuminate\Support\Facades\Validator;

class ApiHandlerController extends Controller
{
    // Get Data from Database
    function getData()
    {
        return ApiData::all();
    }

    // Post Data to Database
    function postData(Request $request)
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

    // Update Data in Database
    function updateData(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|email|unique:api_data,email,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->errors(),
            ]);
        }

        $data = ApiData::find($id);

        if (!$data) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found',
            ]);
        }

        $data->name = $request->name;
        $data->email = $request->email;
        if ($data->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data updated successfully',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Data not updated',
            ]);
        }
    }

    // Delete Data from Database
    function deleteData($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:api_data,id',
        ]);

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

    // Search Data in Database
    function searchData($query)
    {
        $validator = Validator::make(['query' => $query], [
            'query' => 'required|string|min:2|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->errors(),
            ]);
        }

        $results = ApiData::where('name', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->get();

        return response()->json([
            'status' => 200,
            'total_results' => $results->count(),
            'data' => $results,
        ]);
    }
}
