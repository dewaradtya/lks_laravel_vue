<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSocietyRequest;
use App\Http\Requests\EditSocietyRequest;
use App\Http\Resources\SocietyResource;
use App\models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Society::with('regional')->get();

        return response()->json([
            'message' => 'Data berhasil ditemukan',
            // 'data' = @query,
            'data' => SocietyResource::collection($query),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSocietyRequest $request)
    {
        // $society = new Society();
        // $society->id_card_number = $request->id_card_number; 
        // $society->password = $request->password; 
        // $society->name = $request->name; 
        // $society->born_date = $request->born_date; 
        // $society->gender = $request->gender; 
        // $society->address = $request->address; 
        // $society->regional_id = $request->regional_id; 
        // $society->save();

        $society = Society::create($request->all());

        return response()->json([
            'succes' => true,
            'message' => 'Data Berhasil di buat'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Society $society)
    {
        return response()->json([
            'message' => 'Data Berhasil di temukan',
            'data' => new SocietyResource($society),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditSocietyRequest $request, Society $society)
    {
        //
        // society = Society::find($id);
        $society->id_card_number = $request->id_card_number; 
        $society->password = $request->password; 
        $society->name = $request->name; 
        $society->born_date = $request->born_date; 
        $society->gender = $request->gender; 
        $society->address = $request->address; 
        $society->regional_id = $request->regional_id; 
        $society->save();
        
        return response()->json([
            'succes' => true,
            'message' => 'Data Berhasil di simpan'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Society::destroy($id);

        return response()->json([
            'succes' => true,
            'message' => 'Data Berhasil di hapus'
        ], 200);
    }
}
