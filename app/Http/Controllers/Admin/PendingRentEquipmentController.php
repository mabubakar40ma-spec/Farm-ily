<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PendigRentEquipmentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\RentEquipment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PendingRentEquipmentController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware(['permission:pending listing']);
    // }

    function index(PendigRentEquipmentDataTable $dataTable)
    {
        return $dataTable->render('admin.pending-rent-equipment.index');
    }

    function update(Request $request): Response
    {
        $request->validate([
            'value' => ['boolean']
        ]);

        try {
            $listing = RentEquipment::findOrFail($request->id);
            $listing->is_approved = $request->value;
            $listing->save();

            return response(['status' => 'success', 'message' => 'status updated successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}