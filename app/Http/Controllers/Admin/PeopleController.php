<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\peoples;

class PeopleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->seachname != null) {
            $People = peoples::where('isdelete', 0)->where('first_name', 'like',
                '%' . $request->seachname . '%')->orWhere('id', 'like',
                '%' . $request->seachname . '%')->orWhere('lats_name', 'like',
                '%' . $request->seachname . '%')->orWhere('Address', 'like',
                '%' . $request->seachname . '%')->paginate(10);
            return view('Admin.Users.index', compact('People'));
        }

        $People = peoples::where('isdelete', false)->paginate(10);
        //dd($users);
        return view('Admin.Users.index', compact('People'));
    }

    public function show($id)
    {
        $People = peoples::findOrFail($id);
        //dd($People);
        return view('Admin.Users.show', compact('People'));
    }

    public function destroy(Request $request)
    {

        $users = users::findOrFail($request->id);
        $var = peoples::where('users_id', $request->id)->get('id');
        $People = peoples::findOrFail($var[0]->id);
        //dd($People);
        if ($users) {
            $users->Isdelete = true;
            $users->update();
            //echo "string";
        }
        if ($People) {
            $People->Isdelete = true;
            $People->update();
            //echo "string";
        }
        return redirect("Admin/users")->with('thongbao', 'Đã xóa thành công !');
    }
}
