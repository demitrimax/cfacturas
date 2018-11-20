@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
          <!-- Small boxes (Stat box) -->
          <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> No Autorizado</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! No tiene los permisos necesarios para realizar la acción solicitada.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->

</div>
          <!-- /.row -->
          <!-- Main row -->

    </div>




@endsection
