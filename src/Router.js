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
      <Navbar />
      <Switch>
        <Route exact path="/" component={Home} />
        <Route exact path="/about" component={About} />
        <Route exact path="/login" component={Login} />
        <Route exact path="/dashboard" component={Dashboard} /> 
      </Switch>
    </BrowserRouter>
  )
}

export default Router
