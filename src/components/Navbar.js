import React from 'react'
import { Link, useLocation, matchPath } from 'react-router-dom'

const routes = [
  { name: 'Home', path: '/' },
  { name: 'About', path: '/about' },
  { name: 'Pricing', path: '/' },
]

const dashboardRoutes = [
  { name: 'Customers', path: '/dashboard/customers' },
  { name: 'Inventory', path: '/dashboard/inventory' },
  { name: 'Products', path: '/dashboard/products' },
  { name: 'Purchase', path: '/dashboard/purchase' },
  { name: 'Sales', path: '/dashboard/sales' },
  { name: 'Users', path: '/dashboard/users' },
]

const Navbar = () => {
  const match = matchPath(useLocation().pathname, { path: '/dashboard/' })
  const isDashboardRoute = match && match.path === '/dashboard/'

  return isDashboardRoute ? dashNavbar() : defaultNavbar()
}

const toggleButton = () => {
  return (
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
  )
}

const defaultNavbar = () => {
  return (
    <nav
      id="navbar-container"
      className="navbar navbar-expand-lg fixed-top navbar-dark bg-light"
    >
      <Link className="navbar-brand" to="/">
        Tom and Adam's Ice Cream
      </Link>
      {toggleButton()}
      <div className="collapse navbar-collapse" id="navbarSupportedContent">
        <ul className="navbar-nav mr-auto">
          {routes.map((route) => {
            return (
              <li className="nav-item" key={route.name}>
                <Link className="nav-link" to={route.path}>
                  {route.name}
                </Link>
              </li>
            )
          })}
        </ul>
        <Link className="btn btn-outline-light my-2 my-sm-0" to="/login">
          Log In
        </Link>
      </div>
    </nav>
  )
}

const dashNavbar = () => {
  return (
    <nav
      id="navbar-container"
      className="navbar navbar-expand-lg fixed-top navbar-dark bg-light"
    >
      <Link className="navbar-brand" to="/dashboard">
        <span role="img" aria-label="Ice Cream Emoji">
          &#x1F366;
        </span>
      </Link>
      {toggleButton()}
      <div className="collapse navbar-collapse" id="navbarSupportedContent">
        <ul className="navbar-nav mr-auto">
          {dashboardRoutes.map((route) => {
            return (
              <li className="nav-item" key={route.name}>
                <Link className="nav-link" to={route.path}>
                  {route.name}
                </Link>
              </li>
            )
          })}
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

export default Navbar
