<div>
  <table>
      <tr>
          <th>ID</th>
          <th>Detalle</th>
          <th>Action</th>
      </tr>
    @foreach($valores as $fila)
      <tr>
        <td>{{$fila->id}}</td>
        <td>{{$fila->name}}</td>
      </tr>
    @endforeach
  </table>
</div>

