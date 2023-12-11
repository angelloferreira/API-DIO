<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll()
    {
        $bands = $this->getBands();

        return response()->json($bands);
    }
    public function getById($id){ 

        $band = null;

        foreach($this->getBands() as $_bands){
            if($_bands['id'] == $id)
            $band = $_bands;
        }

        return $band ? response()->json($band) : abort(code:404);

    }

    public function getByIdGender($gender){

        $bands = [];

        foreach($this->getBands() as $_bands){
            if ($_bands['gender'] == $gender)
                $gender[] = $_bands;


        }
        
        return response()->json($bands);

    }

    public function store(Request $request){
        $validade = $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3'
        ]);
        return response()->json($request->all());
    }

    protected function getBands(){
        return[
            [
                'id' => 1, 
                'name' => 'JOJI', 
                'gender' => 'R&B'
            ],
            [
                'id' => 2, 
                'name' => 'Mamonas Assasinas', 
                'gender' => 'Hard Rock'
            ],
            [
                'id' => 3, 
                'name' => 'Red Hot Chilli Peppers', 
                'gender' => 'Rock Alternativo'
            ],
            [
                'id' => 4, 
                'name' => 'Linkin Park', 
                'gender' => 'Nu Metal'
            ],
            [
                'id' => 5, 
                'name' => 'System of a Down', 
                'gender' => 'Metal Progressivo'
            ],
        ];
    }
}

