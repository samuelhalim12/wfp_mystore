<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>List Medicines</h2>
  <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Generic Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Description</th>
        <th>TK1</th>
        <th>TK2</th>
        <th>TK3</th>
        <th>Category ID</th>
        <th>Category Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$message->generic_name}}</td>
        <td>{{$message->form}}</td>
        <td>{{$message->restriction_formula}}</td>
        <td>{{$message->description}}</td>
        <td>{{$message->faskes1}}</td>
        <td>{{$message->faskes2}}</td>
        <td>{{$message->faskes3}}</td>
        <td>{{$message->category_id}}</td>
        <td>{{ $message->category->name}}
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>

<!doctype html>
<title>Example</title>
<style>
  .grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    grid-gap: 20px;
    align-items: stretch;
  }

  .grid img {
    border: 1px solid #ccc;
    box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
    max-width: 100%;
  }
</style>
<main class="grid">

</main>