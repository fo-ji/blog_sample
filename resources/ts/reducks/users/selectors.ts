import { createSelector } from 'reselect'
import UserState from './types'

const usersSelector = (state: UserState) => state.users

export const getUserId = createSelector([usersSelector], (state) => state.uid)
export const getUserName = createSelector(
  [usersSelector],
  (state) => state.username
)
