<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Validator;
use Storage;
use Auth;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';
        $data = Report::where('nik', 'LIKE', "%$keyword%")
            ->OrderBy('id', 'DESC')
            ->paginate(5);

        $count = $data->count();
        if($count == null) {
            return view('report.aduan')->with([
                'data' =>$data,
            ])->with('success', 'NIK tidak ditemukan');
        }

        return view('report.aduan')->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nik' => 'required|min:16|max:16|unique:reports',
            'nama' => 'required|string|max:20',
            'email' => 'required',
            'hp' => 'required|max:13',
            'aduan' => 'required',
            'foto1' => 'mimes:jpg,png,jpeg,svg|max:2096',
            'foto2' => 'mimes:jpg,png,jpeg,svg|max:2096',
            'foto3' => 'mimes:jpg,png,jpeg,svg|max:2096',
            'foto4' => 'mimes:jpg,png,jpeg,svg|max:2096',
            'foto5' => 'mimes:jpg,png,jpeg,svg|max:2096',
        ], [
            'nik.required' => 'Field NIK harus diisi',
            'nik.min' => 'NIK minimal harus 16 karakter',
            'nik.max' => 'NIK maximal harus 16 karakter',
            'hp.max' => 'No HP maximal 13 karakter',
            'nama.required' => 'Field Nama harus diisi',
            'email.required' => 'Field Email harus diisi',
            'hp.required' => 'Field No Hp harus diisi',
            'aduan.required' => 'Field Aduan harus diisi',
        ])->validate();

        $report = new report;
        $report->nik = $request->nik;
        $report->nama = $request->nama;
        $report->email = $request->nik;
        $report->hp = $request->hp;
        $report->aduan = $request->aduan;

        $foto1 = $request->file('foto1');
        if($foto1) {
            $report->foto1 = $request->file('foto1')->store(
                'aduan', 'public'
            );
        }
        $foto2 = $request->file('foto2');
        if($foto2) {
            $report->foto2 = $request->file('foto2')->store(
                'aduan', 'public'
            );
        }
        $foto = $request->file('foto');
        if($foto) {
            $report->foto = $request->file('foto')->store(
                'aduan', 'public'
            );
        }
        $foto4 = $request->file('foto4');
        if($foto4) {
            $report->foto4 = $request->file('foto4')->store(
                'aduan', 'public'
            );
        }
        $foto5 = $request->file('foto5');
        if($foto5) {
            $report->foto5 = $request->file('foto5')->store(
                'aduan', 'public'
            );
        }

        $report->save();
        session()->flash('success', 'Data berhasil disimpan');
        if(Auth::check())
        {
            return redirect()->route('home');
        } else
        {
            return redirect()->route('aduan.index');
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
        $item = Report::findOrFail($id);
        return view('report.detail')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Report::findOrFail($id);
        return view('report.edit')->with([
            'item' => $item
        ]);
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
        $validation = Validator::make($request->all(),[
            'respon' => 'required|string',
            'status' => 'required|in:diproses,ditolak,selesai',
        ], [
            'respon.required' => 'Respon harus diisi',
            'status.required' => 'Respon harus dipilih',
            'status.in' => 'Respon harus dipilih',
        ])->validate();

        $report = Report::findOrFail($id);

        $report->respon = $request->respon;
        $report->status = $request->status;

        $foto_respon = $request->file('foto_respon');
        if($foto_respon) {
            $report->foto_respon = $request->file('foto_respon')->store(
                'aduan', 'public'
            );
        }

        $foto_respon_2 = $request->file('foto_respon_2');
        if($foto_respon_2) {
            $report->foto_respon_2 = $request->file('foto_respon_2')->store(
                'aduan', 'public'
            );
        }

        $foto_respon_3 = $request->file('foto_respon_3');
        if($foto_respon_3) {
            $report->foto_respon_3 = $request->file('foto_respon_3')->store(
                'aduan', 'public'
            );
        }

        $report->save();
        session()->flash('success', 'Data Berhasil Diubah');
        if(Auth::check()) {
            return redirect()->route('home');
        }else{
            return redirect()->route('aduan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        session()->flash('success', 'Data Berhasil Dihapus');
        return redirect()->route('aduan.index');

    }
}
