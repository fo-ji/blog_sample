export default interface UsrState {
  isSignedIn: boolean,
  uid: string,
  username: string, 
}

export default interface ActionProps {
  type: string
  payload: {
    isSignedIn: boolean,
    uid: string,
    username: string,
  }
}
