<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::all();

        return view('sellers.index', [
            'sellers' => $sellers,
        ]);
    }

    public function create()
    {
        return view('sellers.create');
    }

    public function store(Request $request)
    {
        Seller::create(
            [
                'code' => $request->input('code'),
                'dni' => $request->input('dni'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
            ]
        );

        return redirect()->route('sellers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Seller $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

//        $seller = Seller::findOrFail($id);
    public function edit(Seller $seller)
    {
        return view('sellers.edit', compact('seller'));
    }

    public function update(Request $request, Seller $seller)
    {
        $seller->update(
            [
                'code' => $request->input('code'),
                'dni' => $request->input('dni'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
            ]
        );

        return redirect()
            ->route('sellers.edit', ['seller' => $seller->id]);
    }

    public function destroy(Seller $seller)
    {
        $seller->delete();

        return redirect()->route('sellers.index');
    }
}
