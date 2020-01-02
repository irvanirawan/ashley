import React from 'react';
import ReactDOM from 'react-dom';

// import './css/SelectPerawatan.scss';

class Customer extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            data:''
        };
    }
    componentDidMount(){
        const keyword = this.props.customerKeyword;
        window.axios.get('/booking-customer-data?keyword='+keyword).then(({ data }) => {
            this.setState({data})
          });
    }
    componentWillReceiveProps(nextProps) {
        const keyword = this.props.customerKeyword;
        window.axios.get('/booking-customer-data?search='+keyword).then(({ data }) => {
            this.setState({data})
          });
        // this.setState({ details: nextProps });
        // this.forceUpdate();
        // console.log(nextProps.customerKeyword);
      }
    render() {
        const {data} = this.state;
        const rows = [];
        const user = Array.from(data);
        user.map((item,index)=>{
            rows.push(
                <CustomerList key={index} datanya={item} fSetCustomer={this.props.fSetCustomer}/>
                        );
        })

        return(
            <div className="instant-results wrapperPilihPerawatan" style={{display:"block",height:"auto"}}>
            <ul className="list-unstyled result-bucket" id="results_suggest_kategori">
                    {rows}
            </ul>
        </div>
        )
    }
}

class CustomerList extends React.Component{
    constructor(props){
        super(props)
        this.setCustomer = this.setCustomer.bind(this);
    }
    setCustomer(){
        this.props.fSetCustomer(this.props.datanya);
    }
    render() {
        return(
            <li className="perawatanlis">
                <a onClick={this.setCustomer} > {this.props.datanya.name} {this.props.datanya.telp} </a>
            </li>
        )
    }
}

export default Customer;
