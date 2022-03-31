<?php

namespace App\Http\Controllers;

use Nette\Utils\Image;
use App\Models\Matchlive;
use App\Models\live_matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class liveControoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Matchlive::all();
        // $user['live_matche'] = live_matches::orderBy('id', 'desc')->paginate(8);

        return view('backend.administration.compani_view', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [

                'team_one_name' => 'required|string|max:191|unique:matchlives',
                'team_one_image_type' => 'required|string|max:20',
                'team_one_url' => 'nullable|required_if:team_one_image_type,url|url',
                'team_one_image' => 'required_if:team_one_image_type,image|image',

                'team_two_name' => 'required|string|max:191|unique:matchlives',
                'team_two_image_type' => 'required|string|max:20',
                'team_two_url' => 'nullable|required_if:team_two_image_type,url|url',
                'team_two_image' => 'required_if:team_two_image_type,image|image',



                'match_title' => 'required|unique:matchlives',
                'match_time' => 'required',

            ]);

            if ($validator->fails()) {
                if ($request->ajax()) {
                    return response()->json(['result' => 'errors', 'message' => $validator->errors()->all()]);
                } else {
                    return back()->withErrors($validator)->withInput();
                }
            }



            $live_match = new Matchlive();

            $live_match->team_one_name = $request->team_one_name;
            $live_match->team_one_image_type = $request->team_one_image_type;
            $live_match->team_one_url = $request->team_one_url;
            $live_match->team_two_name = $request->team_two_name;
            $live_match->team_two_image_type = $request->team_two_image_type;
            $live_match->team_two_url = $request->team_two_url;
            $live_match->match_title = $request->match_title;
            $live_match->match_date =$request->match_date;
            $live_match->match_time =$request->match_time;

        // if ($request->hasFile('team_one_image')) {
        //     $image = $request->file('team_one_image');
        //     $ImageName = time() . '.' . $image->getClientOriginalExtension();
        //     Image::make($image)->save(base_path('public/uploads/images/live_matches/') . $ImageName);
        //     $live_match->team_one_image = 'public/uploads/images/live_matches/' . $ImageName;
        // }
             if ($request->hasFile('team_one_image')) {
            $file = $request->file('team_one_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $live_match['team_one_image'] = $filename;
        }

        // if ($request->hasFile('team_two_image')) {
        //     $image = $request->file('team_two_image');
        //     $ImageName = time() . '.' . $image->getClientOriginalExtension();
        //     Image::make($image)->save(base_path('public/uploads/images/live_matches/') . $ImageName);
        //     $live_match->team_two_image = 'public/uploads/images/live_matches/' . $ImageName;
        // }
        if ($request->hasFile('team_two_image')) {
            $file = $request->file('team_two_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $live_match['team_two_image'] = $filename;
        }




            $live_match->save();



            if (!$request->ajax()) {
                return redirect('/live/view')->with('success', _lang('Information has been added.'));
            } else {
                return response()->json(['result' => 'success', 'redirect' => back(), 'message' => _lang('Information has been added sucessfully.')]);
            // url('live_matches')
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dele = Matchlive::find($id)->get();
        //  return $val;
        // $dele->delete();
    //    return ['success' => 'delet success '];
    return $dele;
    }
}
