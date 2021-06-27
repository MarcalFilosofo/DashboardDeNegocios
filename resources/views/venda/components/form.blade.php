  
@isset ($venda->id)
    <form action=" {{ route('venda.update', ['venda' => $venda->id ])}} " method="POST" class='form-horizontal'>
        @method('PUT')

@else
    <form action=" {{ route('venda.store')}} " method="POST" class='form-horizontal'>
        @method('POST')

@endisset
    @csrf
    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Produtos</label>
      <div class="col-sm-9">
        <select name="produto_id" class="form-control mb-3 mb-3">
          @foreach($produtos as $key => $produto)
            <option value="{{$produto->id}}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>{{$produto->nome}}</option>
          @endforeach
        </select>
      </div>
    </div>
   
    <div class="line"></div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Quantidade</label>
      <div class="col-sm-9">
        <input value="{{ $venda->quantidade ?? old('quantidade') }}" name="quantidade" type="number" class="form-control"  >
      </div>
    </div> 
    <div class="line"></div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Horario da venda</label>
      <div class="col-sm-9">
        <input value="{{ $venda->horario_venda ?? old('horario_venda') }}" name="horario_venda" type="number" class="form-control" min="0">
      </div>
    </div> 
    
    <div class="line"></div>
    <div class="form-group row">
      <div class="col-sm-9 ml-auto">
        <button type="reset" class="btn btn-secondary">Cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>