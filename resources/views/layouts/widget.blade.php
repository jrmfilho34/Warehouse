    <div class="row">
        <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Cadastro</h3>

                  <p>Total de itens: {{ $total}}</p>
                </div>
                <div class="icon">
                  <i class="fa fa-server"></i>
                </div>
                <a href="{{ route('cadastrar') }}" class="small-box-footer">
                  Cadastrar itens<i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                  <h3>Informações</h3>

                  <p>escolha um item</p>
                </div>
                <div class="icon">
                  <i class="fa fa-search"></i>
                </div>
                <a href="{{ route('busca') }}" class="small-box-footer">
                  Buscar Item<i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>Saída</h3>
                  <p>registrar saída</p>
                </div>
                <div class="icon">
                  <i class="fa fa-server"></i>
                </div>
                <a href="{{ route('saidaRegistro') }}" class="small-box-footer">
                  Saída de Itens<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Relatório</h3>

                  <p>Mensal</p>
                </div>
                <div class="icon">
                  <i class="fa fa-server"></i>
                </div>
                <a href="{{ route('relatorio')}}" class="small-box-footer">
                  Gerar Relatório<i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
    </div>