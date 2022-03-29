<h4>Olá, {{$despesa->user()->name}}!</h4>

<p>Foi cadastrada uma nova despesa para você! Aqui estão algumas informações:</p>
<li>
    <ul><strong>Descricao</strong> : {{$despesa->descricao}}</ul>
    <ul><strong>Valor</strong> : R${{number_format($despesa->valor, 2)}}</ul>
    <ul><strong>Data da Despesa</strong> : {{ date( 'd/m/Y' , strtotime($despesa->data_despesa)) }}</ul>
</li>
