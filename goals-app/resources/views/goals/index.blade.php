<!DOCTYPE html>
<html>
<head>
    <title>Goals</title>
</head>
<body>

<h1>🎯 Yearly Goals</h1>

<!-- ADD FORM -->
<form method="POST" action="{{ route('goals.store') }}">
    @csrf

    <input type="text" name="description" placeholder="Goal description" required>
    <input type="date" name="deadline" required>

    <button type="submit">➕ ADD</button>
</form>

<br><br>

<!-- GOALS LIST -->
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Action</th>
    </tr>

    @foreach($goals as $goal)
    <tr>
        <td>{{ $goal->id }}</td>
        <td>{{ $goal->description }}</td>
        <td>{{ $goal->deadline }}</td>
        <td>
            <form method="POST" action="{{ route('goals.destroy', $goal) }}">
                @csrf
                @method('DELETE')
                <button type="submit">❌ Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
