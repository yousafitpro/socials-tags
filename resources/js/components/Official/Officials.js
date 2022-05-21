import React, { Component } from 'react'
import { Helmet } from "react-helmet";
import { Route, Switch } from 'react-router';
import Index from './Comps';
import Dum from './Comps/Dum';
import './Officials.css';
export default class Officials extends Component {
    render() {
        return (
            <div>
      
            <div className="container-fluid"  >
            <div className="row" style={{height:'60px'}}>
                <div className="col-md-4" >
                <label className="brandTitle">
             Elected Officials & Districts
             </label>
                    </div>
                    <div className="col-md-8" >
                        <input className="form-control inputBar" placeholder="Enter a full address"/>
                        <div className="inputBottom card">

                        </div>
                    </div>
                    </div>
            <br/>
            <div className="row" >
                <div className="col-md-4" >
       
             <div className="leftTopBar">
              <div className="container-fluid">
                  <div className="row">
                      <div className="col-md-4"><a href="#" style={{color:'white'}}>Local</a></div>
                      <div className="col-md-4"><a href="#" style={{color:'white'}}>State</a></div>
                      <div className="col-md-4"><a href="#" style={{color:'white'}}>National</a></div>
                  </div>
              </div>
             </div>
             <div style={{backgroundColor:'white',height:"65vh",overflow:'auto'}}>
             <div className="container-fluid">
             {[...Array(10)].map((x, i) =>
                <div className="row leftRow" style={{paddingLeft:'5px',paddingTop:'20px'}}>
                <div className="4">
                    <img src="webimages/me.jpg" style={{height:'60px',width:'60px'}}/>
                </div>
                <div className="8" style={{paddingLeft:'10px'}}>
                    <div>
                    Secretary of Health 
                    </div>
                    <div style={{fontWeight:'bold',color:'var(--official-color)'}}>
                    Xavier Becerra
                    </div>
                    <small>United States</small>
                </div>
            </div>
      
  )}
             
                      </div>
                  
             </div>
                </div>
                <div className="col-md-8">
                <img src="webimages/map.png" style={{height:'100%',width:'100%'}}/>
                    </div>
            </div>
           
            </div>
          
            {/* <Switch>
              
                <Route exact={true} path="/officials/" component={Index}/>
                <Route exact={true} path="/officials/Dum" component={Dum}/>
            </Switch> */}
        </div>
      
      )
    }
}