<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\menu;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function edit(Reserve $listing){
        return view('edit', ['listing'=>$listing]);
    }

    // Update Listing Data
    public function update(Request $request, Reserve $listing) {
        
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'date' => ['required'],
            'phone' => 'required',
            'guests' => 'required',
            'time' => 'required',
            'description' => 'required'
        ]);

        $listing->update($formFields);

        return redirect('/manageorder')->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Reserve $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

}
