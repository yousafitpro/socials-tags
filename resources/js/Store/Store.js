import {createStore,applyMiddleware} from 'redux';
import thunkMiddleware from 'redux-thunk';
import { composeWithDevTools } from 'redux-devtools-extension';
import RootReducer from './Reducers/RootReducer';


const middlewares=[thunkMiddleware]
const Store=createStore(RootReducer,composeWithDevTools(applyMiddleware(...middlewares)));

export default Store;