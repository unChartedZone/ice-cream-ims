import React from 'react'
import { Switch, Route, useRouteMatch } from 'react-router-dom'

import Customers from './dashboard/Customers'
import Inventory from './dashboard/Inventory'

const Dashboard = () => {
  let { path } = useRouteMatch()

  return (
    <Switch>
      <Route exact path={path}>
        <div id="dashboard-homepage" className="container-fluid">
          <div id="dashboard-home-container" className="container-fluid">
            <h1 id="dashboard-welcome" className="minty-text">
              Welcome Back
            </h1>
          </div>
        </div>
      </Route>
      <Route path={`${path}/customers`} component={Customers} />
      <Route path={`${path}/inventory`} component={Inventory} />
    </Switch>
  )
}

export default Dashboard
