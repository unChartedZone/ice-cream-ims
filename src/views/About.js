import React from 'react'
import { useLocation } from 'react-router-dom'

const About = () => {
  const headerStyles = {
    fontSize: '8rem',
    color: 'white',
  }

  const location = useLocation()
  console.log('Location: ', location.pathname)

  return (
    <section>
      <h1 style={headerStyles}>About Us</h1>
    </section>
  )
}

export default About
