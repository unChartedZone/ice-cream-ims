import React from 'react'
import { Link } from 'react-router-dom'

class Navbar extends React.Component {
  legacyNav = () => {
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
            <li className="nav-item">
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
            </li>
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

  currentNav = () => {
    return (
      <nav>
        <ul>
          <li>
            <Link to="/">Home</Link>
            <Link to="/about">About</Link>
          </li>
        </ul>
      </nav>
    )
  }

  render() {
    // return this.currentNav()
    return this.legacyNav()
  }
}

export default Navbar
