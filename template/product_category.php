<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <title>
    Dashboard
  </title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="../assets/js/fontawesomkit.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/main.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
        <span class="ms-1 text-sm text-dark">Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark" href="panel.php">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Panel</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="user_info.php">
            <i class="material-symbols-rounded opacity-5">table_view</i>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#" onclick="toggleSubmenu(event)">
            <i class="material-symbols-rounded opacity-5">receipt_long</i>
            <span class="nav-link-text ms-1">Products</span>
            <i class="material-symbols-rounded ms-auto">expand_more</i>
          </a>
          <ul class="submenu nav flex-column ms-4" style="display: none; list-style: none; padding-left: 0;">
            <li class="nav-item">
              <a class="nav-link text-dark" href="all_products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="products.php">Your Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active bg-gradient-dark text-light" href="product_category.php">Product Category</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="order.php">
            <i class="material-symbols-rounded opacity-5">view_in_ar</i>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    require_once '../loader.php';
    session_start();
    $user = $_SESSION['user_id'];
    ?>
    <!DOCTYPE html>
    <html lang="fa">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <title>Product category</title>

      <style>
        body {
          font-family: Arial, sans-serif;
        }

        .tabs {
          overflow: hidden;

        }

        .logout-btn {
          position: absolute;
          left: 20px;

          transform: translateY(-50%);
          background-color: #343a40;
          border: none;
          cursor: pointer;
          font-size: 24px;
          padding: 0;
          border-radius: 8px;
          transition: background-color 0.3s ease;
          display: inline-block;
        }

        .logout-btn a {
          display: inline-block;
          color: #fff;
          padding: 6px 14px;
          border-radius: 8px;
          text-decoration: none;
        }

        .logout-btn:hover {
          background-color: #495057;
        }

        .logout-btn:hover a {
          text-decoration: none;
        }

        .tabs {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 20px;
        }

        .tablink {
          background-color: #ccc;
          border: none;
          outline: none;
          padding: 10px 15px;
          cursor: pointer;
          transition: 0.3s;
          width: 15%;
          text-align: center;
          border-radius: 8px;
          margin: 0 5px;
        }



        .product-list {
          padding: 20px;
          display: flex;
          flex-direction: column;
          gap: 25px;
          max-width: 900px;
          margin: 0 auto;
        }

        .product-card {
          background-color: white;
          border-radius: 8px;
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
          display: flex;
          align-items: center;
          padding: 20px;
          gap: 20px;
          min-height: 160px;
        }

        .product-card img {
          width: 140px;
          height: 140px;
          object-fit: cover;
          border-radius: 50%;
          flex-shrink: 0;
        }

        .product-info {
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          height: 140px;
          flex: 1;
          position: relative;
        }

        .product-info h3 {
          margin: 0;
          font-size: 22px;
          color: #333;
        }

        .product-info .category {
          font-size: 14px;
          color: #888;
          margin-top: 6px;
        }

        .product-info .price {
          font-size: 18px;
          color: #007bff;
          font-weight: bold;
          margin-top: 10px;
        }

        .product-info p {
          font-size: 14px;
          color: #555;
          margin-top: 10px;
          line-height: 1.3;
        }

        .tablink:hover {
          background-color: #ddd;
        }

        .tablink.active {
          background-color: #343a40;
          color: white;
        }

        .tabcontent {
          display: none;
          padding: 20px;
          border-top: none;
        }

        #Clothing,
        #Shoes,
        #Accessories,
        #Digital {

          height: 200px;
        }

        .order_product {
          position: absolute;
          right: 10px;
          background-color: #6c757d;
          color: white;
          border-radius: 10px;
        }

        header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 15px 30px;
          color: white;
          z-index: 1000000;
          position: relative;
          border-bottom: 1px solid #dee2e6;
        }

        .title {
          font-size: 28px;
          font-weight: 700;
          margin-right: auto;
          color: black;
        }
      </style>
    </head>

    <body>
      <header>
        <div class="title">Product Category </div>
      </header>
      <div class="tabs">
        <button class="tablink active" data-tab="Clothing">Clothing</button>
        <button class="tablink" data-tab="Shoes">Shoes</button>
        <button class="tablink" data-tab="Accessories">Accessories</button>
        <button class="tablink" data-tab="Digital">Digital</button>
      </div>
      <div id="Clothing" class="tabcontent">
        <?php
        $sql = "SELECT * FROM `products` WHERE `product_category`='clothing'";
        $output = db_select($sql);
        foreach ($output as $item) {
        ?>
          <div class="product-list">
            <div class="product-card">
              <img src="../uploads/<?php echo $item['photo_name']; ?>" alt="Product Image" />
              <div class="product-info">
                <h3><?php echo $item['product_title']; ?> </h3>
                <div class="category">Category : <?php echo $item['product_category']; ?> </div>
                <div class="price"><?php echo $item['product_price'] . '$' ?> </div>
                <p><?php echo $item['product_caption']; ?> </p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <div id="Shoes" class="tabcontent">
        <?php
        $sql = "SELECT * FROM `products` WHERE `product_category`='shoes'";
        $output = db_select($sql);
        foreach ($output as $item) {
        ?>
          <div class="product-list">
            <div class="product-card">
              <img src="../uploads/<?php echo $item['photo_name']; ?>" alt="Product Image" />
              <div class="product-info">
                <h3><?php echo $item['product_title']; ?> </h3>
                <div class="category">Category : <?php echo $item['product_category']; ?> </div>
                <div class="price"><?php echo $item['product_price'] . '$' ?> </div>
                <p><?php echo $item['product_caption']; ?> </p>
              
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <div id="Accessories" class="tabcontent">
        <?php
        $sql = "SELECT * FROM `products` WHERE `product_category`='accessories'";
        $output = db_select($sql);
        foreach ($output as $item) {
        ?>
          <div class="product-list">
            <div class="product-card">
              <img src="../uploads/<?php echo $item['photo_name']; ?>" alt="Product Image" />
              <div class="product-info">
                <h3><?php echo $item['product_title']; ?> </h3>
                <div class="category">Category : <?php echo $item['product_category']; ?> </div>
                <div class="price"><?php echo $item['product_price'] . '$' ?> </div>
                <p><?php echo $item['product_caption']; ?> </p>
                
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <div id="Digital" class="tabcontent">
        <?php
        $sql = "SELECT * FROM `products` WHERE `product_category`='digital'";
        $output = db_select($sql);
        foreach ($output as $item) {
        ?>
          <div class="product-list">
            <div class="product-card">
              <img src="../uploads/<?php echo $item['photo_name']; ?>" alt="Product Image" />
              <div class="product-info">
                <h3><?php echo $item['product_title']; ?> </h3>
                <div class="category">Category : <?php echo $item['product_category']; ?> </div>
                <div class="price"><?php echo $item['product_price'] . '$' ?> </div>
                <p><?php echo $item['product_caption']; ?> </p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

      <script>
        $(document).ready(function() {
          $("#" + $(".tablink.active").data("tab")).show();
          $(".tablink").click(function() {
            var tabName = $(this).data("tab");
            $(".tabcontent").hide();
            $("#" + tabName).show();
            $(".tablink").removeClass("active");
            $(this).addClass("active");
          });
        });
      </script>

    </body>

    </html>
  </main>
  <div class="fixed-plugin">

    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-symbols-rounded">clear</i>
          </button>
        </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark active" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2  active ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>

      </div>
    </div>
  </div>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    function toggleSubmenu(event) {
      event.preventDefault();
      const navItem = event.currentTarget.parentElement;
      const submenu = navItem.querySelector('.submenu');
      if (submenu.style.display === 'block') {
        submenu.style.display = 'none';
      } else {
        submenu.style.display = 'block';
      }
    }
  </script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Views",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#43A047",
          data: [50, 45, 22, 28, 50, 60, 76],
          barThickness: 'flex'
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: '#e5e5e5'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
              color: "#737373"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
        datasets: [{
          label: "Sales",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          pointBorderColor: "transparent",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            callbacks: {
              title: function(context) {
                const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                return fullMonths[context[0].dataIndex];
              }
            }
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Tasks",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          pointBorderColor: "transparent",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#737373',
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [4, 4]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
</body>

</html>