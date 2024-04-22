<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Throwable;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $newEmployee = new Employee();
            $newEmployee->full_name = $request->full_name;
            $newEmployee->rol = $request->rol;
            $newEmployee->company_name = $request->company_name;
            $newEmployee->email = $request->email;
            $newEmployee->save();
            return response()->json($newEmployee);

        } catch (Throwable $throwableException) {
            $response = [
                'type' => "error",
                'content' => "Ocurrió un error al crear el empleado.",$throwableException
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
            $editEmployee = Employee::find($id);
            if (isset($editEmployee)) {
                $editEmployee->full_name = $request->full_name;
                $editEmployee->rol = $request->rol;
                $editEmployee->company_name = $request->company_name;
                $editEmployee->email = $request->email;
                $editEmployee->save();
                return response()->json($editEmployee);
            } else {
                $response = [
                    'type' => "error",
                    'content' => "el empleado consultada no existe."
                ];
                return $response;
            }
        } catch (Throwable $throwableException) {
            $response = [
                'type' => "error",
                'content' => "Ocurrió un error al actualizar el empleado."
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
                $employee = Employee::findOrFail($id);
                $employee->delete();
                return response()->json('empleado eliminado');
            } catch (Throwable $throwableException) {
                $response = [
                    'type' => "error",
                    'content' => "Ocurrió un error al eliminar el empleado."
                ];
            }
        }else{
            $response = [
                'type' => "error",
                'content' => "el empleado que intenta eliminar no existe."
            ];
            return $response;
        }
    }
}
