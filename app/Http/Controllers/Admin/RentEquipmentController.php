<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RentEquipmentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RentEquipmentStoreRequest;
use App\Http\Requests\Admin\RentEquipmentUpdateRequest;
use App\Models\Location;
use App\Models\RentEquipment;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Str;


class RentEquipmentController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(RentEquipmentDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('admin.rent-equipment.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $locations = Location::where('status', 1)->get();
        return view('admin.rent-equipment.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RentEquipmentStoreRequest $request)
    {

        $imagePath = $this->uploadImage($request, 'image');
        if (!$imagePath) {
            return back()->with('error', 'Image upload failed.')->withInput();
        }
        $equipment = new RentEquipment();
        $equipment->user_id = Auth::user()->id;
        $equipment->title = $request->title;
        $equipment->description = $request->description;
        $equipment->location_id = $request->location;
        $equipment->slug = Str::slug($request->title);
        $equipment->address = $request->address;
        $equipment->image = $imagePath;
        $equipment->phone = $request->phone;
        $equipment->email = $request->email;
        $equipment->feature = $request->feature;
        $equipment->price_per_day = $request->price_per_day;
        $equipment->price_per_week = $request->price_per_week;
        $equipment->status = $request->status;
        $equipment->is_featured = $request->is_featured;
        $equipment->is_available = $request->is_available;
        $equipment->is_approved = 1;
        $equipment->save();

        toastr()->success('Created successfully!');
        return redirect()->route('admin.rent-equipment.index');
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
        $locations = Location::where('status', 1)->get();
        $equipment = RentEquipment::findOrFail($id);
        return view('admin.rent-equipment.edit', compact('equipment', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RentEquipmentUpdateRequest $request, string $id)
    {
        $equipment = RentEquipment::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request, 'image', $equipment->image);
            if (!$imagePath) {
                return back()->with('error', 'Image upload failed.')->withInput();
            }
            $equipment->image = $imagePath;
        }

        $equipment->user_id = Auth::id();
        $equipment->title = $request->title;
        $equipment->description = $request->description;
        $equipment->location_id = $request->location;
        $equipment->slug = Str::slug($request->title);
        $equipment->address = $request->address;
        $equipment->phone = $request->phone;
        $equipment->email = $request->email;
        $equipment->feature = $request->feature;
        $equipment->price_per_day = $request->price_per_day;
        $equipment->price_per_week = $request->price_per_week;
        $equipment->status = $request->status;
        $equipment->is_featured = $request->is_featured;
        $equipment->is_available = $request->is_available;

        $equipment->save();

        toastr()->success('Updated successfully!');
        return redirect()->route('admin.rent-equipment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipment = RentEquipment::findOrFail($id);
        $equipment->delete();

        return response(['status' => 'success', 'message' => 'Item deleted successfully!']);
    }
}