import React from 'react'

const DashboardNavbar = () => {
  return (
    <nav
      id="navbar-container"
      className="navbar navbar-expand-lg fixed-top navbar-dark bg-light"
    >
      <a className="navbar-brand" href="dashboard.php">
        <span role="img" aria-label="Ice Cream Emoji">
          &#x1F366;
        </span>
      </a>
      <button
        className="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span className="navbar-toggler-icon"></span>
      </button>
      <div className="collapse navbar-collapse" id="navbarSupportedContent">
        <ul className="navbar-nav mr-auto">
          <li className="nav-item">
            <a className="nav-link" href="customers.php">
              Customers
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="inventory.php">
              Inventory
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="../models/products.php">
              Products
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="../models/purchase.php">
              Purchase
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="sales.php">
              Sales
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="users.php">
              Users
            </a>
          </li>
        </ul>
        <ul className=" my-2 my-lg-0">
          <button id="printButton" className="btn minty-button mr-sm-2">
            Print Table
          </button>
          <button id="signout" className="btn minty-button my-2 my-sm-0">
            Sign Out
          </button>
        </ul>
      </div>
    </nav>
  )
}

export default DashboardNavbar
