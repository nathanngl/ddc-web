<?php

namespace App\Http\Controllers\Office;
use App\Http\Controllers\Controller;

use App\Models\Cash;
use App\Models\Donation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $cash = Cash::
            where('tcs_source','like','%'.$request->keywords.'%')->
            paginate(10);
            return view('page.office.cash.list', compact('cash'));
        }
        return view('page.office.cash.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Cash $cash)
    {
        $donation= Donation::get();
        return view('page.office.cash.modal', compact('donation','cash'));
    }
    public function accept(Request $request, Cash $cash)
    {
        try {
            $cash->comment = $request->comment;
            $cash->tcs_status = 'accepted';
            $cash->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi Tunai '. $request->tc_title . ' telah disetujui',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
    public function deny(Request $request, Cash $cash)
    {
        try {
            $cash->comment = $request->comment;
            $cash->tcs_status = 'denied';
            $cash->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi Tunai '. $request->tc_title . ' telah ditolak',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'tcs_source' => 'required|string',
                'id_donation' => 'required',
                'tcs_total' => 'required'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah: ' . $e->getMessage(),
            ], 422);
        }
        try {
            $cash = new Cash;
            $cash->tcs_source = $request->tcs_source;
            $cash->id_donation = $request->id_donation;
            $cash->tcs_total = Str::of($request->tcs_total)->replace(',','')?: 0;
            $cash->id_user = Auth::user()->id;
            $cash->tcs_status = 'waiting';
            $cash->save();
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi Tunai '. $request->tcs_source . ' telah ditambahkan',
            ]);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cash  $cash
     * @return \Illuminate\Http\Response
     */
    public function show(Cash $cash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cash  $cash
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Cash $cash)
    {
        $donation= Donation::get();
        return view('page.office.cash.modal', compact('donation','cash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cash  $cash
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Cash $cash)
    {
        try {
            
            $cash->tcs_source = $request->tcs_source;
            $cash->id_donation = $request->id_donation;
            $cash->tcs_total = Str::of($request->tcs_total)->replace(',','')?: 0;
            $cash->tcs_status = 'waiting';
            $cash->id_user = Auth::user()->id;
            $cash->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Donasi tunai '. $request->tcs_source . ' telah di Update',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cash  $cash
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Cash $cash)
    {
        try {
            Storage::delete($cash->file);
            $cash->delete();
            return response()->json([
                'alert' => 'success',
                'message' => 'File '. $cash->judul . ' Dihapus',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
}
