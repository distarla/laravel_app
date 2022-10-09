<h3>Fornecedor</h3>
<p><a href="{{ route('app.sair') }}">LOGOUT</a></p>
{{-- Comentário em Blade --}}

<h1>{{ 'Texto de testeeeeee' }}</h1>

<br>
<?= 'Texto de teste' ?>
<br>

{{-- Como incluir blocos de php puro --}}
@php
    //Aqui podemos incluir qualquer sintaxe de PHP
    echo "Texto de teste";
@endphp

<h2>{{ $msg }}</h2>

@isset($fornecedores)

    @if(count($fornecedores)>0)
        <h4>Existem fornecedores registados!</h4>
    @else
        <h4>Não existem fornecedores registados!</h4>
    @endif

    {{-- Primeiro: {{ $fornecedores[0] }}<br>
    Segundo: {{ $fornecedores[1] ?? 'Não existe' }}<br>
    Terceiro: {{ $fornecedores[2] ?? 'Não existe' }}<br> --}}

    @for($i=0;$i<count($fornecedores);$i++)
        Fornecedor nº: {{ $i+1 }}<br>
        Nome: @{{ $fornecedores[$i]['nome'] }}<br>
        Distrito:
        @switch($fornecedores[$i]['distrito'])
            @case('13')
                {{ $fornecedores[$i]['distrito'] }} - Porto<br>
                @break
            @case('2')
                {{ $fornecedores[$i]['distrito'] }} - Braga
                @break
        @endswitch
        <br>
    @endfor

    <br>

    Com WHILE<br>
    @php $i=0 @endphp
    @while(isset($fornecedores[$i]))
        Nome: {{ $fornecedores[$i]['nome'] }}<br>
        Distrito:
        @switch($fornecedores[$i]['distrito'])
            @case('13')
                {{ $fornecedores[$i]['distrito'] }} - Porto
                @break
            @case('2')
                {{ $fornecedores[$i]['distrito'] }} - Braga
                @break
            @default
                Distrito desconhecido
        @endswitch
        <br>
        <br>
        @php $i++ @endphp
    @endwhile

    <br>

    Com FOREACH<br>
    @foreach($fornecedores as $indice => $fornecedor)
        {{-- @dd($loop) --}}
        @if($loop->first)
            Número de registos: {{ $loop->count }} <br><br>
        @endif
        Iteração: {{ $loop->iteration }}<br>
        Nome: {{ $fornecedor['nome'] }}<br>
        Distrito:
        @switch($fornecedor['distrito'])
            @case('13')
                {{ $fornecedor['distrito'] }} - Porto
                @break
            @case('2')
                {{ $fornecedor['distrito'] }} - Braga
                @break
            @default
                Distrito desconhecido
        @endswitch
        <br>
        <br>
         @if($loop->last)
            ****************************************** <br><br>
        @endif
    @endforeach

    <br>

    Com FORELSE<br>
    @forelse($fornecedores as $indice => $fornecedor)
        Nome: {{ $fornecedor['nome'] }}<br>
        Distrito:
        @switch($fornecedor['distrito'])
            @case('13')
                {{ $fornecedor['distrito'] }} - Porto
                @break
            @case('2')
                {{ $fornecedor['distrito'] }} - Braga
                @break
            @default
                Distrito desconhecido
        @endswitch
        <br>
        <br>
    @empty
        Não existem registos!
    @endforelse

    @if(!@empty($fornecedores))
    {{-- Mostrar todo o conteúdo de um array--}}
    @dd($fornecedores)
    @endif

@endisset