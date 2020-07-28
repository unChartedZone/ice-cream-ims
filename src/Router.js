import React from 'react'
import { BrowserRouter, Switch, Route } from 'react-router-dom'
import Navbar from './components/Navbar'

// views
import Home from './views/Home'
import About from './views/About'
import Login from './views/Login'
import Dashboard from './views/Dashboard'

const Router = () => {
  return (
    <BrowserRouter>
      <div>
        <Navbar />
        <Switch>
          <Route exact path="/" component={Home} />
          <Route path="/about" component={About} />
          <Route exact path="/login" component={Login} />
          <Route path="/dashboard" component={Dashboard} />
        </Switch>
      </div>
    </BrowserRouter>
  )
}

export default Router
