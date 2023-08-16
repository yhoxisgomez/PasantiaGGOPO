@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('title', 'GGOPO')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<style>
    .import{
        background: rgb(150, 0, 27) !important; color: #FFF;
    }
    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #FFF !important;
        background-color: rgb(150, 0, 27) !important;
        border: 1px solid #dee2e6 !important;
    }
    .page-link:hover {
    z-index: 2;
    color: rgb(150, 0, 27) !important;
    text-decoration: none;
    background-color:rgb(209, 68, 94) !important;
    border-color: #dee2e6 !important;
  }
  .page-link:focus {
  z-index: 3;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(150, 0, 27, 0.514) !important;
}

</style>
@endsection
@section('content_header')

    <div style="text-align: center" class="table table-responsive-sm">
        <!--class="m-0 text-dark-->

        <img src="{{ asset('img/logoem.png') }}" class="m-0 text-dark" alt=""  style="height: 100px; width: 220px;">




    </div>


@stop
@section('content')
<div class="container">
<!-- md 12-->
   <div class="col-md-12">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- 3-4-->
         <!-- AGREGAR 2 ESPACIOS -->

       <div class="col-lg-3 col-4">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">

            @php
            $x=0; $suma1=0; $suma2=0; $suma3=0; $suma4=0; $disp1=0; $disp2=0; $disp3=0; $disp4=0; $suma5=0; $suma6=0;
            $disp5=0; $suma7=0;
            $dia_actual = date('Y-m-d');
            @endphp

            @php
            foreach ($vagones_disponibles_tolva as $v) {
                $suma5 = $v->sum;

            }
            foreach ($vagones_disponibles_gondola as $g) {
                $suma6 = $g->sum;
            }

            @endphp
             @php

                foreach ($locomotora2hp as $l) {
                    $suma1 = $l->sum;
                }



            @endphp


            <h3>{{ number_format($suma1) }}</h3>
            <p>Locomotoras 2000HP Disponibles</p>
          </div>
          <div class="icon">
            <i class="fas fa-train"></i>
          </div>
        </div>
      </div>


      <!-- ./col -->
      <div class="col-lg-3 col-4">

        <div class="small-box bg-success">
          <div class="inner">

            @php

                foreach ($locomotora4hp as $l) {
                    $suma2 = $l->pto;
                    $suma7 = $l->mina;
                    $sumatotal=0;
                    $sumatotal= $suma2 + $suma7;
                }


            @endphp


            <h3>{{ number_format($sumatotal) }}<sup style="font-size: 20px"></sup></h3>
            <p>Locomotoras 4000HP Disponibles</p>
          </div>
          <div class="icon">
            <i class="fas fa-train"></i>
          </div>
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-4">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">

            @foreach($vagones as $c)

            @php


            if($c->fecha_vaciado == $dia_actual){
                 $suma3+=$c->cant_tolva_vaciado;
            }

            @endphp

            @endforeach
            <h3>{{ number_format($suma3) }}</h3>
            <p>Cantidad de Vagones Tolvas Vaciados</p>
          </div>
          <div class="icon">
            <i class="fas fa-cube"></i>
          </div>
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-4">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">

            @foreach($vagones as $c)

            @php

                if($c->fecha_vaciado == $dia_actual){
                    $suma4+=$c->cant_gondola_volteado;
                 }


            @endphp

            @endforeach

            <h3>{{ number_format($suma4) }}</h3>
            <p>Cantidad de Vagones Gondolas Volteadas</p>
          </div>
          <div class="icon">
            <i class="fas fa-cube"></i>
          </div>
        </div>
      </div>
      </div>
      <!-- Grafico de Estadistica -->


         <div color="white">
            <div class="card-body">
              <canvas class="chart" id="visitors-chart" color="white" style="max-height: 90%; max-width: 100%;">
              </canvas>
            </div>
         </div>





      <!-- Grafico de Estadistica -->

  </div>

  <div class="contenedor" style="text-align: center; align:center; margin: auto;">
    <br><br> <h5>DISPONIBILIDAD DE LOCOMOTORAS AL DÍA (FLOTA ACTUAL)</h5><br>

            <table id="locomotora2hp" class="table table-responsive-sm table-striped table-bordered" style="max-width: 40%;text-align: center; margin: auto;">

                <thead class="import">

                 <th>2000 HP</th>
                 <th>4000 HP Pto Ordaz</th>
                 <th>4000 HP Mina</th>


                </thead>
                <tbody>
                    @foreach($flota_actual as $f)

                    @php

                    $disp1= (100*$suma1)/$f->flotaLocomotora2HP_actual;
                    $disp2= (100*$suma2)/$f->flotaLocomotora4HP_actual;
                    $disp5= (100*$suma7)/$f->flotaLocomotora4HP_actual;

                    @endphp

                    @endforeach

                    <th>{{$disp1}} %</th>
                    <th>{{$disp2}} %</th>
                    <th>{{$disp5}} %</th>


                  </tr>
                </tbody>
            </table><br><br>


 <h5>DISPONIBILIDAD DE VAGONES AL DÍA (FLOTA ACTUAL)</h5><br>

            <table id="locomotora2hp" class="table table-responsive-sm table-striped table-bordered" style="max-width: 40%;text-align: center; margin: auto;">

                <thead class="import">

                    <th>TOLVAS</th>
                    <th>GÓNDOLAS</th>

                </thead>
                <tbody>
                    @foreach($flota_actual as $f)

                    @php

                    $disp3= (100*$suma5)/$f->flotaVagonesTolva_actual;
                    $disp4= (100*$suma6)/$f->flotaVagonesGondola_actual;

                    @endphp

                    @endforeach

                    <th>{{$disp3}} %</th>
                    <th>{{$disp4}} %</th>

                  </tr>
                </tbody>
            </table><br>

    <br><br> <h5>DISPONIBILIDAD DE LOCOMOTORAS AL DÍA (FLOTA GENERAL)</h5><br>

            <table id="locomotora2hp" class="table table-responsive-sm table-striped table-bordered" style="max-width: 40%;text-align: center; margin: auto;">

                <thead class="import">

                 <th>2000 HP</th>
                 <th>4000 HP Pto Ordaz</th>
                 <th>4000 HP Mina</th>


                </thead>
                <tbody>
                    @foreach($flota as $o)

                    @php

                    $disp1= (100*$suma1)/$o->flotaLocomotora2HP;
                    $disp2= (100*$suma2)/$o->flotaLocomotora4HP;
                    $disp5= (100*$suma7)/$o->flotaLocomotora4HP;

                    @endphp

                    @endforeach

                    <th>{{$disp1}} %</th>
                    <th>{{$disp2}} %</th>
                    <th>{{$disp5}} %</th>


                  </tr>
                </tbody>
            </table><br><br>


    <h5>DISPONIBILIDAD DE VAGONES AL DÍA (FLOTA GENERAL)</h5><br>

            <table id="locomotora2hp" class="table table-responsive-sm table-striped table-bordered" style="max-width: 40%;text-align: center; margin: auto;">

                <thead class="import">

                    <th>TOLVAS</th>
                    <th>GÓNDOLAS</th>

                </thead>
                <tbody>
                    @foreach($flota as $o)

                    @php

                    $disp3= (100*$suma5)/$o->flotaVagonesTolva;
                    $disp4= (100*$suma6)/$o->flotaVagonesGondola;

                    @endphp

                    @endforeach

                    <th>{{$disp3}} %</th>
                    <th>{{$disp4}} %</th>

                  </tr>
                </tbody>
            </table><br>










</div>


  </div>


  <br><br><br>&copy; Muñoz C. y Gómez Y. - UNEG - 2021 <br>

</div>
</div>
</div>





@endsection


@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

    var ctx = document.getElementById('visitors-chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {

            labels: ['FLOTA 4000HP', 'FLOTA 2000HP'],
            datasets: [{

                data: [ 12, 8 ],
                backgroundColor: [

                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',

                ],
                borderColor: [

                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',

                ],
                borderWidth: 1
            }]
        },

    });

    </script>


<script>
   // auth()->user()
   // Swal.fire('BIENVENIDO A LA APP GGOPO PARA EL CONTROL DE LA PRODUCCION EN FMO',)

</script>
@endsection
