export default interface UserState {
  isSignedIn: boolean
  uid: string
  username: string
}

export default interface UsersState {
  users: {
    isSignedIn: boolean
    uid: string
    username: string
  }
}

export default interface ActionProps {
  type: string
  payload: {
    isSignedIn: boolean
    uid: string
    username: string
  }
}
