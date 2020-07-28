import React from 'react'
import { Switch, Route, useRouteMatch } from 'react-router-dom'

import Customers from './dashboard/Customers'
import Inventory from './dashboard/Inventory'
import Products from './dashboard/Products'
import Purchase from './dashboard/Purchase'
import Sales from './dashboard/Sales'
import Users from './dashboard/Users'

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
      <Route path={`${path}/products`} component={Products} />
      <Route path={`${path}/purchase`} component={Purchase} />
      <Route path={`${path}/sales`} component={Sales} />
      <Route path={`${path}/users`} component={Users} />
    </Switch>
  )
}

export default Dashboard
