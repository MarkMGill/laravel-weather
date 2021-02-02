<div class="links">
  {{ $forecast->dailyForecasts->forecastLocation->city }} - {{ $forecast->dailyForecasts->forecastLocation->state }} - {{ $forecast->dailyForecasts->forecastLocation->country }}
 
  <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Weather</th>
            <th scope="col">Hour</th>
            <th scope="col">Temperature</th>
        </tr>
        </thead>
      <tbody>
      @foreach ($forecast->dailyForecasts->forecastLocation->forecast as $f)
        <tr>
          <th scope="row">
            <img width=24 src="{{ $f->iconLink }}">
          </th>
          <td>{{ $f->description }}</td>
          <td></td>
          <td> {{ $f->temperatureDesc }}</td>
        </tr>

      @endforeach
      </tbody>
    </table>

</div>