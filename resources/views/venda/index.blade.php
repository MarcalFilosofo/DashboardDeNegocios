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
            <h2 class="h5 no-margin-bottom">Vendas</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Lista de vendas</li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              
              
              <div class="col-12">
                <div class="block">
                  <div class="title"><strong>Vendas</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Produto</th>
                          <th>Quantidade</th>
                          <th>Horário</th>
                          <th>Valor</th>
                          <th colspan="2" style="text-align: center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($vendas as $venda)
                          <tr>
                            <th scope="row">{{$venda->id}}</th>
                            <td>{{$venda->produto->nome}}</td>
                            <td>{{$venda->quantidade}}</td>
                            <td>{{$venda->horario_venda}}</td>
                            <td>R$ {{ number_format(
                              $venda->produto->preco_venda * $venda->quantidade,
                              2,
                              ',',
                              ' '
                            )
                              }}</td>
                            
                            <td>
                              <a href={{ route('venda.edit', ['venda' => $venda->id]) }}>
                                Editar
                              </a>
                            </td>
                            <td>
                              <form id="form_{{$venda->id}}" method="post" action="{{ route('venda.destroy', ['venda' => $venda->id]) }}">
                                @method('DELETE')
                                @csrf
                                <a
                                    href="#"
                                    onclick="document.getElementById('form_{{$venda->id}}').submit()"
                                >
                                  Excluir
                                </a>
                            </form>
                      
                            </td>
                          </tr>
                        @endforeach
                        
                        
                      </tbody>
                    </table>
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