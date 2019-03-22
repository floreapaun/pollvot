@extends('layouts.app-login')

@section('content')
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>


    <table id="genpolls_tbl">
      <tr>
        <td>Varsta medie a votantilor partidului
        
        <select id='party' name='party'>
            @foreach($partyname_arr as $p)
                <option value='{{ $p->party_name }}'>{{ $p->party_name }}</option>
            @endforeach
        </select>  

        {{-- 
        <select id='party' name='party'>
            @php 
              $query = "SELECT nume_partid FROM partid";
              if($stmt = $mysqli->prepare($query)) {
                  $stmt->bind_result($partyname);
                  $stmt->execute();
                  while($stmt->fetch())
                      echo "<option value='{$partyname}'>$partyname</option>";
                  $stmt->close();
              }
            @endphp 
          </select>
         --}}

        </td>
        <td>
          <button id='BttnGenAvgAge' onclick="getValue(this.id)">Genereaza</button>
        </td>
      </tr>
      <tr>
        <td id='AvgAge'colspan='2'></td>
      </tr>
      <tr>
        <td>
          Numarul de voturi provenite din cel mai sarac judet din tara
        </td>
        <td>
          <button id='BttnGenVotesCntPoor' onclick="getValue(this.id)">Genereaza</button>
        </td>
      </tr>
      <tr>
        <td id='VotesCntPoor'colspan='2'></td>
      </tr>
      <tr>
        <td>
          Procentul votantilor cu studii superioare si al celora fara studii superioare 
        </td>
        <td>
          <button type='button' id='BttnGenStudiesPercent' onclick="getValue(this.id)">Genereaza</button>
        </td>
      </tr>
      <tr>
        <td id='StudiesPercent'colspan='2'></td>
      </tr>
      <tr>
        <td>
          Numarul de voturi provenite din regiunea           
          <select id='region'>
            <option value='Banat'>Banat</option>
            <option value='Crisana'>Crisana</option>
            <option value='Dobrogea'>Dobrogea</option>
            <option value='Maramures'>Maramures</option>
            <option value='Moldova'>Moldova</option>
            <option value='Muntenia'>Muntenia</option>
            <option value='Oltenia'>Oltenia</option>
            <option value='Transilvania'>Transilvania</option>
          </select> 
        </td>
        <td>
          <button type='button' id='BttnGenRegionVotes' onclick="getValue(this.id)">Genereaza</button>
        </td>
      </tr>
      <tr>
        <td id='RegionVotes' colspan='2'></td>
      </tr>
      <tr>
        <td>
          Partidul majoritar din regiunea 
          <select id='region_maj'>
            <option value='Banat'>Banat</option>
            <option value='Crisana'>Crisana</option>
            <option value='Dobrogea'>Dobrogea</option>
            <option value='Maramures'>Maramures</option>
            <option value='Moldova'>Moldova</option>
            <option value='Muntenia'>Muntenia</option>
            <option value='Oltenia'>Oltenia</option>
            <option value='Transilvania'>Transilvania</option>
          </select> 
        </td>
        <td>
          <button type='button' id='BttnGenRegWin' onclick="getValue(this.id)">Genereaza</button>
        </td>
      </tr>
      <tr>
        <td id='RegWin' colspan='2'></td>
      </tr>
    </table>  


</div>


@endsection