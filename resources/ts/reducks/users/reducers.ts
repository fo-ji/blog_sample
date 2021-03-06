import * as Actions from './actions'
import initialState from "../store/initialState";
import ActionProps from './types'

export const UsersReducer = (state = initialState.users, action: ActionProps) => {
  switch (action.type) {
    case Actions.SIGN_IN:
      return {
        ...state,
        ...action.payload
      }
    default:
      return state
  }
}