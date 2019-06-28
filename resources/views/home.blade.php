@extends('layouts.app')

@section('content')
<script src="js/bar-graph.js"></script>
    <div class="container">
        <h1 class="text-center">Controlador</h1>
        <br>
        <div class="row">
            <div class="col">
                <h1>Analizador</h1>
                <canvas id="canvasId"></canvas>
            </div>
            <div class="col">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Location</th>
                    </thead>
                    <tbody>
                        <tr onclick="change(['ft', 'm'], ['Polegadas', 'Metros'], [20,53])">
                            <td>Equipamento 1</li>
                            <td>Sensor de Movimento</li>
                            <td>Area de estar</li>
                        </tr>
                        <tr onclick="change(['º'], ['Fahrenheit', 'Celsius'], [70,80])">
                            <td>Equipamento 2</li>
                            <td>Sensor de Calor</li>
                            <td>Cozinha</li>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <h3 class="text-center">Console</h3>
                <textarea name="" id="" cols="125" rows="10" readonly>
                    >Init Server...
                    >Console Start
                    >The Cake is a Lie
                    >Jill Sandwich
                    >Me dá um 10 aí professor, por favor
                </textarea>
            </div>
        </div>
    </div>
    <script>
        var ctx = document.getElementById("canvasId").getContext("2d");
        var graph = new BarGraph(ctx);
        graph.margin = 2;
        graph.width = 450;
        graph.height = 150;
        function change(arrSim, arrLab, arrNum) {
            graph.simbol = arrSim;
            graph.xAxisLabelArr = arrLab;
            graph.update(arrNum);
        }
        change(['ft', 'm'], ['Polegadas', 'Metros'], [20,53]);
    </script>
@endsection
