import React from 'react';
import ReactDOM from 'react-dom';

// import './css/SelectPerawatan.scss';

class Perawatan extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            data:''
        };
    }
    componentDidMount(){
        window.axios.get('/api/perawatan').then(({ data }) => {
            this.setState({data})
          });
    }
    render() {
        const {data} = this.state;
        const rows = [];
        const perawatan = Array.from(data);
        perawatan.map((item,index)=>{
            rows.push(
                    <li className="perawatanli" key={item.id}><strong>{item.nama}</strong></li>
                    );

            const perawatan2 = Array.from(item.perawatan);
            perawatan2.map((element,i)=>{
                rows.push(
                    <PerawatanList key={element.id + 10} datanya={element} fSetPerawatan={this.props.fSetPerawatan}/>
                            );
            })

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

class PerawatanList extends React.Component{
    constructor(props){
        super(props)
        this.setPerawatan = this.setPerawatan.bind(this);
    }
    setPerawatan(){
        this.props.fSetPerawatan(this.props.datanya);
    }
    render() {
        return(
            <li className="perawatanlis">
                <a onClick={this.setPerawatan} > - {this.props.datanya.nama} ({this.props.datanya.harga}k) </a>
            </li>
        )
    }
}

export default Perawatan;
