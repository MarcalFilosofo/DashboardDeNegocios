@extends('layout.layout')
@section('content')
    @component('layout.components.header')
    @endcomponent
    <div class="d-flex align-items-stretch">
        @component('layout.components.nav')
            
        @endcomponent

        <div class="page-content">
            <div class="page-header">
              <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Créditos</h2>
              </div>
            </div>
            {{-- <div class="col-12">
                <div class="block">
                    <div class="title">
                        <strong class="d-block">Guilherme Marçal Calisto</strong>
                    </div>
                    <div class="block-body">
                        <span class="d-block">Contrução do Back-end, consultas e popular base da dados</span>
                    </div>
                   
                </div>
            </div> --}}
            <div class="col-12">
                <div class="block">
                    <div class="title">
                        <strong class="d-block">Template</strong>
                    </div>
                    <div class="block-body">
                        <span class="d-block">https://www.templateshub.net/</span>
                    </div>
                   
                </div>
            </div>
        </div>
        
        @component('layout.components.footer')
            
        @endcomponent
    </div>
@endsection