import React from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { signInAction } from './reducks/users/actions'

const Application = () => {
  const dispatch = useDispatch()
  const selector = useSelector(state => state)

  console.log(selector.users)

  return (
    <>
      {/* <Header /> */}
      <button onClick={() => dispatch(signInAction({uid: 11111, username: 'jo-ji'}))}>sigin in</button>
      <main>
        {/* <Router /> */}
      </main>
    </>
  )
}

export default Application
