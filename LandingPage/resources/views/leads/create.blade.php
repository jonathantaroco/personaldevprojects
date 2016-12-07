@extends('template');

@section('content')
    <div class="container"> 
        <div class="row row-content">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div id="font">
                    <div id="slogan"><h1><strong>ESTREMA CONSULTORIA</strong></h1></div>
                    <h2>Preencha com as suas informações. Nós entraremos em contato!</h2>
                </div>
                    
                {!! Form::open(['url'=>'leads/store']) !!}
            </div>
            <!-- Nome -->

            <div class="col-md-6 col-sm-12 col-xs-12 divform">
                <div class="form-group-sm {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <div class="col-md-6">
                        {!! Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Nome Completo']) !!}
                    </div>
                    @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif            
                </div>        

                <!-- Email -->

                <div class="form-group-sm {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="col-md-6">
                        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                    </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>

                <!-- Telefone -->

                <div class="form-group-sm {{ $errors->has('telefone') ? 'has-error' : '' }}">
                    <div class="col-md-6">
                        {!! Form::text('telefone', null, ['class'=>'form-control', 'placeholder'=>'Telefone Celular']) !!}
                    </div>
                    @if ($errors->has('telefone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif            
                </div>

                <!-- Data de Nascimento -->

                <div class="form-group-sm {{ $errors->has('nascimento') ? 'has-error' : '' }}">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        {!! Form::text('nascimento', null, ['class'=>'form-control', 'placeholder'=>'Data de Nascimento. Ex: YYYY-MM-DD']) !!}
                    </div>
                    @if ($errors->has('nascimento'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nascimento') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- CEP -->

                <div class="form-group-sm {{ $errors->has('cep') ? 'has-error' : '' }}">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        {!! Form::text('cep', null, ['class'=>'form-control', 'placeholder'=>'CEP']) !!}
                    </div>
                    @if ($errors->has('cep'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cep') }}</strong>
                        </span>
                    @endif
                </div>        

                <!-- Rua -->

                <div class="form-group-sm {{ $errors->has('rua') ? 'has-error' : '' }}">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        {!! Form::text('rua', null, ['class'=>'form-control', 'placeholder'=>'Logradouro']) !!}
                    </div>
                    @if ($errors->has('rua'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rua') }}</strong>
                        </span>
                    @endif
                </div>        

                <!-- Bairro -->

                <div class="form-group-sm {{ $errors->has('bairro') ? 'has-error' : '' }}">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        {!! Form::text('bairro', null, ['class'=>'form-control', 'placeholder'=>'Bairro']) !!}
                    </div>
                    @if ($errors->has('bairro'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bairro') }}</strong>
                        </span>
                    @endif
                </div>        

                <!-- Cidade -->

                <div class="form-group-sm {{ $errors->has('cidade') ? 'has-error' : '' }}">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        {!! Form::text('cidade', null, ['class'=>'form-control', 'placeholder'=>'Cidade']) !!}
                    </div>
                    @if ($errors->has('cidade'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cidade') }}</strong>
                        </span>
                    @endif
                </div>        

                <!-- Estado -->

                <div class="form-group-sm {{ $errors->has('estado') ? 'has-error' : '' }}">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        {!! Form::text('estado', null, ['class'=>'form-control', 'placeholder'=>'Estado. Ex: MG']) !!}
                    </div>
                    @if ($errors->has('estado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estado') }}</strong>
                        </span>
                    @endif
                </div>        

                <!-- Submit -->

                <div class="form-group">
                    <div class="col-md-12" id="botao">
                        {!! Form::submit('CADASTRAR', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>    
        </div>
        <div class="row row-content">
            <h1 id="font">Junte-se à <strong>diversas</strong> empresas que usam a Estrema Consultoria.</h1>
            <div class="col-md-3">
                <div class="panel panel-default" id="panel1">
                    <div class="panel-body">
                        <h4><strong>AUDITORIA</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra turpis lorem, eu porta dolor iaculis sit amet. Sed dolor magna, gravida at lectus quis, vestibulum pellentesque ex. Etiam dui nulla, blandit eu gravida in, lobortis ac mi. Nam vulputate ornare lectus eu mollis. Donec convallis nec magna hendrerit bibendum. Cras placerat magna eu ipsum tincidunt, sed tempor dolor rutrum. Suspendisse sit amet sem ac eros viverra condimentum vitae maximus justo.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="panel panel-default" id="panel2">
                    <div class="panel-body">
                        <h4><strong>CONSULTORIA</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel lectus nec dui lobortis rhoncus non sed massa. Proin id justo non dolor euismod suscipit. Donec vehicula ullamcorper metus, at consectetur neque efficitur id. Ut erat leo, porttitor a felis eu, faucibus viverra nisl. Aliquam ut tempor lectus, sed pulvinar justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque mollis rhoncus odio, id euismod odio ultrices nec.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="panel panel-default" id="panel3">
                    <div class="panel-body">
                        <h4><strong>CONTABILIDADE</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod elit diam, at varius nulla ornare at. Aliquam sit amet nulla in tellus scelerisque vehicula. Sed varius eleifend auctor. In imperdiet, enim vitae luctus dignissim, ante leo faucibus orci, eget fringilla nibh mauris a est. Suspendisse ut consectetur nunc, vel tempus quam. Sed eget mi imperdiet, dignissim augue eget, porta purus. Pellentesque congue mi sed justo fermentum, id posuere mauris sagittis.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="panel panel-default" id="panel4">
                    <div class="panel-body">
                        <h4><strong>OUTSORCING</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris interdum velit vel velit dictum feugiat. Donec ut sollicitudin ligula, quis convallis nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent tempor ligula nulla, nec aliquam mauris pellentesque eu.</p>
                    </div>
                </div>  
            </div>
            
        </div>
    </div>
@endsection