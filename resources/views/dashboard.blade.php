@extends('default')

@section('content')
<h1 class="flow-text center">Dashboard</h1>
<div class="container">
<p>Ce dashboard est basé sur les données récoltées et émises par l'arduino 192.168.1.99 <br> 
en cas d'erreur visible par l'ordinateur (ex: température trop élevée,..), cette donnée est mise comme un 0°
<br>
<br>
les données : pluie et arrosage en cours sont des des données binaires : soit oui soit non, donc il est normale que la pente ne soit pas représentatif de la pluie,... (cf : graphique sur l'humidité dans le sol)
</p>
</div>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Heure', 'temperature Serre', 'temperature Ambiate',"Humidite Serre","Humidite Ambiante"],
          <?php $i = 0 ; ?>
          @foreach($data as $d)
          @if($i%2==0)
            ["{{Carbon\Carbon::parse($d['created_at'])->format("d/m H:i")}}",{{$d['temperature']}},{{$d['temperature_b']}},{{$d['humidite_air']}},{{$d['humidite_air_b']}}],
          @else
            <?php continue; ?>

            @endif
            <?php $i +=1; ?>
          @endforeach

        ]);

        var options = {
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('temperature'));
        chart.draw(data, options);
      }
    </script>
	<h2 class="flow-text container">Graphique des températures</h2>
    <div id="temperature" style="width: 100vw; height: 500px;"></div>

 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Heure', 'humidite du sol',"pluie","arrosage"],
          <?php $i = 0 ; ?>
            <?php $i +=1; ?>
          @foreach($data as $d)
            @if($i%2==0)
          ["{{Carbon\Carbon::parse($d['created_at'])->format("d/m H:i")}}",{{$d['humiditeSol']}},{{$d["pluie"]==true ? 100 : 0}},{{$d['arrosage']==true ? 100 : 0}}],
            @else
            <?php continue; ?>
            
            @endif
           @endforeach

        ]);

        var options = {
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('sol'));
        chart.draw(data, options);
      }
    </script>
	<h2 class="flow-text container">Graphique de l humidité dans le sol, de l arrosage et de la pluie </h2>

    <div id="sol" style="width: 100vw; height: 500px;"></div>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Heure', 'luminosite ambiant',"luminosite ombre"],
          <?php $i = 0 ; ?>
          @foreach($data as $d)
            <?php if ($i%2==0){ ?>
          ["{{Carbon\Carbon::parse($d['created_at'])->format("d/m H:i")}}",{{$d['luminosite']}},{{$d['luminositeOmbre']}}],
            <?php 
          }else{
              continue; 
          }
            
           $i +=1; ?>
           @endforeach

        ]);

        var options = {
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('luminosite'));
        chart.draw(data, options);
      }
    </script>
  <h2 class="flow-text container">Graphique de la luminosité </h2>

    <div id="luminosite" style="width: 100vw; height: 500px;"></div>
	<h2 class="flow-text container">Informations et actions</h2>
	<div class="container">
		<div class="row">
			<div class="col s6">
				<p> la denière pluie sans arrosage : </p>
				@if(isset($derniere_pluie[0]))
				<h2 class="flow-text">{{Carbon\Carbon::parse($derniere_pluie[0]['created_at'])->format("d/m/Y H:i")}}</h2>
				@else

				<p>JAMAIS</p>
				@endif
			</div>
			<div class="col s6">
				<p><a href="arrose" class="btn btn-large">Arrose 30 secondes</a></p>
				<p><a href="LoadDatas" class="btn btn-large">Charger les données en bdd</a></p>
			</div>
		</div>
	</div>
@endsection