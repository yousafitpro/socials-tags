import React, {Component} from 'react';
import { Route, Switch } from 'react-router';
import { Link, NavLink } from 'react-router-dom';
import Alerts from './Comps/Alerts';
import LigiscanSearch from './Comps/LigiscanSearch';
import Monitered from './Comps/Monitered';
import Regions from './Comps/Regions';
import './ligiscan.css';

// import { Container } from './styles';

class Legiscan extends Component {
    
    render () {
        const homeClass = location.pathname === "/" ? "active" : "";
const aboutClass = location.pathname.match(/^\/about/) ? "active" : "";
const contactClass = location.pathname.match(/^\/contact/) ? "active" : "";
        return (
            <>
         <div className="container-fluid">
             <div className="row">
                 <div className="col-md-2"><NavLink to="/legiscan/search"><button className="form-control btn btn-defualt">Search</button></NavLink></div>
                 <div className="col-md-2"><NavLink to="/legiscan/monitered"  activeClassName='is-active'><button className="form-control btn btn-defualt">Monitered Bills</button></NavLink></div>
                 <div className="col-md-2"><NavLink to="/legiscan/regions"><button className="form-control btn btn-defualt">Regions</button></NavLink></div>
                 <div className="col-md-2"><NavLink to="/legiscan/alerts"><button className="form-control btn btn-defualt">Alerts</button></NavLink></div>
                 <div className="col-md-2"><button className="form-control btn btn-defualt">Topics</button></div>
                 <div className="col-md-2"><button className="form-control btn btn-defualt">option-2</button></div>

             </div>
             <div className="row">
                 <div className="col-md-12">
                     <hr/>
                 </div>
             </div>
             <div className="row">
                 <div className="col-md-12">
                 <Switch>
                 <Route exact  path="/legiscan" component={LigiscanSearch}/>
                <Route   path="/legiscan/search" component={LigiscanSearch}/>
                <Route   path="/legiscan/regions" component={Regions}/>
                <Route   path="/legiscan/monitered" component={Monitered}/>
                <Route   path="/legiscan/alerts" component={Alerts}/>
                </Switch>
                 </div>
             </div>
         </div>
            </>
        )
    };
}

export default Legiscan;