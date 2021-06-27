<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li><a href="/"> <i class="icon-home"></i>Home </a></li>
            {{-- <li><a href="tables"> <i class="icon-grid"></i>Tables </a></li>
            <li><a href="charts"> <i class="fa fa-bar-chart"></i>Charts </a></li>
            <li><a href="forms"> <i class="icon-padnote"></i>Forms </a></li> --}}
            <li><a href="#produtos" aria-expanded="false" data-toggle="collapse"> <i class="icon-check"></i>Produtos</a>
              <ul id="produtos" class="collapse list-unstyled ">
                <li><a href={{ route('produto.create') }}><i class="icon-padnote"></i>Cadastrar Produto</a></li>
                <li><a href={{ route('produto.index') }}><i class="icon-grid"></i>Lista de Produtos</a></li>
              </ul>
            </li>
            <li><a href="#vendas" aria-expanded="false" data-toggle="collapse"> <i class="icon-cloud"></i>Vendas</a>
              <ul id="vendas" class="collapse list-unstyled ">
                <li><a href={{ route('venda.create') }}><i class="icon-padnote"></i>Cadastrar Venda</a></li>
                <li><a href={{ route('venda.index') }}><i class="icon-grid"></i>  Lista de Vendas</a></li>
              </ul>
            </li>
            {{-- <li><a href="login"> <i class="icon-logout"></i>Login page </a></li> --}}
    </ul>
    {{-- <span class="heading">Extras</span> --}}
    {{-- <ul class="list-unstyled">
      <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
      <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul> --}}
  </nav>