@extends('layouts.app')
@section('title',config('app.name').' | '.$clientes->nomcompleto)
@section('content')

    @include('flash::message')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <section class="content-header">
        <h1>
            {{$clientes->nomcompleto}}
        </h1>
    </section>

  <div class="content">
      @include('clientes.tabs')

      </div>

@stack('modals')

@endsection

@section('scripts')
@stack('scripts')
<script>

//Confirmación Eliminar datos de Contacto
  function ConfirmDeleteContacto(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Se eliminará la información de contacto.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['contactform'+id].submit();
    }
  })
}

function ConfirmDeletedatFiscales(id) {
swal({
      title: '¿Estás seguro?',
      text: 'Se eliminará la información los datos fiscales.',
      type: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Continuar',
      }).then((result) => {
if (result.value) {
  document.forms['datFiscalesForm'+id].submit();
  }
})
}


</script>
@endsection
