import React from 'react'

import DashboardNavbar from '../components/DashboardNavbar'

class Dashboard extends React.Component {
  render() {
    return (
      <div id="dashboard-homepage" class="container-fluid">
        <DashboardNavbar />
        <div id="dashboard-home-container" class="container-fluid">
          <h1 id="dashboard-welcome" class="minty-text">
            Welcome Back
          </h1>
        </div>
      </div>
    )
  }
}

export default Dashboard
