<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wild One - POS</title>
  <link rel="Icon" type="image/png" href="images/pawprint.png" />
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet" />

  <!-- Animate css -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <link
    href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap"
    rel="stylesheet" />
  <style>
    body {
      font-family: "Fredoka", sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff8f0;
      color: #333;
    }

    .container-header {
      background-color: #2e2d2a;
      padding: 20px;
      text-align: center;
      color: white;
      font-size: 2em;
      font-weight: bold;
      letter-spacing: 2px;
    }

    .nav {
      display: flex;
      justify-content: center;
      gap: 15px;
      background-color: #ebeae8;
      padding: 15px 0;
    }

    .nav button {
      background-color: #fff;
      border: 2px solid #2e2d2a;
      border-radius: 25px;
      padding: 10px 20px;
      font-size: 1em;
      cursor: pointer;
      transition: 0.3s;
    }

    .nav button:hover {
      background-color: #2e2d2a;
      color: white;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      padding: 20px;
    }

    .products {
      flex: 2;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 10px;
    }

    .product {
      border: 2px solid #2e2d2a;
      border-radius: 15px;
      padding: 15px;
      text-align: center;
      background-color: #fff;
    }

    .product h3 {
      margin: 10px 0 5px;
    }

    .product p {
      margin: 0;
      font-weight: bold;
    }

    .receipt {
      flex: 1;
      background-color: #fffdf5;
      border: 2px dashed #2e2d2a;
      border-radius: 15px;
      padding: 20px;
    }

    .receipt h2 {
      text-align: center;
    }

    .receipt ul {
      list-style: none;
      padding-left: 0;
    }

    .receipt ul li {
      border-bottom: 1px solid #eee;
      padding: 8px 0;
    }

    .product-card {
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 8px;
      width: 200px;
      margin: 10px;
      padding: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .product-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
    }

    .product-name {
      font-size: 1.1em;
      font-weight: bold;
      margin-top: 10px;
      color: #333;
    }

    .product-price {
      font-size: 1em;
      color: #888;
      margin-top: 5px;
    }

    @media (max-width: 768px) {
      .nav button {
        font-size: 0.9em;
        padding: 8px 15px;
      }

      .container {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>

<body>
  <div class="container-header">Wild One</div>

  <div class="container-fluid p-0">
    <div class="nav" id="categories"></div>
  </div>

  <div class="container">
    <div class="products" id="product-container"></div>

    <div class="receipt" id="receipt">
      <h2>Receipt</h2>
      <p style="text-align: center; margin-top: 15px">
        <strong>Total: ₱<span id="totalValue"> 0.00</span></strong>
      </p>
    </div>
  </div>

  <script>
    var categories = [];
    var products = [];

    const getAllCategories = async () => {
      fetch(
          'http://localhost/KARMken.github.io/ADET/A06/categories.php'
        )
        .then(response => response.json())
        .then(data => {
          categories = data;
          loadCategories();
        });
    }

    const getAllProducts = async (categoryID) => {
      const categoryData = {
        categoryID: categoryID
      };

      fetch(
          'http://localhost/KARMken.github.io/ADET/A06/products.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(categoryData)
          })
        .then(response => response.json())
        .then(data => {
          products = data;
          loadProducts();
        });
    }

    getAllCategories();

    function loadCategories() {
      var categoriesContainer = document.getElementById("categories");

      categories.forEach((category) => {
        categoriesContainer.innerHTML += `
      <button onclick="getAllProducts('` + category.categoryID + `')">${category.name}</button>
    `;
      });
    }

    function loadProducts(categoryID) {
      var maincontainer = document.getElementById("product-container");
      maincontainer.innerHTML = "";

      products.forEach((product) => {
        maincontainer.innerHTML += `
      <div class="product-card" role="button" onclick="addToReceipt(${product.price}, '${product.code}', '${product.name}')">
        <img src="images/${product.image}" alt="${product.name}" />
        <div class="product-name">${product.name}</div>
        <div class="product-price">₱${product.price}</div>
      </div>
    `;
      });
    }
    var total = 0;

    function addToReceipt(price, code, name) {
      var receiptContainer = document.getElementById("receipt");
      total += parseFloat(price);
      var totalValueElement = document.getElementById("totalValue");
      totalValueElement.innerHTML = total.toFixed(2);

      receiptContainer.innerHTML += `
          <div class="d-flex flex-row justify-content-between">
            <small class="fw-semibold">${name}</small>
            <small class="badge bg-light text-dark rounded-pill px-3">${code}</small>
            <div><small>₱${price}</small></div>
          </div>
        `;
    }
  </script>
  <script>
    src =
      "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js";
    integrity =
      "sha384-KyZXEJx3t7ml2SQM6n7vPUC2yFu3gD2d3yL+3p3vNY6VFX5mrO+z4D/a6dveA7eX";
    crossorigin = "anonymous";
  </script>
</body>

</html>