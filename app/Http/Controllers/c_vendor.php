<?php

namespace App\Http\Controllers;

use App\Models\m_vendor;
use Illuminate\Http\Request;

class c_vendor extends Controller
{
    public function index()
    {
        $vendor = m_vendor::all();
        return view('admin.vendor.index', compact('vendor'));
    }

    public function create()
    {
        return view('admin.vendor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'name' => 'required',
            'category' => 'required',
            'location' => 'required',
            'price_start' => 'required|numeric',
            'description' => 'nullable',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only([
            'status', 'name', 'category', 'location', 'price_start', 'description'
        ]);

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/vendors'), $imageName);
            $data['image_url'] = 'images/vendors/' . $imageName;
        }

        m_vendor::create($data);

        return redirect()->route('vendor.index')->with('success', 'Vendor berhasil ditambahkan!');
    }

    public function show($id)
    {
        $vendor = m_vendor::findOrFail($id);
        return view('vendor.v_detail_vendor', compact('vendor'));
    }

    public function edit($id)
    {
        $vendor = m_vendor::findOrFail($id);
        return view('admin.vendor.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'name' => 'required',
            'category' => 'required',
            'location' => 'required',
            'price_start' => 'required|numeric',
            'description' => 'nullable',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $vendor = m_vendor::findOrFail($id);

        $data = $request->only([
            'status', 'name', 'category', 'location', 'price_start', 'description'
        ]);

        if ($request->hasFile('image_url')) {
            if ($vendor->image_url && file_exists(public_path($vendor->image_url))) {
                unlink(public_path($vendor->image_url));
            }

            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/vendors'), $imageName);
            $data['image_url'] = 'images/vendors/' . $imageName;
        }

        $vendor->update($data);

        return redirect()->route('vendor.index')->with('success', 'Vendor berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $vendor = m_vendor::findOrFail($id);

        if ($vendor->image_url && file_exists(public_path($vendor->image_url))) {
            unlink(public_path($vendor->image_url));
        }

        $vendor->delete();

        return redirect()->route('vendor.index')->with('success', 'Vendor berhasil dihapus!');
    }
}
