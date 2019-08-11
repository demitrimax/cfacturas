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
use App\Models\facturas;
use App\Models\mbanca;
use App\Models\saldos;
use App\Models\sociocomercial;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Auth;



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
        $acuerdos = accomercial::whereNotNull('aut1_at')->get();
        $acuerdos = $acuerdos->pluck('numacuerdo','id');

        $clientes = clientes::has('accomerciales')->get();
        $clientes = $clientes->pluck('nombrerfc','id');
        return view('facturas.index')
            ->with(compact('facturas','acuerdos','clientes'));
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
        $clientes = $clientes->pluck('nombrerfc','id');
        $direcciones = direcciones::pluck('RFC','id');
        $empresas = catempresas::pluck('nombre','id');
        $pagometodo = pagometodo::pluck('nombre','id');
        $pagoforma = formapago::pluck('descripcion','id');
        $facestatus = facestatus::pluck('nombre','id');
        return view('facturas.create')->with(compact('clientes','direcciones','empresas','pagometodo','facestatus','pagoforma'));
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
        $clientes = clientes::has('accomerciales')->get();
        $clientes = $clientes->pluck('nombrerfc','id');
        $empresas = catempresas::pluck('nombre','id');
        $pagometodo = pagometodo::pluck('nombre','id');
        $pagoforma = formapago::pluck('descripcion','id');
        $facestatus = facestatus::pluck('nombre','id');

        return view('facturas.edit')->with(compact('facturas','clientes','empresas','pagometodo','pagoforma'));
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
        //TAMBIEN SI LA FACTURA YA TIEN REGISTRADOS MOVIMIENTOS BANCARIOS DE PAGO TAMPOCO PUEDE ELIMINARSE
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

    public function getEmpresasAcuerdo($id)
    {
      $empresasArray[] =  ['id' => 0, 'empresa' => '---'];
      $acuerdo = accomercial::find($id);
      $empresasAcuerdo = $acuerdo->empresasfact;
      if ($empresasAcuerdo){
        unset($empresasArray);
        $empresasArray = array();
        foreach ($empresasAcuerdo as $key => $empresa) {
          $empresasArray[]=['id'=>$empresa->id, 'nombre'=>$empresa->nombre];
        }
      }
      return $empresasArray;

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

    public function storeXML(Request $request)
    {
      $rules = [
          'acuerdo'       => 'required',
          'archivo'       => 'required',
      ];

      $messages = [
          'acuerdo.required'              => 'Es necesario un acuerdo comercial',
          'archivo.required'             => 'Se requiere un archivo de tipo XML.',
          'archivo.mimes'                => 'Solo es permitido cargar archivos XML',
          'archivo.file'                => 'Es requerido un archivo',

      ];

      $this->validate($request, $rules,$messages);

        $input = $request->all();
        //dd($input);

        $archivo = $request->file('archivo')->store('xml');

        $facturas = new facturas();
        $facturas->xmlfile = $archivo;
        //tabla facturas
        $facturas->accomercial_id = $input['acuerdo'];
        // cliente Id se debe obtener del acuerdo seleccionado.
        $acuerdosel = accomercial::find($input['acuerdo']);
        $facturas->cliente_id = $acuerdosel->cliente_id;
        //empresa id buscar del XML el RFC de la empresa
        if (Storage::exists($archivo)){
          $contenidoxml = Storage::get($archivo);
          //dd($contenidoxml);
          //$xml = XmlParser::load($contenidoxml);
          $xml = new \SimpleXMLElement($contenidoxml);
            $ns = $xml->getNamespaces(true);
            $xml->registerXPathNamespace('c', $ns['cfdi']);
            $xml->registerXPathNamespace('t', $ns['tfd']);
          //dd($namespaces);

          //carga xml to array
          $json = json_encode($xml);
          $array= json_decode($json, TRUE);
          $facturas->observaciones = 'Factura dada de alta a partir de archivo XML';
          $facturas->user_id = Auth::user()->id;

          foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){
                  //dd($cfdiComprobante['Version']);
                //if ($cfdiComprobante['Version'] == '3.3') {
                //  Alert::error('Solo soporta versión CFDI Versión 3.3');
                //  return back();
                //}
                $facturas->fecha = strtotime($cfdiComprobante['Fecha']);
                $facturas->formapago_id = $cfdiComprobante['FormaPago'];

                $metodopagoid = pagometodo::where('clave', $cfdiComprobante['MetodoPago'])->first();
                $facturas->metodopago_id = $metodopagoid->id;
                $facturas->foliofac = $cfdiComprobante['Serie'].$cfdiComprobante['Folio'];
                $facturas->subtotal = $cfdiComprobante['SubTotal'];
                $facturas->total = $cfdiComprobante['Total'];
                $factiva = (float)$cfdiComprobante['Total'] - (float)$cfdiComprobante['SubTotal'];
                $facturas->iva = $factiva;
                /*
                echo $cfdiComprobante['fecha'];
                echo $cfdiComprobante['sello'];
                echo $cfdiComprobante['total'];
                echo $cfdiComprobante['subTotal'];
                echo $cfdiComprobante['certificado'];
                echo $cfdiComprobante['formaDePago'];
                echo $cfdiComprobante['noCertificado'];
                echo $cfdiComprobante['tipoDeComprobante'];
                */

          }
          //extrae los datos del emisor de la factura
          foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
            // echo $Emisor['rfc'];
            // echo $Emisor['nombre'];
            //var_dump($Emisor);
            //die;
            //$empresaid = catempresas::where('rfc',$Emisor['Rfc'])->first();
            $empresaid = null;
            $empresasfact = $acuerdosel->empresasfact;
            foreach($empresasfact as $empresafact) {
              // Recorre el arreglo de empresas que pertenezcan al acuerdo comercial y que coincidan con el RFC del emisor
              if ($empresafact->rfc == $Emisor['Rfc'])
              {
                $empresaid = $empresafact->id;
              }
            }
            if(!empty($empresaid)){
                $facturas->empresa_id = $empresaid;
            }else{
              Flash::error('RFC: '.$Emisor['Rfc'].', emisor no corresponde al acuerdo comercial.');
              Alert::error('RFC: '.$Emisor['Rfc'].', emisor no corresponde al acuerdo comercial.');
              Storage::delete($archivo);
              return back();
            }

           }
           foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){

             //echo $Receptor['rfc'];
             //echo $Receptor['nombre'];
          }
        $facturas->save();
        Alert::success('Factura cargada correctamente, revise la información.');

        } else {
          Alert::error('No se pudo cargar el archivo XML.:'.$archivo);
          Storage::delete($archivo);
          return back();
        }
        //$archivoXML = new SimpleXMLElement($archivo);
        //  dd($archivoXML);

        return back();
    }
    public function facturaGenerate(Request $request)
    {
        $input = $request->all();
        $clienteid = $input['cliente_id'];
        $acuerdoid = $input['accomercial_id'];
        $empresaid = $input['empresa_id'];
        $cliente = clientes::find($clienteid);
        $empresa = catempresas::find($empresaid);
        $acuerdo = accomercial::find($acuerdoid);
      return view('facturas.genfactura')->with(compact('cliente','empresa','acuerdo'));
    }
    public function registropago(Request $request, $id)
    {
      $facturaid = $id;
      $factura = facturas::find($facturaid);
      $cuentas = $factura->empresa->catcuentas;
      $cuentas = $cuentas->pluck('bancocuenta','id');
      return view('facturas.factregpago')->with(compact('factura','cuentas'));
    }
    public function guardarpago(Request $request)
    {
      //dd($request);
      $rules = [
          'factura_id'    => 'required',
          'comprobante'   => 'required|file',
          'referencia'    => 'required',
      ];

      $messages = [
          'factura.required'    => 'Es necesario los datos de la factura',
          'comprobante.file'    => 'Es requerido un archivo',
          'referencia'          => 'Es necesario la referencia',
      ];

      $this->validate($request, $rules, $messages);

        $input = $request->all();

        //VERIFICAR QUE LA FACTURA EXISTA
        $factura = facturas::find($input['factura_id']);
        if(empty($factura)){
          Alert::error('La factura no existe!');
          return back();
        }
        //VERIFICAR QUE LA REFERENCIA NO EXISTA EN LA BASE DE Datos
        $referenciaexists = mbanca::where('referencia',$input['referencia'])->first();
        if ($referenciaexists)
        {
          Alert::error('La referencia ya existe, porfavor escriba una referencia diferente');
          return back();
        }

        $archivo = $request->file('comprobante')->store('compfacturas');

        //$comprobante = $arcivo;
        $movbancario = new mbanca();

        $movbancario->cuenta_id     = $input['cuenta'];
        $movbancario->toperacion    = 'abono';
        $movbancario->tmovimiento   = 7; //REGISTRADO COMO PAGO DE FACTURA
        $movbancario->concepto      = 'ENTRADA DE FONDOS DE LA FACTURA NO. '.$factura->foliofac;
        $movbancario->monto         = $factura->total;
        $movbancario->fecha         = date('Y-m-d h:i:s');
        $movbancario->metodo        = 1; //metodo de pago PUE
        $movbancario->referencia    = $input['referencia'];
        $movbancario->user_id       = Auth::user()->id;
        $movbancario->factura_id    = $factura->id;
        $movbancario->documento     = $archivo;
        $movbancario->save();
        //REGISTRAR un SALDO a favor para la empresa que factura que es la comision
        $saldostable = new saldos();
        $empresa = catempresas::find($factura->empresa->id);
        //depende del acuerdo es el tipo de toperacion
        if($factura->acuerdo->base == 'TOTAL'){
                    $saldofac = ($factura->total * ($factura->acuerdo->ac_principalporc/100));
                    $saldostable->monto = $saldofac;
        }
        if($factura->acuerdo->base == 'SUBTOTAL'){
                    $saldofac = ($factura->subtotal * ($factura->acuerdo->ac_principalporc/100));
                    $saldostable->monto = $saldofac;
        }
        if($factura->acuerdo->base == 'DEVOLUCION'){
                    $saldofac = ($factura->total * ($factura->acuerdo->ac_principalporc/100));
                    $saldostable->monto = $saldofac;
        }
        $saldostable->fecha = date('Y-m-d');
        $saldostable->toperacion = 'abono';
        $saldostable->tmovimiento = 9; //MOVIMIENTO COMISION DE FACTURA
        $saldostable->user_id = Auth::user()->id;
        $saldostable->observaciones = 'Generado automaticamente por el modulo de registro de pagos de facturas.';
        $saldostable->estatus_id = 2; //estado pendiente
        $saldostable->save();
        $saldostable->empresas()->attach($empresa);

        //Registrar el saldo a favor que se devuelve al cliente
        $saldoscliente = new saldos();
        $cliente = clientes::find($factura->cliente->id);
        $saldoscliente->monto = ($factura->total - $saldofac);
        $saldoscliente->fecha = date('Y-m-d');
        $saldoscliente->toperacion = 'abono';
        $saldoscliente->tmovimiento = 8; //DEVOLUCION DE FACTURA
        $saldoscliente->user_id = Auth::user()->id;
        $saldoscliente->observaciones = 'Generado automaticamente por el modulo de registro de pagos de facturas.';
        $saldoscliente->estatus_id = 2; //pendiente
        $saldoscliente->save();
        $saldoscliente->clientes()->attach($cliente);


        //Registrar el saldo a favor del asociado comercial
        if($factura->acuerdo->sociocomer){
          $saldosocio = new saldos();
          $socio = sociocomercial::find($factura->acuerdo->sociocomer->id);
          $saldosocio->monto = ($saldofac * $factura->acuerdo->asoc_comision);
          $saldosocio->fecha = date('Y-m-d');
          $saldosocio->toperacion = 'abono';
          $saldosocio->tmovimiento = 9; //COMISION DE LA COMISION DE FACTURA
          $saldosocio->user_id = Auth::user()->id;
          $saldosocio->observaciones = 'Generado automaticamente por el modulo de registro de pagos de facturas.';
          $saldosocio->estatus_id = 2; //pendiente
          $saldosocio->save();
          $saldosocio->socios()->attach($socio);
        }

        //asignar el estatus '5' a la factura (que signigifica que ya esta pagado completamente)
        $factura->estatus_id  = 5;
        $factura->save();

        Alert::success('Pago registrado correctamente');
        return redirect(route('facturas.index'));

    }
}
