<?php

namespace App\Http\Controllers;

use App\Models\Matchlive;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiConroller extends Controller
{
    public function val(Request $Request, $id)
    {
        return $Request->team_one_name;
        // $live_match = live_matches::find($id);
        // $live_match->team_one_name = $Request->team_one_name;
        // $live_match->team_one_image_type = $Request->team_one_image_type;
        // $live_match->team_one_url = $Request->team_one_url;
        // $live_match->team_two_name = $Request->team_two_name;
        // $live_match->team_two_image_type = $Request->team_two_image_type;
        // $live_match->team_two_url = $Request->team_two_url;
        // $live_match->match_title = $Request->match_title;
        // $live_match->match_time = \Carbon\Carbon::parse($Request->match_time)->timestamp;

        //     if ($Request->hasFile('team_one_image')) {
        //         $file = $Request->file('team_one_image');
        //         $filename = date('YmdHi') . $file->getClientOriginalName();
        //         $file->move(public_path('public/Image'), $filename);
        //         $live_match['team_one_image'] = $filename;
        //     }


        //     if ($Request->hasFile('team_two_image')) {
        //         $file = $Request->file('team_two_image');
        //         $filename = date('YmdHi') . $file->getClientOriginalName();
        //         $file->move(public_path('public/Image'), $filename);
        //         $live_match['team_two_image'] = $filename;
        //     }

        // $live_match->update();
        // return ['success' => 'updet success ' ];

    }
    public function post(Request $Request)
    {
        $validator = Validator::make($Request->all(), [

            'team_one_name' => 'required|string|max:191',
            'team_one_image_type' => 'required|string|max:20',
            'team_one_url' => 'nullable|url',
            'team_one_image' => 'nullable|image',

            'team_two_name' => 'required|string|max:191',
            'team_two_image_type' => 'required|string|max:20',
            'team_two_url' => 'nullable|url',
            'team_two_image' => 'nullable|image',



            'match_title' => 'required',
            'match_time' => 'required',
            'match_date' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),500);
            // return ['sms' => 'requrd is feld'];

            //  return self::index($request)->withErrors($validator->errors());
            // if ('team_one_name' == '') {
            //     return 'team_one_name';
            // }

        }else{

            $chack = Matchlive::where([
                ['team_one_name', '=', $Request->team_one_name],
                ['team_two_name', '=', $Request->team_two_name]
            ])->first();
            if ($chack) {
                return ['success' => 'data is alredy insert  '];

            }
            $live_match = new Matchlive();

        $live_match->team_one_name = $Request->team_one_name;
        $live_match->team_one_image_type = $Request->team_one_image_type;
        $live_match->team_one_url = $Request->team_one_url;
        $live_match->team_two_name = $Request->team_two_name;
        $live_match->team_two_image_type = $Request->team_two_image_type;
        $live_match->team_two_url = $Request->team_two_url;
        $live_match->match_title = $Request->match_title;
        $live_match->match_date = $Request->match_date;
        $live_match->match_time = $Request->match_time;


        if ($Request->hasFile('team_one_image')) {
            $file = $Request->file('team_one_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $live_match['team_one_image'] = $filename;
        }


        if ($Request->hasFile('team_two_image')) {
            $file = $Request->file('team_two_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $live_match['team_two_image'] = $filename;
        }




        $live_match->save();

        if ($validator->fails()) {
                return ['error' => 'data not fill '];

            // return ['success' => 'data insert successfull '];
        } else {
                // return ['error' => 'data not fill '];
                return ['success' => 'data insert successfull '];

        }

        //  else {
        //     // return ['success' => 'data validat successfull '];
        //     return ['error' => 'data not valide fill '];
        // }
        // $live_match = new Matchlive();

        // $live_match->team_one_name = $Request->team_one_name;
        // $live_match->team_one_image_type = $Request->team_one_image_type;
        // $live_match->team_one_url = $Request->team_one_url;
        // $live_match->team_two_name = $Request->team_two_name;
        // $live_match->team_two_image_type = $Request->team_two_image_type;
        // $live_match->team_two_url = $Request->team_two_url;
        // $live_match->match_title = $Request->match_title;
        // $live_match->match_date = $Request->match_date;
        // $live_match->match_time = $Request->match_time;


        // if ($Request->hasFile('team_one_image')) {
        //     $file = $Request->file('team_one_image');
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('public/Image'), $filename);
        //     $live_match['team_one_image'] = $filename;
        // }


        // if ($Request->hasFile('team_two_image')) {
        //     $file = $Request->file('team_two_image');
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('public/Image'), $filename);
        //     $live_match['team_two_image'] = $filename;
        // }




        // $live_match->save();

        // if ($validator->fails()) {
        //     return ['success' => 'data insert successfull '];
        // } else {
        //     return ['error' => 'data not fill '];
        // }

        }
        //     $live_match = new Matchlive();

        //     $live_match->team_one_name = $Request->team_one_name;
        //     $live_match->team_one_image_type = $Request->team_one_image_type;
        //     $live_match->team_one_url = $Request->team_one_url;
        //     $live_match->team_two_name = $Request->team_two_name;
        //     $live_match->team_two_image_type = $Request->team_two_image_type;
        //     $live_match->team_two_url = $Request->team_two_url;
        //     $live_match->match_title = $Request->match_title;
        //     $live_match->match_date = $Request->match_date;
        //     $live_match->match_time = $Request->match_time;


        //     if ($Request->hasFile('team_one_image')) {
        //         $file = $Request->file('team_one_image');
        //         $filename = date('YmdHi') . $file->getClientOriginalName();
        //         $file->move(public_path('public/Image'), $filename);
        //         $live_match['team_one_image'] = $filename;
        //     }


        //     if ($Request->hasFile('team_two_image')) {
        //         $file = $Request->file('team_two_image');
        //         $filename = date('YmdHi') . $file->getClientOriginalName();
        //         $file->move(public_path('public/Image'), $filename);
        //         $live_match['team_two_image'] = $filename;
        //     }




        //     $live_match->save();
        // if ($validator->fails()) {
        //     return ['success' => 'data insert successfull '];

        // } else {
        //     return ['error' => 'data not fill '];

        // }
        // return ['success' => 'insert success '];
        // return response()->json(['status' => 'false', 'message' => 'no data found!']);

    }
    public function list()
    {

        $data = Matchlive::all();
        if ($data == [0]) {
            return 'no data found';
        } else {
            return $data;
        }
        // return $Request;
        // return 'ok';
    }
    public function find(Request $Request, $id)
    {
        // return live_matches::find($id);
        // return response()->json(['status' => 'false', 'message' => 'no data found!']);
        $status = Matchlive::find($id);
        if ($status == '') {
            return response()->json(['status' => 'false', 'message' => 'no data found!']);
        } else {
            return  $status;
        }
    }
    public function update(Request $Request, $id)
    {
        $validator = Validator::make($Request->all(), [

            'team_one_name' => 'required|string|max:191',
            'team_one_image_type' => 'required|string|max:20',
            'team_one_url' => 'nullable|required_if:team_one_image_type,url|url',
            'team_one_image' => 'image|image',

            'team_two_name' => 'required|string|max:191',
            'team_two_image_type' => 'required|string|max:20',
            'team_two_url' => 'nullable|required_if:team_two_image_type,url|url',
            'team_two_image' => 'image|image',



            'match_title' => 'required',
            'match_time' => 'required',

        ]);
        if ($validator->fails()) {
            if ($Request->ajax()) {
                return ['success' => 'data validat success '];
            } else {
                // return ['error' => 'data not updet '];
                return response()->json($validator->errors(), 500);

            }
        }
        // $chack = Matchlive::where([
        //     ['team_one_name', '=', $Request->team_one_name],
        //     ['team_two_name', '=', $Request->team_two_name]
        // ])->first();
        // if ($chack) {
        //     // return ['success' => 'data is alredy insert  '];
            // return response()->json($validator->errors(), 500);
        // }
        // return $Request->team_one_name;
        $live_match = Matchlive::find($id);
        $live_match->team_one_name = $Request->team_one_name;
        $live_match->team_one_image_type = $Request->team_one_image_type;
        $live_match->team_one_url = $Request->team_one_url;
        $live_match->team_two_name = $Request->team_two_name;
        $live_match->team_two_image_type = $Request->team_two_image_type;
        $live_match->team_two_url = $Request->team_two_url;
        $live_match->match_title = $Request->match_title;
        $live_match->match_date = $Request->match_date;
        $live_match->match_time = $Request->match_time;

        if ($Request->hasFile('team_one_image')) {
            $file = $Request->file('team_one_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $live_match['team_one_image'] = $filename;
        }


        if ($Request->hasFile('team_two_image')) {
            $file = $Request->file('team_two_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $live_match['team_two_image'] = $filename;
        }

        $live_match->save();

        return ['success' => 'updet success '];


        // return redirect()->back()->with('status', 'Student Updated Successfully');

    }

    public function delete($id)
    {
        $val = Matchlive::find($id);
        $val->delete();
        if ($val == $id) {
            return ['error' => 'id not found '];
        } else {
            return ['success' => 'data delet successfull '];
        }

        // return ['success' => 'delet success '];
    }
}
