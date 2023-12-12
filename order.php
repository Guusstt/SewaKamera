<!DOCTYPE html>
<html>
  <head>
    <title>Order Confirmation</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f7f7f7;
      }

      h1 {
        text-align: center;
      }

      #order-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      #order-container h2 {
        margin-top: 0;
      }

      #order-container p {
        margin: 10px 0;
      }

      #order-container input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }

      #order-list {
        list-style-type: none;
        padding: 0;
      }

      #order-list li {
        margin-bottom: 5px;
      }

      button {
        display: block;
        margin-top: 10px;
        padding: 8px 12px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      button:hover {
        background-color: #45a049;
      }
    </style>
    <script>
      // Fungsi untuk mengambil data keranjang dari session storage
      function getCart() {
        var cart = sessionStorage.getItem("cart");
        return cart ? JSON.parse(cart) : [];
      }

      // Fungsi untuk mengambil data nama dari session storage
      function getName() {
        return sessionStorage.getItem("name") || "";
      }

      // Fungsi untuk mengambil data nomor telepon dari session storage
      function getPhone() {
        return sessionStorage.getItem("phone") || "";
      }

      // Fungsi untuk mengambil data email dari session storage
      function getEmail() {
        return sessionStorage.getItem("email") || "";
      }

      // Fungsi untuk menghapus data keranjang dari session storage
      function clearCart() {
        sessionStorage.removeItem("cart");
      }

      // Fungsi untuk menampilkan data pemesanan
      function displayOrder() {
        var name = getName();
        var phone = getPhone();
        var email = getEmail();
        var cart = getCart();

        var orderContainer = document.getElementById("order-container");
        var orderList = document.getElementById("order-list");
        var nameField = document.getElementById("name");
        var phoneField = document.getElementById("phone");
        var emailField = document.getElementById("email");

        // Menampilkan data pemesanan
        nameField.value = name;
        phoneField.value = phone;
        emailField.value = email;

        // Menampilkan barang yang dipesan
        for (var i = 0; i < cart.length; i++) {
          var product = cart[i];
          var listItem = document.createElement("li");
          listItem.textContent = product;
          orderList.appendChild(listItem);
        }

        // Membersihkan keranjang setelah tampilan ditampilkan
        clearCart();
      }

      // Fungsi untuk menyimpan data diri yang diinputkan pengguna
      function saveUserData() {
        var name = document.getElementById("name").value;
        var phone = document.getElementById("phone").value;
        var email = document.getElementById("email").value;

        sessionStorage.setItem("name", name);
        sessionStorage.setItem("phone", phone);
        sessionStorage.setItem("email", email);
      }
    </script>
  </head>

  <body onload="displayOrder()">
    <h1>Order Confirmation</h1>

    <div id="order-container">
      <h2>Data Pemesanan</h2>
      <form action="save_order.php" method="post" enctype="multipart/form-data">
        <p>Nama: <input type="text" id="name" name="name" /></p>
        <p>Nomor Telepon: <input type="text" id="phone" name="phone" /></p>
        <p>Email: <input type="text" id="email" name="email" /></p>
      </form>

      <h2>Barang yang Dipesan</h2>
      <ul id="order-list"></ul>

      <button onclick="saveUserData()">Simpan</button>
    </div>
  </body>
</html>
