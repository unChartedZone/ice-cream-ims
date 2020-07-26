import React from 'react'
import { Link } from 'react-router-dom'

const Navbar = () => {
  let routes = [
    {
      name: 'Home',
      path: '/',
    },
    {
      name: 'About',
      path: '/about',
    },
    {
      name: 'Pricing',
      path: '/',
    },
  ]

  return (
    <nav
      id="navbar-container"
      className="navbar navbar-expand-lg fixed-top navbar-dark bg-light"
    >
      <Link className="navbar-brand" to="/">
        Tom and Adam's Ice Cream
      </Link>
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
          {routes.map((route) => {
            return (
              <li className="nav-item">
                <Link className="nav-link" to={route.path}>
                  {route.name}
                </Link>
              </li>
            )
          })}
          {/* <li className="nav-item">
            <Link className="nav-link" to="/">
              Home
            </Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/about">
              About Us
            </Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/">
              Pricing
            </Link>
          </li> */}
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
