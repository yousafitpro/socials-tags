import axios from 'axios';
import React, {Component} from 'react';
import { WEb_URL } from '../../../Env';

// import { Container } from './styles';

class BillDetail extends Component {
    constructor(props) {
        super(props);
        this.state = {
          sessions: [],
        };

      }
    componentDidMount()
    {
axios.get(WEb_URL+'ligiscan/getSessions').then(function(res)
{
    console.log("getSessions",res)
})
    }
    render () {;
        return (
            <>
                 <div className="container-fluid"  >

          
      
            </div>
          
            </>
        );
    };
}

export default BillDetail;