<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Http\Request;
use Hamcrest\Core\IsNull;

class UserController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->role == 'USER') { // Redirect user to profile if they are logged and are a USER
            return redirect()->route('profile.show');
        } else if (auth()->user()->role == 'ADMIN') { // Return dashboard view to user if they are logged and are an ADMIN
            $users = User::where('id', '!=', auth()->id())->get();
            return view('dashboard', compact('users'));
        }
    }

    public function create(Request $request)
    {
        try {
            $createNewUserAction = new CreateNewUser();
            $createNewUserAction->create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'User registration failed');
        }
        return redirect()->route('dashboard')->with('success', 'User registered successfully');
    }

    public function search(Request $request)
    {
        $query = User::query();

        $query->where('id', '!=', auth()->id()); // Exclude the current user

        if (isset($request->search) && IsNull::notNullValue($request->search)) { // Check if the search parameter is set and then which names and emails it matches
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if (!isset($request->includeUser)) { // Check if the includeUser parameter is set and then exclude the USER role
            $query->whereNot('role', 'USER');
        }

        if (!isset($request->includeAdmin)) { // Check if the includeAdmin parameter is set and then exclude the ADMIN role
            $query->whereNot('role', 'ADMIN');
        }

        if (isset($request->startDate) && IsNull::notNullValue($request->startDate)) { // Check if the startDate parameter is set and then filter the users created after the start date
            $query->whereDate('created_at', '>=', $request->startDate);
        }

        if (isset($request->endDate) && IsNull::notNullValue($request->endDate)) { // Check if the endDate parameter is set and then filter the users created before the end date
            $query->whereDate('created_at', '<=', $request->endDate);
        }

        $users = $query->get();

        return view('dashboard', compact('users'));
    }

    public function delete(Request $request)
    {
        $id = $request->userToDelete;

        try {
            $user = User::find($id);
            $user->delete();
        } catch (\Exception $e) {
            return back()->with('error', 'User deletion failed');
        }
        return back()->with('success', 'User deleted successfully');
    }
}