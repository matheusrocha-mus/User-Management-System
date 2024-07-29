<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Http\Request;
use Hamcrest\Core\IsNull;

class UserController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->role == 'USER') {
            return redirect()->route('profile.show');
        } else {
            $users = User::where('id', '!=', auth()->id())->get();
            return view('dashboard', compact('users'));
        }
    }

    public function create(Request $request)
    {
        $createNewUserAction = new CreateNewUser();
        $createNewUserAction->create($request->all());
        return redirect()->route('dashboard');
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
        $deleteUserAction = new DeleteUser($request->user);
        $deleteUserAction->delete($request->user);
        return redirect()->route('dashboard');
    }

    /* public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('dashboard');
    } */
}