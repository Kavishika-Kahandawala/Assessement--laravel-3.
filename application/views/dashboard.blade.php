<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Dashboard | ABC </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- LINEARICONS -->
  <link rel="styleshet" href="{{ URL::to('fonts/linearicons/style.css') }}">
  <!-- <link rel="stylesheet" href="{{ URL::to('css/auth_style.css') }}"> -->
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
        <div class="d-flex">
          <button class="btn btn-outline-warning" onclick="window.location.href = 'logout';">Logout</button>
        </div>

      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col" style="padding: 10px 0px;">
        <h2>Welcome to the ABC Inventory Management System</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-10">
        <p id="resultMessage"></p>
      </div>
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

    showFetchingDataMessage();

    window.onload = function() {
      fetchAndPopulateData();
    };

    function showNoDataMessage() {
      tableBody.innerHTML = '<tr><td colspan="6" class="text-center">No data to show</td></tr>';
    }

    function showFetchingDataMessage() {
      tableBody.innerHTML = '<tr><td colspan="6" class="text-center">Fetching data...</td></tr>';
    }

    // Function to fetch and populate product data
    function fetchAndPopulateData() {
      fetch("api/get-product")
        .then((response) => response.json())
        .then((data) => {
          if (data.length === 0) {
            showNoDataMessage();
            return;
          }
          // Clear existing rows from the table
          tableBody.innerHTML = '';

          data.forEach((product) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                        <td>${product.attributes.id}</td>
                        <td>${product.attributes.pname}</td>
                        <td>${product.attributes.pcat}</td>
                        <td>${product.attributes.quantity}</td>
                        <td>${product.attributes.price}</td>
                        <td>
                            <button type="button" class="btn btn-outline-warning" onclick="window.location.href = 'edit-product/${product.attributes.id}';">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                            </button>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteData(${product.attributes.id})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                            </button>
                        </td>
                    `;
            tableBody.appendChild(row);
          });
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    }

    const showMessage = (message, color) => {
      resultMessage.textContent = message;
      resultMessage.style.color = color;
      setTimeout(() => {
        resultMessage.textContent = ''; // Clear the message after 4 seconds
      }, 4000);
    };

    // Function to delete a product
    async function deleteData(id) {
      try {
        const res = await fetch(`http://localhost/Assessement%20-laravel%203/public/api/delete-product/${id}`, {
          method: 'DELETE',
          headers: {
            'Content-Type': 'application/json'
          }
        });

        if (res.ok) {
          showMessage('Product deleted successfully', '#28d479');
          // Update the product table after deletion
          fetchAndPopulateData();
          // fetchAndPopulateData();
        } else {
          const errorData = await res.json();
          showMessage(`Error: ${errorData.error}`, '#f74f4f');
        }
      } catch (err) {
        console.error(err);
        showMessage('An error occurred while processing the request.', '#f74f4f');
      }
    }
  </script>


</body>

</html>