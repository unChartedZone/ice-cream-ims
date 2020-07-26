import React from 'react'

import DashboardNavbar from '../components/DashboardNavbar'

class Dashboard extends React.Component {
  render() {
    return (
      <div id="dashboard-homepage" className="container-fluid">
        {/* <DashboardNavbar /> */}
        <div id="dashboard-home-container" className="container-fluid">
          <h1 id="dashboard-welcome" className="minty-text">
            Welcome Back
          </h1>
        </div>
      </div>
    )
  }
}

export default Dashboard
