import React from 'react'
import { getUserId, getUserName } from '../reducks/users/selectors'
import { useSelector } from 'react-redux'
import UsersState from '../reducks/users/types'

const Home = () => {
  const selector = useSelector((state: UsersState) => state)
  const uid = getUserId(selector)
  const username = getUserName(selector)

  return (
    <div className="content">
      <div className="title m-b-md">Blog Sample</div>
      <p>ユーザーID：{uid}</p>
      <p>ユーザーID：{username}</p>
      <p>(Laravel + React + TypeScript)</p>
    </div>
  )
}

export default Home
