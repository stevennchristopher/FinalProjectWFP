<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $queryBuilder = DB::table('hotels as p')
        //                 ->get();

        //UNTUK INI HARUS PAKAI QUERYMODEL
        $queryModel = Hotel::all();

        return view('hotel.index', ['data'=>$queryModel]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function availableHotelRooms()
    {
        //Eloquent Model
        $data = Hotel::join('products as p', 'hotels.id', '=', 'p.hotel_id')
        ->select('hotels.id', 'hotels.name', DB::raw('sum(p.available_room) as room'))
        ->groupBy('hotels.id', 'hotels.name')
        ->get();

        //dd($data);

        return view('hotel.availableHotelRooms', compact('data'));
    }

    public function avarageHotelRooms()
    {
        //Eloquent Model
        $data = Hotel::leftJoin('products as p', 'hotels.id', '=', 'p.hotel_id')
        ->select('hotels.id', 'hotels.accommodation_type', 'hotels.name', DB::raw('COALESCE(avg(p.price), 0) as avg_price'))
        ->groupBy('hotels.id', 'hotels.accommodation_type', 'hotels.name')
        ->get();

        //dd($data);

        return view('hotel.avarageHotelRooms', compact('data'));
    }

    public function showInfo()
    {
        // return response()->json(array(
        //     'status'=>'oke',
        //     'msg'=>"<div class='alert alert-info'>
        //             Did you know? <br>This message is sent by a Controller.'</div>"
        // ),200);

        $result=Hotel::join('products as p','hotels.id',"=",'p.hotel_id')
                ->orderBy('p.price','DESC')
                ->select('hotels.name', 'p.price')
                ->first();

        return response()->json(array(
            'status'=>'oke',
            'msg'=>"<div class='alert alert-info'>
            Did you know? <br>The most expensive product is ". $result->name." with the price  $".$result->price."</div>"
        ),200);

    }

    public function showProducts()
    {
        $hotel=Hotel::find($_POST['hotel_id']);
        $nama=$hotel->name;
        $data=$hotel->products;

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('hotel.showProducts', compact('nama','data'))->render()
        ),200);
    }

    public function uploadLogo(Request $request)
    {
        $hotel_id=$request->hotel_id;
        $hotel=Hotel::find($hotel_id);
        return view('hotel.formUploadLogo', compact('hotel'));
    }

    public function uploadPhoto(Request $request)
    {
        $hotel_id=$request->hotel_id;
        $hotel=Hotel::find($hotel_id);
        return view('hotel.formUploadPhoto', compact('hotel'));
    }

    public function simpanLogo(Request $request)
    {
        $file=$request->file("file_logo");
        $folder='logo';
        $filename=$request->hotel_id.".jpg";
        $file->move($folder, $filename);
        return redirect()->route('hotel.index')->with('status','logo terupload');
    }

    public function simpanPhoto(Request $request)
    {
        $file=$request->file("file_photo");
        $folder='images/hotel/';
        $filename=time()."_".$file->getClientOriginalName();
        $file->move($folder, $filename);
        $hotel=Hotel::find($request->hotel_id);
        $hotel->image=$filename;
        $hotel->save();
        return redirect()->route('hotel.index')->with('status','photo terupload');
    }
}
