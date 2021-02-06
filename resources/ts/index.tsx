import React from 'react'
import ReactDOM from 'react-dom'
import { Provider } from 'react-redux'
import { ConnectedRouter } from 'connected-react-router'
import * as History from 'history'
import createStore from './reducks/store/store'
import Application from './Application'
import '../sass/app.scss'

const history = History.createBrowserHistory()
export const store = createStore(history)

ReactDOM.render(
  <Provider store={store}>
    <ConnectedRouter history={history}>
      <Application />
    </ConnectedRouter>
  </Provider>,
  document.getElementById('root')
)
