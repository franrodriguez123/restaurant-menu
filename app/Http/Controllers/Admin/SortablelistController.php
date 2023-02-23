<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SortablelistController extends Controller
{
    public function update(Request $request)
    {
        $success = true;
        $details = null;

        try
        {
            $tables = [
                'category' => 'categories',
                'meal' => 'meals',
                'allergen' => 'allergens',
            ];
            $model = $request->get('model');
            $data = $request->get('data');

            foreach($data as $order => $id)
            {
                DB::table($tables[$model])->where('id', $id)->update(['order' => $order]);
            }
        }
        catch(Exception $err)
        {
            $success = false;
            $details = 'Error: ' . $err->getMessage();
        }

        return response()->json(['success' => $success, 'details' => $details]);
    }
}
