@extends('layouts.frontpage')

@section('content')
<section class="ftco-cover overlay" style="background-image: url({{asset('frontpage/images/bg_1.jpg')}});" id="section-home" data-aos="fade"  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center ftco-vh-100">
      <div class="col-md-8 text-center">
        <h1 class="ftco-heading mb-4" data-aos="fade-up" data-aos-delay="500"><img src="img/logo_wide_white.png" alt="JM Corp Logo" width="350" height="100"></h1>
        <h2 class="h5 ftco-subheading mb-5" data-aos="fade-up"  data-aos-delay="600">Despacho Contable.</h2>
        <p data-aos="fade-up"  data-aos-delay="700"><a href="https://free-template.co/" target="_blank" class="btn btn-outline-white px-4 py-3" data-toggle="modal" data-target="#reservationModal">Conocer Más</a></p>
      </div>
    </div>
  </div>
</section>
<!-- END section -->

<div class="ftco-section ftco-counter" id="section-counter">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap" data-aos="fade-up">
        <div class="block-18 d-flex align-items-center">
          <div class="icon mr-4">
            <span class="flaticon-abogado"></span>
          </div>
          <div class="text">
            <strong class="number" data-number="125">0</strong>
            <span>Contadores Calificados</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap" data-aos="fade-up">
        <div class="block-18 d-flex align-items-center">
          <div class="icon mr-4">
            <span class="flaticon-acuerdo"></span>
          </div>
          <div class="text">
            <strong class="number" data-number="326">0</strong>
            <span>Clientes Satisfechos</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap" data-aos="fade-up">
        <div class="block-18 d-flex align-items-center">
          <div class="icon mr-4">
            <span class="flaticon-salud"></span>
          </div>
          <div class="text">
            <strong class="number" data-number="15000">0</strong>
            <span>Balances Generales</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap" data-aos="fade-up">
        <div class="block-18 d-flex align-items-center">
          <div class="icon mr-4">
            <span class="flaticon-medalla"></span>
          </div>
          <div class="text">
            <strong class="number" data-number="12921">5143</strong>
            <span>Premios &amp; Galardones</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section-2">
  <div class="container-fluid">
    <div class="section-2-blocks-wrapper row no-gutters">
      <div class="img col-sm-12 col-md-6" style="background-image: url({{asset('frontpage/images/image_4.jpg')}});" data-aos="fade-right">
        <a href="https://vimeo.com/45830194" class="button popup-vimeo" data-aos="fade-right" data-aos-delay="700"><span class="ion-ios-play"></span></a>
      </div>
      <div class="text col-md-6">
        <div class="text-inner align-self-start" data-aos="fade-up">

          <h3>Fundada en el año 2013, Nuestro Despacho Contable ha crecido considerablemente</h3>
          <p>JM Corporativo, S.A. es una firma de contadores públicos certificados, fundada en la Ciudad de Villahermosa, Tabasco en el año 2013 y brindamos a nuestros clientes servicios y asesoría contable, fiscal y administrativa de manera integral dentro de territorio nacional.</p>

          <p>Ofrecemos asesoría y representación legal a empresas extranjeras o transnacionales con participación y operaciones comerciales en México.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center" data-aos="fade-up">
        <h2>Nuestro Servicios</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4" data-aos="fade-up">
        <div class="media block-6 d-block text-center">
          <div class="icon mb-4"><span class="flaticon-negocios-y-finanzas"></span></div>
          <div class="media-body">
            <h3 class="heading">Servicios Contables</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="media block-6 d-block text-center">
          <div class="icon mb-4"><span class="flaticon-acuerdo-1"></span></div>
          <div class="media-body">
            <h3 class="heading">Personal Injury</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="media block-6 d-block text-center">
          <div class="icon mb-4"><span class="flaticon-pagar"></span></div>
          <div class="media-body">
            <h3 class="heading">Pago de Impuestos</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="media block-6 d-block text-center">
          <div class="icon mb-4"><span class="flaticon-contabilidad-2"></span></div>
          <div class="media-body">
            <h3 class="heading">Control de Contabilidad</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="media block-6 d-block text-center">
          <div class="icon mb-4"><span class="flaticon-proyecto-de-ley-1"></span></div>
          <div class="media-body">
            <h3 class="heading">Capacitaciones en materia contable</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
        <div class="media block-6 d-block text-center">
          <div class="icon mb-4"><span class="flaticon-anadir"></span></div>
          <div class="media-body">
            <h3 class="heading">Insurance Defense</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="ftco-section testimony-img" id="ftco-testimony" style="background-image: url({{asset('frontpage/images/image_8.jpg')}});" data-aos="fade"  data-stellar-background-ratio="0.5">
