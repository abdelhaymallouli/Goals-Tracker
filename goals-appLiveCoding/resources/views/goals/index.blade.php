<!DOCTYPE html>
<html>
<head>
    <title> Goals</title>
</head>
<body>
    <h1>Yearly Goals</h1>

    <form method="POST" action="{{route('goals.store')}}">
    @csrf

    <input type="text" name="description" placeholder="Goal description" required>
    <input type="date" name="deadline" required>

    <button type="submit">ADD</button>
</form>

<br><br>

<table border=1 cellpadding=10>

    <tr>
    <th>id</th>
    <th>description</th>
    <th>deadline</th>
    <th>Action</th>
    </tr>

     @foreach($goals as $goal)
     <tr>
      <td>{{ $goal->id }}</td>
    <td>{{ $goal->description }}</td>
    <td>{{ $goal->deadline }}</td>
     <td>
     <form method="POST" action={{route('goals.destroy', $goal)}}>
     @csrf
     @method('DELETE')
     <button type="submit">delete</button>
     </form>
     </td>
     </tr>
    @endforeach
</table>
</body>

</html>