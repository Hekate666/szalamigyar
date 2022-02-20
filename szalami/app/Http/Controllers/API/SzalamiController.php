<?php  // átnézni a leíráshoz

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Szalami as SzalamiResource;
use App\Models\Szalami;
use Validator;

class SzalamiController extends BaseController
{
    
    public function index()
    {
        $szalamis = Szalami::all();
        return $this->sendResponse(SzalamiResource::collection($szalamis), 'Összes termék lekérése sikeres!');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'termek_nev' => 'required',
            'termek_ar' => 'required',
            'termek_alapanyag' => 'required',
            'gyartasi_ido' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $szalami = Szalami::create($input);

        return $this->sendResponse(new SzalamiResource($szalami), 'Termék létrehozva!');
    }

    public function show($id)
    {
        $szalami = Szalami::find($id);
        if (is_null($szalami)) {
            
            return $this->sendError('Termék nem található!');
        }
        return $this->sendResponse(new SzalamiResource($szalami), 'Termék sikeresen lekérve.');
    }
    

    public function update(Request $request, Szalami $szalami)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'termek_nev' => 'required',
            'termek_ar' => 'required',
            'termek_alapanyag' => 'required',
            'gyartasi_ido' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());   
        }

        $szalami->termek_nev = $input['termek_nev'];
        $szalami->termek_ar = $input['termek_ar'];
        $szalami->termek_alapanyag = $input['termek_alapanyag'];
        $szalami->gyartasi_ido = $input['gyartasi_ido'];
        $szalami->save();

        
        return $this->sendResponse(new SzalamiResource($szalami), 'A termék adatainak módosítása sikeres!');
    }
   
    public function destroy(Szalami $szalami)
    {
        $szalami->delete();

        return $this->sendResponse([], 'A termék törölve!');
    }
}

