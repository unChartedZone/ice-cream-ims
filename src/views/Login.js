import React from 'react'
import { Link } from 'react-router-dom'

class Login extends React.Component {
  render() {
    return (
      <div id="login-screen" className="jumbotron vertical-center">
        <div id="login-container" className="container">
          <h1 id="login-header" className="minty-text">
            Login
          </h1>
          <form action="" method="post">
            <div className="form-group">
              <label className="col-form-label loginText minty-text">
                UserName :
              </label>
              <input
                className="box form-control col-sm-4"
                type="text"
                name="username"
                placeholder="Username"
              />
              <br />
              <br />
            </div>
            <div className="form-group">
              <label className="col-form-label loginText minty-text">
                Password :
              </label>
              <input
                className="box form-control col-sm-4"
                type="password"
                name="password"
                placeholder="Password"
              />
              <br />
              <br />
            </div>
            {/* <input
              id="login-submit-button"
              className="btn"
              type="submit"
              value=" Submit "
            /> */}
            <Link id="login-submit-button" className="btn" to="/dashboard">
              Submit
            </Link>
            <br />
          </form>

          <div>
            <span id="login-error" className="loginText minty-text"></span>
          </div>
        </div>
      </div>
    )
  }
}

export default Login
