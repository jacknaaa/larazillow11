<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use Illuminate\Support\Facades\Gate;




class ListingController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Listing::class, 'listing');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Listing::all());
        return inertia('Listing/Index',
            [
                'listings' => Listing::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        Gate::authorize('create', Listing::class);
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        
        // dd($request->all());

        // Listing::create($request->all());
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        // if (Gate::forUser($user)->allows('update-post', $post)) {
        //     // The user can update the post...
        // }
         
        // if (Gate::forUser($user)->denies('update-post', $post)) {
        //     // The user can't update the post...
        // }
        // if(Auth::user()->cannot('view', $listing)){
        //     abort(403);
        // }
        // $this->authorize('view', $listing);

        Gate::authorize('view', $listing);

        return inertia('Listing/Show',
            [
                'listing' => $listing,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        Gate::authorize('update', $listing);
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was changed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        Gate::authorize('delete', $listing);
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
