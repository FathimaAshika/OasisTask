<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Validator;

class PersonController extends Controller
{
    // create function 
    public function create(){

        return view('persons.create');
    }
    // edit page
    public function edit($id){
        $person = Person:: find($id);
        return view('persons.edit', compact('person'));
    }
    // delete a person
    public function delete($id){
        $person = Person:: find($id);
        $person->delete();
        return redirect('/');
    }
    // update a person  
    public function update(Request $r){

        $validator = Validator::make($r->all(),[
            'name' => 'required',
            'phone' => 'required',

        ]);
        if($validator->fails()){

           return response()->json(['error'=>'Please fill the required data correctly']);
        }

        $id= $r->id; 
        $person = Person:: find($id);
        $person->name= $r->name ;
        $person->phone= $r->phone ;
        $person->update();

        return redirect('/');
    }
    public function savePerson(Request $r){

        $validator = Validator::make($r->all(),[
            'name' => 'required',
            'phone' => 'required',

        ]);
        if($validator->fails()){

           return response()->json(['error'=>'Please fill the required data correctly']);
        }


        $person = new Person();
        $person->name= $r->name ;
        //$person->person_id="1";
        $person->phone= $r->phone ;
        $person->save();

        $this->addAutoRecord($person->id);

        //return redirect('/');
        return redirect('/')->with('success', 'Successfully added a person ');   
    }

    function addAutoRecord($last_insert_id){

        if(($last_insert_id+1) % 6 ==0){
            // insert record 
            $person = new Person();
            $person->name = '-' ;
            $person->phone ='-' ;
            $person->save();
        }

    }

}
