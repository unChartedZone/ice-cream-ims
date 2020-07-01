import React from 'react'
import { BrowserRouter, Switch, Route } from 'react-router-dom'
import Navbar from './components/Navbar'

// views
import Home from './views/Home'
import About from './views/About'
import Login from './views/Login'

const Router = () => {
  return (
    <BrowserRouter>
      <Navbar />
      <Switch>
        <Route exact path="/" component={Home} />
        <Route exact path="/about" component={About} />
        <Route exact path="/login" component={Login} />
      </Switch>
    </BrowserRouter>
  )
}

export default Router
