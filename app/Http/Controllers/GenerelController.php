<?php

namespace App\Http\Controllers;

use App\Models\Generel;
use App\Models\Matchlive;
use App\Models\live_matches;
use App\Utilities\Installer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class GenerelController extends Controller
{
    public function generel()
    {
       return view('backend.administration.Ganeral_settings');
    }
    public function compani_info()
    {
       return view('backend.administration.compani_name');
    }


    public function store_settings(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            if ($key != '' && $value != '') {
                $data = array();
                $data['value'] = is_array($value) ? serialize($value) : $value;
                $data['updated_at'] = now();
                if ($request->hasFile($key)) {
                    $image = $request->file($key);
                    $name = $key . '.' . $image->getClientOriginalExtension();
                    $path = public_path('uploads/images/');
                    $image->move($path, $name);
                    $data['value'] = $name;
                    $data['updated_at'] = now();
                }
                if (Generel::where('name', $key)->exists()) {
                    Generel::where('name', '=', $key)->update($data);
                } else {
                    $data['name'] = $key;
                    $data['created_at'] = now();
                    Generel::insert($data);
                }
            }
        }
        if (!$request->ajax()) {
            return back()->with('success', _lang('Saved sucessfully.'));
        } else {
            return response()->json(['result' => 'success', 'message' => _lang('Saved sucessfully.')]);
        }
    }


    public function compani_sav(Request $request)
    {
        Installer::updateSettings($request->all());
        // Installer::finalTouches();
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        // return redirect('generel/seting');
        return view('backend.administration.Ganeral_settings');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // public function live_view()
    // {
    //         // $user = live_matches::all();
    //         $user = DB::table('live_matches')->get();
    //         dd($user);
    //     require view('backend.administration.compani_view', compact('user'));
    // }

    public function face_data()
    {
            $user = Matchlive::all();
            // $user['live_matche'] = live_matches::orderBy('id', 'desc')->paginate(8);
            return response()->json([
                'user' => $user,
            ]);
    }
    public function destroy($id)
    {

        $val = Matchlive::find($id);
        // return $val;
        $val->delete();
        // return ['success' => 'delet success '];
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

}
// app\Utilities\Installer . php
