<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

   

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        //$request->phone = $request['phone'];
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    //////////////////////////////////////////////////// new function added

    public function index()
    {
        $results = User::orderBy('created_at', 'DESC')->paginate();
        //$results = User::paginate(10);
        //dd($results);
        return view('volunteer.index', compact('results'));
    }

    public function add()
    {
        $results = null;
        return view('volunteer.add', ['results' => $results]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'password' => 'required|string|max:255',

        ]);
        $author = new User();
        $author->name = $validatedData['name'];
        $author->email = $validatedData['email'];
        $author->type = $validatedData['type'];
        $author->password = Hash::make($validatedData['password']);
        $author->phone = $request['phone'];
        $author->save();
        return redirect()->route('volunteer.index')->with('success', 'User created successfully');
    }

    public function edit_volunteer($id)
    {
        $results = User::find($id);
        return view('volunteer.edit', ['results' => $results]);
    }

    public function update_volunteer(Request $request, $id)
    {
        
        $author = User::findOrFail($id);
        $validatedData = $request->validate([
            
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $author->name = $validatedData['name'];        
        $author->type = $validatedData['type'];
        //$book->status = $validatedData['status'];
        
        if($request['password'] != null){
            $validatedData = $request->validate([
                'password' => 'required|string|max:255',
            ]);
            $author->password = Hash::make($validatedData['password']);
        }
        $author->phone = $request['phone'];
        $author->save();
        return redirect()->route('volunteer.index')->with('success', 'User updated successfully');
    }

    public function delete_volunteer($id)
    {
         $author = User::findOrFail($id);
         $author->delete();
         return redirect()->route('volunteer.index')->with('success', 'Volunteer deleted successfully');
    }
}
