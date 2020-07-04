import React from 'react'

const DashboardNavbar = () => {
  return (
    <nav
      id="navbar-container"
      class="navbar navbar-expand-lg fixed-top navbar-dark bg-light"
    >
      <a class="navbar-brand" href="dashboard.php">
        <span role="img" aria-label="Ice Cream Emoji">
          &#x1F366;
        </span>
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="customers.php">
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inventory.php">
              Inventory
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../models/products.php">
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../models/purchase.php">
              Purchase
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sales.php">
              Sales
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              Users
            </a>
          </li>
        </ul>
        <ul class=" my-2 my-lg-0">
          <button id="printButton" class="btn minty-button mr-sm-2">
            Print Table
          </button>
          <button id="signout" class="btn minty-button my-2 my-sm-0">
            Sign Out
          </button>
        </ul>
      </div>
    </nav>
  )
}

export default DashboardNavbar
