import React from 'react'
import { getUserId } from '../reducks/users/selectors'
import { useSelector } from 'react-redux'
import UsersState from '../reducks/users/types'

const Home = () => {
  const selector = useSelector((state: UsersState) => state)
  const uid = getUserId(selector)

  return (
    <div className="content">
      <div className="title m-b-md">Blog Sample</div>
      <p>{uid}</p>
      <p>(Laravel + React + TypeScript)</p>
    </div>
  )
}

export default Home
