import React from 'react'
import { BrowserRouter, Switch, Route } from 'react-router-dom'
// import { TransitionGroup, CSSTransition } from 'react-transition-group'

import Navbar from './components/Navbar'

// views
import Home from './views/Home'
import About from './views/About'
import Login from './views/Login'
import Dashboard from './views/Dashboard'

// const location = withRouter()
// console.log('LOCATION: ', location)

// const AnimatedSwitch = withRouter(({ location }) => (
//   <TransitionGroup>
//     <CSSTransition key={location.key} classNames="slide" timeout={1000}>
//       <Switch location={location}>
//         <Route path="/" component={Home} exact />
//         <Route path="/about" component={About} />
//         <Route path="/login" component={Login} />
//       </Switch>
//     </CSSTransition>
//   </TransitionGroup>
// ))

// const Router = () => {
//   return (
//     <BrowserRouter>
//       <Navbar />
//       <AnimatedSwitch />
//     </BrowserRouter>
//   )
// }

const Router = () => {
  return (
    <BrowserRouter>
      <Navbar />
      <Switch>
        <Route exact path="/" component={Home} />
        <Route path="/about" component={About} />
        <Route exact path="/login" component={Login} />
        <Route path="/dashboard" component={Dashboard} />
      </Switch>
    </BrowserRouter>
  )
}

export default Router
