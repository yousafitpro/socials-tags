import axios from 'axios';
import React, {Component} from 'react';
import { Ligiscan_URL, WEb_URL } from '../../../Env';

// import { Container } from './styles';

class LigiscanSearch extends Component {
    constructor(props) {
        super(props);
        this.state = {
          billNum:'',
          searchText:'',
          SState:'',
          session:'',

          list:[1,]
          };

      }
   search=()=>{
      axios.get(Ligiscan_URL+'&op=search&state=MD&query=fund').then(res=>{
          var temp=[]
        for (var key in res.data.searchresult) {
           temp.push(res.data.searchresult[key])
        }
    
          this.setState({
              list: temp
          })
          console.log(this.state)
      })
      }
      handleInput=(e)=>{
        const { name, value } = e.target;
        this.setState({
            [name]:value
        });
        console.log(this.state)
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
          
            </>
        );
    };
}

export default LigiscanSearch;