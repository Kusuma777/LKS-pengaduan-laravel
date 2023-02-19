<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use Validator;
use Storage;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';
        $data = Report::where('nik', 'LIKE', "%$keyword%")
            ->OrderBy('id', 'DESC')
            ->paginate(5);

        $count = $data->count();
        if($count == null) {
            return view('home')->with([
                'data' => $data,
            ])->with('success', 'NIK tidak ditemukan');
        }

        return view('home')->with([
            'data' => $data,
        ]);
    }
}
