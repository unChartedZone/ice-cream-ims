import React from 'react'
import { Link, useLocation } from 'react-router-dom'

const Navbar = () => {
  const routes = [
    { name: 'Home', path: '/' },
    { name: 'About', path: '/about' },
    { name: 'Pricing', path: '/' },
  ]

  const dashboardRoutes = [
    { name: 'Customers', path: '/customers' },
    { name: 'Inventory', path: '/inventory' },
    { name: 'Products', path: '/products' },
    { name: 'Purchase', path: '/purchase' },
    { name: 'Sales', path: '/sales' },
    { name: 'Users', path: '/users' },
  ]

  const isDashboard = useLocation().pathname === '/dashboard/'

  console.log(useLocation().pathname)

  return (
    <nav
      id="navbar-container"
      className="navbar navbar-expand-lg fixed-top navbar-dark bg-light"
    >
      {!isDashboard ? (
        <Link className="navbar-brand" to="/">
          Tom and Adam's Ice Cream
        </Link>
      ) : (
        <a className="navbar-brand" href="dashboard.php">
          <span role="img" aria-label="Ice Cream Emoji">
            &#x1F366;
          </span>
        </a>
      )}
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
          {!isDashboard
            ? routes.map((route) => {
                return (
                  <li className="nav-item" key={route.name}>
                    <Link className="nav-link" to={route.path}>
                      {route.name}
                    </Link>
                  </li>
                )
              })
            : dashboardRoutes.map((route) => {
                return (
                  <li className="nav-item" key={route.name}>
                    <Link className="nav-link" to={route.path}>
                      {route.name}
                    </Link>
                  </li>
                )
              })}
        </ul>
        {/* <button
            id="loginButton"
            className="btn btn-outline-light my-2 my-sm-0"
          >
            Log In
          </button> */}
        <Link className="btn btn-outline-light my-2 my-sm-0" to="/login">
          Log In
        </Link>
      </div>
    </nav>
  )
}

export default Navbar
