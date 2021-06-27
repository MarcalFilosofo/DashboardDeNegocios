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
            <h2 class="h5 no-margin-bottom">Produtos</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Lista de produtos</li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              
              
              <div class="col-12">
                <div class="block">
                  <div class="title"><strong>Produtos</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome</th>
                          <th>Valor</th>
                          <th colspan="3">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($produtos as $produto)
                          <tr>
                            <th scope="row">{{$produto->id}}</th>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->preco_venda}}</td>
                            <td>
                              <a href={{ route('produto.show', ['produto' => $produto->id]) }}>
                                Detalhes
                              </a>
                            </td>
                            <td>
                              <a href={{ route('produto.edit', ['produto' => $produto->id]) }}>
                                Editar
                              </a>
                            </td>
                            <td>
                              <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                @method('DELETE')
                                @csrf
                                <a
                                    href="#"
                                    onclick="document.getElementById('form_{{$produto->id}}').submit()"
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