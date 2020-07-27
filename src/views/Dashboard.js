import React from 'react'
import { Switch, Route, useRouteMatch } from 'react-router-dom'

import Customers from './dashboard/Customers'

const Dashboard = () => {
  let { path, url } = useRouteMatch()
  console.log('Path: ', path)
  console.log('Url: ', url)

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
      <Route exact path={`${path}/fuck`}>
        {/* <Customers /> */}
        <div>
          <h1>CAN YOU FUCKING SEE THIS</h1>
        </div>
      </Route>
    </Switch>
  )
}

export default Dashboard
