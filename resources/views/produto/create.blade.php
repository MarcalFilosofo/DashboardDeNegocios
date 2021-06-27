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
            <h2 class="h5 no-margin-bottom">Basic forms</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Cadastrar Produto</li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <!-- Form Elements -->
              <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Cadastrar Produto</strong></div>
                  <div class="block-body">
                    @component('produto.components.form')
                        
                    @endcomponent
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        @component('layout.components.footer')
            
        @endcomponent
      </div>
    </div>
      
@endsection