<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Dashboard | ABC </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- LINEARICONS -->
  <!-- <ink rel="styleshet" href="{{ URL::to('fonts/linearicons/style.css') }}">
      <link rel="stylesheet" href="{{ URL::to('css/auth_style.css') }}"> -->
  <!-- Bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <!-- Navbar content -->
  </nav>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ABC company</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Inventory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Manage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col" style="padding: 10px 0px;">
        <h2>Welcome to the ABC Shop Inventory management system</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-10"></div>
      <div class="col-2"><button type="button" class="btn btn-outline-success" onclick="window.location.href = 'add-product';">Add an item</button>&nbsp&nbsp
        <!-- <button type="button" class="btn btn-outline-warning" onclick="window.location.href = 'add-category';">Add a category</button> -->
      </div>
    </div>
    <div class="row" style="padding: 10px 0px;"></div>
    <div class="row">
      <table id="productTable" border="1" class="table">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    const productTable = document.getElementById("productTable");
    const tableBody = productTable.querySelector("tbody");

    // Fetch data from the API endpoint
    fetch("api/get-category")
      .then((response) => response.json())
      .then((data) => {
        data.forEach((product) => {
          const row = document.createElement("tr");
          row.innerHTML = `
                        <td>${product.attributes.id}</td>
                        <td>${product.attributes.pname}</td>
                        <td>${product.attributes.pcat}</td>
                        <td>${product.attributes.quantity}</td>
                        <td>${product.attributes.price}</td>
                        <td>${product.attributes.price}</td>
                    `;
          tableBody.appendChild(row);
        });
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  </script>
</body>

</html>