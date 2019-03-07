<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefacturasRequest;
use App\Http\Requests\UpdatefacturasRequest;
use App\Repositories\facturasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\clientes;
use App\Models\direcciones;
use App\Models\catempresas;
use App\Models\pagometodo;
use App\Models\pagocondicion;
use App\Models\facestatus;
use App\Models\accomercial;
use App\Models\formapago;



class facturasController extends AppBaseController
{
    /** @var  facturasRepository */
    private $facturasRepository;

    public function __construct(facturasRepository $facturasRepo)
    {
        $this->facturasRepository = $facturasRepo;
        $this->middleware('auth');
        $this->middleware('permission:facturas-list');
        $this->middleware('permission:facturas-create', ['only' => ['create','store']]);
        $this->middleware('permission:facturas-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:facturas-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the facturas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->facturasRepository->pushCriteria(new RequestCriteria($request));
        $facturas = $this->facturasRepository->all();
        //Alert::message('Robots are working!');
        return view('facturas.index')
            ->with('facturas', $facturas);
    }

    /**
     * Show the form for creating a new facturas.
     *
     * @return Response
     */
    public function create()
    {
        //$clientes = clientes::has('direcciones')->get();
        $clientes = clientes::has('accomerciales')->get();
        //$clientes = $clientes->where()
        $clientes = $clientes->pluck('nombrerfc','id');
        $direcciones = direcciones::pluck('RFC','id');
        $empresas = catempresas::pluck('nombre','id');
        $pagometodo = pagometodo::pluck('nombre','id');
        $pagoforma = formapago::pluck('descripcion','id');
        $facestatus = facestatus::pluck('nombre','id');
        return view('facturas.create')->with(compact('clientes','direcciones','empresas','pagometodo','pagocondicion','facestatus','pagoforma'));
    }

    /**
     * Store a newly created facturas in storage.
     *
     * @param CreatefacturasRequest $request
     *
     * @return Response
     */
    public function store(CreatefacturasRequest $request)
    {
      $rules = [
        //'fechasolicitud' => 'required',
        'cliente_id' => 'required',
        'accomercial_id' => 'required',
        'empresa_id' => 'required',
        'fecha' => 'required',
        'foliofac' => 'required',
        'observaciones' => 'required',
        'subtotal' => 'required',
        'iva' => 'required',
        'total' => 'required',
        'comprobante' => 'required',
        'user_id' => 'required'
      ];
      $this->validate($request, $rules);
        $input = $request->all();

        $facturas = $this->facturasRepository->create($input);
        //dd($facturas);
        if($request->has('comprobante'))
        {
          //$facturas->comprobante
          $factura = $request->file('comprobante')->store('comprobantes');
          $facturas->comprobante = $request->file('comprobante')->getClientOriginalName();
          $facturas->savedas = $factura;
          $facturas->save();
        }


        Flash::success('Factura guardada correctamente.');
        Alert::success('Factura guardada correctamente.', 'Facturas');

        return redirect(route('facturas.index'));
    }

    /**
     * Display the specified facturas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facturas = $this->facturasRepository->findWithoutFail($id);

        if (empty($facturas)) {
          Flash::error('Factura no encontrada');
          Alert::error('Factura no encontrada.');

            return redirect(route('facturas.index'));
        }

        return view('facturas.show')->with(compact('facturas'));
    }

    /**
     * Show the form for editing the specified facturas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facturas = $this->facturasRepository->findWithoutFail($id);

        if (empty($facturas)) {
          Flash::error('Factura no encontrada');
          Alert::error('Factura no encontrada.');

            return redirect(route('facturas.index'));
        }

        return view('facturas.edit')->with('facturas', $facturas);
    }

    /**
     * Update the specified facturas in storage.
     *
     * @param  int              $id
     * @param UpdatefacturasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefacturasRequest $request)
    {
        $facturas = $this->facturasRepository->findWithoutFail($id);

        if (empty($facturas)) {
            Flash::error('Factura no encontrada');
            Alert::error('Factura no encontrada.');

            return redirect(route('facturas.index'));
        }

        $facturas = $this->facturasRepository->update($request->all(), $id);

        Flash::success('Factura actualizada correctamente.');
        Alert::success('Factura actualizada correctamente.');

        return redirect(route('facturas.index'));
    }

    /**
     * Remove the specified facturas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facturas = $this->facturasRepository->findWithoutFail($id);

        if (empty($facturas)) {
            Flash::error('Factura no encontrada');
            Alert::error('Factura no encontrada.');

            return redirect(route('facturas.index'));
        }
        /* TRABAJAR EN ESTA PARTE LUEGO YA QUE SI PERTENECE A UN SOLICITUD NO PUEDE ELIMINARSE
        if ($facturas->has('solicitud'))
        {
          Flash::error('No se puede eliminar la factura.');
          Alert::error('No se puede eliminar la factura.');

          return redirect(route('facturas.index'));
        }
        */

        $this->facturasRepository->delete($id);

        Flash::success('Factura Borrada Correctamente.');
        Alert::success('Factura Borrada Correctamente.');

        return redirect(route('facturas.index'));
    }

    public function getAcuerdosCliente($id)
    {
      $acuerdoArray[] =  ['id' => 0, 'numacuerdo' => 'Sin Acuerdos'];
      $acuerdos= accomercial::where('cliente_id',$id)->whereNotNull('aut1_at')->get();
      if ($acuerdos){
        unset($acuerdosArray);
        $acuerdoArray = array();
        foreach($acuerdos as $key=>$acuerdo){
          $acuerdoArray[] = ['id' => $acuerdo->id, 'numacuerdo' => $acuerdo->numacuerdo.' - '.$acuerdo->ac_principalporc.'%-'.$acuerdo->base ];
        }
      }
      return $acuerdoArray;
    }

    public function getComprobante($id)
    {
      $facturas = $this->facturasRepository->findWithoutFail($id);

      if (empty($facturas)) {
          Flash::error('Factura no encontrada');
          Alert::error('Factura no encontrada.');

          return redirect(route('facturas.index'));
      }

      return Storage::download($facturas->savedas,$facturas->comprobante);
    }

    public function createXML()
    {
      //UPLOAD DE XML
      // crear el objeto CFDI
      /* $cfdi = \CfdiUtils\Cfdi::newFromString(
          file_get_contents('cfdi.xml')
      );
      // obtener el QuickReader con el método dedicado
      $comprobante = $cfdi->getQuickReader(); */
      return view('facturas.createxml');

    }
}
