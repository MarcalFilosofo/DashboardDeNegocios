  
@isset ($produto->id)
    <form action=" {{ route('produto.update', ['produto' => $produto->id ])}} " method="POST" class='form-horizontal'>
        @method('PUT')

@else
    <form action=" {{ route('produto.store')}} " method="POST" class='form-horizontal'>
        @method('POST')

@endisset
    @csrf
    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Nome</label>
      <div class="col-sm-9">
        <input value="{{ $produto->nome ?? old('nome') }}" type="text" name="nome" class="form-control">
      </div>
    </div>
   
    <div class="line"></div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Valor</label>
      <div class="col-sm-9">
        <input value="{{ $produto->preco_venda ?? old('preco_venda') }}" name="preco_venda" type="number" class="form-control" step=".01" >
      </div>
    </div> 
    <div class="line"></div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Custo</label>
      <div class="col-sm-9">
        <input value="{{ $produto->custo ?? old('custo') }}" name="custo" type="number" class="form-control" step=".01" >
      </div>
    </div> 
    <div class="line"></div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Estoque</label>
      <div class="col-sm-9">
        <input value="{{ $produto->estoque ?? old('estoque') }}" name="estoque" type="number" class="form-control">
      </div>
    </div> 

    <div class="line"></div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Descrição</label>
      <div class="col-sm-9">
        <textarea name="descricao" class="form-control">
          {{ $produto->descricao ?? old('descricao') }}
        </textarea>
        <small class="help-block-none">Descreva o seu produto</small>
      </div>
    </div>
    
    <div class="line"></div>
    <div class="form-group row">
      <div class="col-sm-9 ml-auto">
        <button type="reset" class="btn btn-secondary">Cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <input value="{{ 1 }}" name="user_id" type="hidden" class="form-control">
  </form>