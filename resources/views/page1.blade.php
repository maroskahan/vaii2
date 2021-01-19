@extends('layouts.app')

@section('content')
<link href="{{ asset('css/css.css') }}" rel="stylesheet">
<div class="container" style="background-color: white;">
    <h1>Stránka {{ Route::current()->getName() }}</h1>
        <br>
    <p id="p1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi porta lorem mollis aliquam ut porttitor leo a diam. Donec et odio pellentesque diam volutpat commodo sed egestas. Lacus laoreet non curabitur gravida arcu ac tortor dignissim. Amet risus nullam eget felis eget nunc. Massa placerat duis ultricies lacus sed turpis tincidunt id. Pellentesque habitant morbi tristique senectus et netus et. Quis commodo odio aenean sed adipiscing diam. Sagittis nisl rhoncus mattis rhoncus urna neque viverra. Ut diam quam nulla porttitor massa id neque aliquam. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Et ultrices neque ornare aenean euismod elementum. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam. Cursus vitae congue mauris rhoncus aenean vel elit. Nulla at volutpat diam ut venenatis tellus in metus. Nullam vehicula ipsum a arcu cursus vitae congue mauris. Volutpat est velit egestas dui id. Congue mauris rhoncus aenean vel elit scelerisque mauris. Lacus suspendisse faucibus interdum posuere.</p>
        <br>
    <p id="p2">At in tellus integer feugiat scelerisque varius morbi enim nunc. Et malesuada fames ac turpis egestas sed tempus. Eget nullam non nisi est sit amet facilisis. Dui ut ornare lectus sit amet. Egestas dui id ornare arcu odio ut sem nulla. Faucibus in ornare quam viverra orci sagittis. Enim praesent elementum facilisis leo vel. Suspendisse faucibus interdum posuere lorem ipsum dolor sit. Amet purus gravida quis blandit turpis cursus in hac habitasse. Nisi est sit amet facilisis magna etiam tempor orci eu. Eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Duis convallis convallis tellus id interdum velit laoreet id donec. Turpis egestas maecenas pharetra convallis. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor. Vestibulum sed arcu non odio euismod lacinia at quis. Volutpat lacus laoreet non curabitur gravida arcu ac.</p>
        <br>
    <p id="p3">Volutpat consequat mauris nunc congue nisi. Orci dapibus ultrices in iaculis nunc sed augue lacus. At augue eget arcu dictum varius duis at consectetur. Venenatis lectus magna fringilla urna. Sed euismod nisi porta lorem mollis. Cras pulvinar mattis nunc sed blandit libero. Blandit turpis cursus in hac. Donec adipiscing tristique risus nec feugiat. Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue. Ac placerat vestibulum lectus mauris ultrices eros in cursus turpis. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Ipsum a arcu cursus vitae congue. Nisl vel pretium lectus quam id leo in. Tincidunt eget nullam non nisi est sit amet. In nibh mauris cursus mattis molestie a iaculis. Amet venenatis urna cursus eget nunc scelerisque viverra.</p>
        <br>
    <p id="p4">Non pulvinar neque laoreet suspendisse interdum consectetur libero id. Quam viverra orci sagittis eu volutpat odio facilisis mauris. Elit at imperdiet dui accumsan sit amet nulla facilisi. Leo urna molestie at elementum eu facilisis. Netus et malesuada fames ac turpis. Mattis rhoncus urna neque viverra justo. Cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Venenatis a condimentum vitae sapien pellentesque habitant morbi. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Nulla porttitor massa id neque aliquam vestibulum. Feugiat in ante metus dictum at tempor commodo ullamcorper a.</p>
        <br>
    <p id="p5">Sodales ut eu sem integer vitae. Vel quam elementum pulvinar etiam non quam lacus suspendisse. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Tellus id interdum velit laoreet id. Pulvinar neque laoreet suspendisse interdum consectetur libero. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Integer quis auctor elit sed vulputate mi sit amet. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam. Fames ac turpis egestas sed tempus urna et pharetra. Eu lobortis elementum nibh tellus molestie nunc. Sit amet est placerat in egestas erat imperdiet. Aliquam sem fringilla ut morbi. Congue nisi vitae suscipit tellus mauris a.</p>
        <br>
    <table>
        <tr>
            <th>Company</th>
            <th>Contact</th>
            <th>Country</th>
        </tr>
        <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Centro comercial Moctezuma</td>
            <td>Francisco Chang</td>
            <td>Mexico</td>
        </tr>
        <tr>
            <td>Ernst Handel</td>
            <td>Roland Mendel</td>
            <td>Austria</td>
        </tr>
        <tr>
            <td>Island Trading</td>
            <td>Helen Bennett</td>
            <td>UK</td>
        </tr>
        <tr>
            <td>Laughing Bacchus Winecellars</td>
            <td>Yoshi Tannamuri</td>
            <td>Canada</td>
        </tr>
        <tr>
            <td>Magazzini Alimentari Riuniti</td>
            <td>Giovanni Rovelli</td>
            <td>Italy</td>
        </tr>
    </table>
</div>
@endsection
