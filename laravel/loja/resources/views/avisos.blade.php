<!-- Usa o HTML/CSS/JS do layout/padrao.blade.php -->
@extends('layouts.padrao')

<!-- Define o título da página/view -->
@section('title','quadro de avisos')

<!-- Usa  o sidebar do layout padrão (layout/padrao.blade.php) -->
@section('sidebar')
    @parent
    <br>
    -------- barra superior ---------
@endsection

<!-- Para inserir o conteúdo no layout padrão (layout/padrao.blade.php) -->
@section('content')

    <h1>quadro de avisos</h1>
    <br>
    <br>
    <h4>Exemplo com sintaxe do blade</h4>
    <!-- Looping para vetor no Blade -->
    @foreach($avisos as $aviso)

        <!-- If no Blade -->
        @if($aviso['exibir'])
            {{$aviso['data']}}: {{$aviso['aviso']}}
            <br>
        @else
            Não há avisos
            <br>

        @endif
    @endforeach
    <br><br>
    <h4>Exemplo com sintaxe do blade</h4>
    <?php
    //PHP puro aqui! ;-)
    foreach($avisos as $aviso){

        if ($aviso['exibir']){
            echo "{$aviso['data']}: {$aviso['aviso']} <br>";
        }else{
            echo "Não há aviso <br>";
    }
}
?>
@endsection
