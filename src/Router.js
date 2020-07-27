import React from 'react'
// import { BrowserRouter, Switch, Route } from 'react-router-dom'
import {
  BrowserRouter,
  Switch,
  Route,
  Link,
  useParams,
  useRouteMatch,
} from 'react-router-dom'
import Navbar from './components/Navbar'

// views
// import Home from './views/Home'
// import About from './views/About'
// import Login from './views/Login'
// import Dashboard from './views/Dashboard'

const Router = () => {
  return (
    <BrowserRouter>
      <div>
        <ul>
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/topics">Topics</Link>
          </li>
        </ul>

        <hr />

        <Switch>
          <Route exact path="/">
            <Home />
          </Route>
          <Route path="/topics">
            <Topics />
          </Route>
        </Switch>
      </div>
    </BrowserRouter>
    // <BrowserRouter>
    //   {/* <Navbar /> */}
    //   <Switch>
    //     <Route exact path="/" component={Home} />
    //     <Route exact path="/about" component={About} />
    //     <Route exact path="/login" component={Login} />
    //     {/* <Route exact path="/dashboard" component={Dashboard} /> */}
    //     <Route exact path="/dashboard">
    //       <div>
    //         <h1>Dashboard</h1>
    //         <Switch>
    //           <Route exact path="/dashboard/test">
    //             <div>
    //               <h1>Dashboard Test</h1>
    //             </div>
    //           </Route>
    //         </Switch>
    //       </div>
    //     </Route>
    //   </Switch>
    // </BrowserRouter>
  )
}

function Home() {
  return (
    <div>
      <h2>Home</h2>
    </div>
  )
}

function Topics() {
  // The `path` lets us build <Route> paths that are
  // relative to the parent route, while the `url` lets
  // us build relative links.
  let { path, url } = useRouteMatch()

  return (
    <div>
      <h2>Topics</h2>
      <ul>
        <li>
          <Link to={`${url}/rendering`}>Rendering with React</Link>
        </li>
        <li>
          <Link to={`${url}/components`}>Components</Link>
        </li>
        <li>
          <Link to={`${url}/props-v-state`}>Props v. State</Link>
        </li>
      </ul>

      <Switch>
        <Route exact path={path}>
          <h3>Please select a topic.</h3>
        </Route>
        <Route path={`${path}/:topicId`}>
          <Topic />
        </Route>
      </Switch>
    </div>
  )
}

function Topic() {
  // The <Route> that rendered this component has a
  // path of `/topics/:topicId`. The `:topicId` portion
  // of the URL indicates a placeholder that we can
  // get from `useParams()`.
  let { topicId } = useParams()

  return (
    <div>
      <h3>{topicId}</h3>
    </div>
  )
}

export default Router
