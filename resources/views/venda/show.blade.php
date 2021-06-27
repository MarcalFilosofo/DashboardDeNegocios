@extends('layout.layout')
@section('content')
 

    @component('layout.components.header')
        
    @endcomponent
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @component('layout.components.nav')
            
    @endcomponent
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h1 no-margin-bottom">{{$produto->nome}}</h2>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="index.html">Produtos</a></li>
          <li class="breadcrumb-item active">{{$produto->nome}}</li>
        </ul>
      </div>
      <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8">
              <div class="line-chart block chart">
                <div class="title"><strong>Vendas do produto X média</strong></div>
                <canvas id="lineChartCustom1"></canvas>
              </div>
            </div>
            
            <div class="col-lg-4">
              <div class="chart block">
                <div class="title"> <strong>Visitas ao produto X média</strong></div>
                <div class="bar-chart chart margin-bottom-sm">
                  <canvas id="barChartCustom1"></canvas>
                </div>
                <div class="bar-chart chart">
                  <canvas id="barChartCustom2"></canvas>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6">
              <div class="doughnut-chart chart block">
                <div class="title"><strong>Estoque do produto</strong></div>
                <div class="doughnut-chart chart margin-bottom-sm">
                  <canvas id="doughnutChartCustom1"></canvas>
                </div>
              </div>
            </div>
          
            <div class="col-lg-6">
              <div class="radar-chart chart block">
                <div class="title"><strong>Métricas Produto x média</strong></div>
                <div class="radar-chart chart margin-bottom-sm">
                  <canvas id="radarChartCustom"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="footer">
        <div class="footer__block block no-margin-bottom">
          <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- JavaScript files-->
  
  
@endsection