<div class="container">
  <div class="row justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading" data-aos="fade-up">
      <h2>Testimonials</h2>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row d-flex no-gutters">
    <div class="col-lg align-self-sm-end" data-aos="fade-up">
      <div class="testimony">
         <blockquote>
            <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small.&rdquo;</p>
          </blockquote>
          <div class="author d-flex mt-4">
            <div class="image mr-3 align-self-center">
              <img src="{{asset('frontpage/images/person_1.jpg')}}" alt="">
            </div>
            <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
          </div>
      </div>
    </div>
    <div class="col-lg align-self-sm-end" data-aos="fade-up">
      <div class="testimony overlay">
         <blockquote>
            <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
          </blockquote>
          <div class="author d-flex mt-4">
            <div class="image mr-3 align-self-center">
              <img src="{{asset('frontpage/images/person_2.jpg')}}" alt="">
            </div>
            <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
          </div>
      </div>
    </div>
    <div class="col-lg align-self-sm-end" data-aos="fade-up">
      <div class="testimony">
         <blockquote>
            <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small  line of blind text by the name. &rdquo;</p>
          </blockquote>
          <div class="author d-flex mt-4">
            <div class="image mr-3 align-self-center">
              <img src="{{asset('frontpage/images/person_3.jpg')}}" alt="">
            </div>
            <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
          </div>
      </div>
    </div>
    <div class="col-lg align-self-sm-end" data-aos="fade-up">
      <div class="testimony overlay">
         <blockquote>
            <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however.&rdquo;</p>
          </blockquote>
          <div class="author d-flex mt-4">
            <div class="image mr-3 align-self-center">
              <img src="{{asset('frontpage/images/person_2.jpg')}}" alt="">
            </div>
            <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
          </div>
      </div>
    </div>
    <div class="col-lg align-self-sm-end" data-aos="fade-up">
      <div class="testimony">
        <blockquote>
          <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small  line of blind text by the name. &rdquo;</p>
        </blockquote>
        <div class="author d-flex mt-4">
          <div class="image mr-3 align-self-center">
            <img src="{{asset('frontpage/images/person_3.jpg')}}" alt="">
          </div>
          <div class="name align-self-center">Louise Kelly <span class="position">Illustrator Designer</span></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="ftco-section bg-light">
<div class="container">
  <div class="row justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center"  data-aos="fade-up">
      <h2>Nuestros Contadores</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-md-4" data-aos="fade-up">
      <div class="block-10">
        <div class="person-info mb-3">
          <span class="name">Myla Smith</span>
          <span class="position">Consejero Legal</span>
        </div>
        <img src="{{asset('frontpage/images/person_1.jpg')}}" alt="" class="img-fluid">
      </div>
    </div>
    <div class="col-sm-6 col-md-4" data-aos="fade-up">
      <div class="block-10">
        <div class="person-info mb-3">
          <span class="name">Aldin Powell</span>
          <span class="position">Jefe Principal de Desempeño</span>
        </div>
        <img src="{{asset('frontpage/images/person_3.jpg')}}" alt="" class="img-fluid">
      </div>
    </div>
    <div class="col-sm-6 col-md-4" data-aos="fade-up">
      <div class="block-10">
        <div class="person-info mb-3">
          <span class="name">Clarice Clark</span>
          <span class="position">Socio Directivo, Contador</span>
        </div>
        <img src="{{asset('frontpage/images/person_2.jpg')}}" alt="" class="img-fluid">
      </div>
    </div>
  </div>
</div>
</div>

<div class="ftco-section">
<div class="container">
  <div class="row justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center"  data-aos="fade-up">
      <h2>Consultenos sin compromiso</h2>
    </div>
  </div>
  <div class="row block-9" data-aos="fade-up">
    <div class="col-md-6 pr-md-5">
      <form action="https://twitter.us18.list-manage.com/subscribe/post" method="POST">
        <input type="hidden" name="u" value="2de5772e8859289dfd4246ee7">
        <input type="hidden" name="id" value="100fe9b535">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nombre" name="MERGE1" id="MERGE1" required>
        </div>
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Correo electrónico" name="MERGE0" id="MERGE0" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Asunto" name="MERGE2" id="MERGE2" required>
        </div>
        <div class="form-group">
          <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Mensaje" name="MERGE3" id="MERGE3" required></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Enviar Mensaje" class="btn btn-primary">
        </div>
      </form>
    </div>
    <div class="col-md-6" data-aos="fade-up" id="mapid"></div>
  </div>
</div>
</div>

<div class="ftco-section bg-light">
<div class="container">
  <div class="row justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center"  data-aos="fade-up">
      <h2>Nuestro Blog</h2>
    </div>
  </div>
  <div class="row" data-aos="fade-up">
    <div class="carousel owl-carousel ftco-owl">
      <div class="item">
        <div class="blog-entry" data-aos="fade-up">
          <a href="blog-single.html" class="block-20" style="background-image: url({{asset('frontpage/images/image_5.jpg')}});">
          </a>
          <div class="text">
            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> June 29, 2018</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
              <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="blog-entry" data-aos="fade-up" data-aos-delay="100">
          <a href="blog-single.html" class="block-20" style="background-image: url({{asset('frontpage/images/image_6.jpg')}});">
          </a>
          <div class="text">
            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> June 29, 2018</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
              <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="blog-entry" data-aos="fade-up" data-aos-delay="200">
          <a href="blog-single.html" class="block-20" style="background-image: url({{asset('frontpage/images/image_7.jpg')}});">
          </a>
          <div class="text">
            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> June 29, 2018</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
              <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="blog-entry" data-aos="fade-up" data-aos-delay="200">
          <a href="blog-single.html" class="block-20" style="background-image: url({{asset('frontpage/images/image_8.jpg')}});">
          </a>
          <div class="text">
            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> June 29, 2018</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
              <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
