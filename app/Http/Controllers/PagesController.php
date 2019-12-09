<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function agregar(Request $request){
        
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required'
        ]);
        $ubicacion = rand(1, 6);
        $nfactura = rand(1000, 2000);
        $repuestoNuevo = New App\Repuesto;
        $repuestoNuevo->nombre_repuesto = $request->nombre;
        $repuestoNuevo->precio = $request->precio;
        $repuestoNuevo->ubicacion = $ubicacion;
        $repuestoNuevo->vendido = false; 
        $repuestoNuevo->numero_factura = $nfactura;       

        $repuestoNuevo->save();
        return back()->with('mensaje', 'Repuesto agregado correctamente');
    }
    public function inicio()
    {
        $repuestos = App\Repuesto::
        select('id','nombre_repuesto', \DB::raw('FORMAT(precio, 0) as precio'), \DB::raw('COUNT(id) as unidades'))
        ->where('vendido', 0)
        ->groupBy('nombre_repuesto')
        ->orderBy('nombre_repuesto', 'asc')
        ->get();
        return view('inventario',compact('repuestos'));
    }

    public function stock()
    {
        $repuestos = App\Repuesto::
        select('id','nombre_repuesto', \DB::raw('FORMAT(precio, 0) as precio'), \DB::raw('COUNT(id) as unidades'),'ubicacion')
        ->where('vendido', 0)
        ->groupBy('nombre_repuesto')
        ->orderBy('nombre_repuesto', 'asc')
        ->get();
        return view('inventario',compact('repuestos'));
    }

    public function reporte()
    {
        return view('reporte');
    }

    public function reporteventas()
    {
        return view('reporte-ventas');
    }  
    
    public function factura()
    {
        return view('factura');
    } 

    public function venta($id)
    {
        $repuestos = App\Repuesto::
        select('id','nombre_repuesto', \DB::raw('FORMAT(precio, 0) as precio'), \DB::raw('COUNT(id) as unidades'))
        ->where('nombre_repuesto', $id)
        ->groupBy('nombre_repuesto')
        ->orderBy('nombre_repuesto', 'asc')
        ->get();

        return view('repuesto.venta', compact('repuestos'));
    }

    public function confirmar (Request $request, $id)
    {        
        $var = $id;
        $repuestoNuevo = $request->unidades;
        $repuestoPrecio = $request->precio;
        $totalPrecio = $repuestoPrecio;
        $ventaRepuesto = App\Repuesto::
        where('nombre_repuesto', $id)
        ->where('vendido', 0)
        ->orderBy('created_at', 'desc')
        ->limit($repuestoNuevo)
        ->update(['vendido' => 1]);

        return redirect('factura')
        ->with('unidades', $repuestoNuevo)
        ->with('repuesto', $id)
        ->with('precio', $repuestoPrecio)
        ->with('total', $totalPrecio);
    }
}
