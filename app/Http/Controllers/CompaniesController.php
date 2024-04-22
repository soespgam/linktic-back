<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;
use Throwable;

class CompaniesController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Company::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
       /* $imageLogo = $request->file('logo')->store('public/logos');
       $urlImg = Storage::url($imageLogo);
    */
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'logo'=>'required',
            'web_site'=>'required'
        ]);
        try {
            $newCompany = new Company();
            $newCompany->name = $request->name;
            $newCompany->email = $request->email;
            $newCompany->logo = $request->logo;
            $newCompany->web_site = $request->web_site;
            $newCompany->save();
            return response()->json($newCompany);

        } catch (Throwable $throwableException) {
            $response = [
                'type' => "error",
                'content' => $throwableException
            ];
            return $response;
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $editCompany = Company::find($id);

            if (isset($editCompany)) {
                $editCompany->name = $request->name;
                $editCompany->email = $request->email;
                $editCompany->logo = $request->logo;
                $editCompany->web_site = $request->web_site;
                $editCompany->save();
                return response()->json($editCompany);
                
            } else {
                $response = [
                    'type' => "error",
                    'content' => "la compañia consultada no existe."
                ];
                return $response;
            }
        } catch (Throwable $throwableException) {
            $response = [
                'type' => "error",
                'content' => "Ocurrió un error al actualizar la compañia."
            ];
            return $response;
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
        if(isset($id)){
            try {
                $Company = Company::findOrFail($id);
                $Company->delete();
                return response()->json("compañia eliminada.");

            } catch (Throwable $throwableException) {
                $response = [
                    'type' => "error",
                    'content' => "Ocurrió un error al eliminar la compañia.",$throwableException
                ];
            }
        }else{
            $response = [
                'type' => "error",
                'content' => "la compañia que intenta eliminar no existe."
            ];
            return $response;
        }
    }
}
