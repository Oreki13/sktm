<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSktm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class PengajuanSktmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = PengajuanSktm::where('is_deleted', 0)->orderBy('created_at', 'desc')->paginate(5);



        // dd($datas);
        return view('admin.dashboard', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuan-sktm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16'],
            'nama' => ['required', 'string', 'max:355'],
            'email' => ['required', 'email'],
            'jenis_kelamin' => ['required', 'string', 'max:20'],
            'agama' => ['required', 'string', 'max:15'],
            'pob' => ['required', 'string', 'max:50'],
            'dob' => ['required'],
            'address' => ['required', 'string', 'max:455'],
            'pendidikan' => ['required', 'string', 'max:255'],
            'pekerjaan' => ['required', 'string', 'max:355']
        ]);

        $cek = PengajuanSktm::where('nik', $data['nik'])->first();

        if ($cek) {
            return back()->with('failed', 'NIK yang di masukan telah melakukan pengajuan!');
        } else {
            // $data['nik'] = Crypt::encryptString($request['nik']);
            $data['status'] = 0;
            $data['is_deleted'] = 0;
            // dd(Crypt::encryptString($request['nik']));

            try {
                //code...
                PengajuanSktm::create($data);
                return back()->with('success', 'Berhasil melakukan pengajuan, informasi selanjutnya akan di kirim melalui email');
            } catch (\Throwable $th) {
                //throw $th;
                if ($th->getCode() == 23000) {
                    return back()->with('failed', 'NIK yang di masukan telah melakukan pengajuan!');
                } else {
                    return back()->with('failed', 'Gagal melakukan pengajuan!');
                }
            }
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
        $data = PengajuanSktm::where('id', $id)->first();
        // dd($data);
        $bgColorStatus = '';
        if ($data->status == 0) {
            $bgColorStatus = 'bg-blue-600';
        } else if ($data->status == 1) {
            $bgColorStatus = 'bg-green-600';
        } else if ($data->status == 2) {
            $bgColorStatus = 'bg-red-600';
        }
        return view('admin.detail', ['data' => $data, 'bgColorStatus' => $bgColorStatus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        PengajuanSktm::where('id', $id)->update(['status' => $request['status']]);
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
        $data = $request->validate([
            'nik' => ['required', 'numeric', 'max_digits:16', 'min_digits:16'],
            'nama' => ['required', 'string', 'max:355'],
            'email' => ['required', 'email'],
            'jenis_kelamin' => ['required', 'string', 'max:20'],
            'agama' => ['required', 'string', 'max:15'],
            'pob' => ['required', 'string', 'max:50'],
            'dob' => ['required'],
            'address' => ['required', 'string', 'max:455'],
            'pendidikan' => ['required', 'string', 'max:255'],
            'pekerjaan' => ['required', 'string', 'max:355']

        ]);

        // $data['nik'] = Crypt::encryptString($request['nik']);
        $data['is_deleted'] = 0;

        PengajuanSktm::where('id', $id)->update($data);
        return redirect('/admin')->with('success', 'Berhasil melakukan update data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        PengajuanSktm::where('id', $id)->update(['is_deleted' => $request['is_deleted'], 'status' => 2]);
        return redirect('/admin')->with('success', 'Berhasil menghapus data!');
    }

    public function checkStatusByNik($nik)
    {
        $data = PengajuanSktm::where('nik', $nik)->first();
        if ($data) {
            return response()->json([
                'code' => 200,
                'status' => $data->status,
                'id' => $data->id
            ]);
        } else {
            return response()->json([
                'code' => 404,
                'status' => '-'
            ]);
        }
    }
    public function showNotAdmin($id)
    {
        $data = PengajuanSktm::where('id', $id)->first();
        // dd($data);
        $bgColorStatus = '';
        if ($data->status == 0) {
            $bgColorStatus = 'bg-blue-600';
        } else if ($data->status == 1) {
            $bgColorStatus = 'bg-green-600';
        } else if ($data->status == 2) {
            $bgColorStatus = 'bg-red-600';
        }
        return view('check', ['data' => $data, 'bgColorStatus' => $bgColorStatus]);
    }
}
