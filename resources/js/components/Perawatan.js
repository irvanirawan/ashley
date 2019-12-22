import React from 'react';
import ReactDOM from 'react-dom';

import '../css/SelectPerawatan.scss';

class Perawatan extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            data:''
        };
        this.perawatanklik = this.perawatanklik.bind(this);
    }
    perawatanklik(event){
        // const s = event.target.getAttribute('data-tag');

        // localStorage.setItem('perawatanidvalue',event.target.dataset.tag.id);
        // localStorage.setItem('perawatannamavalue',event.target.dataset.tag.nama);
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
                    <PerawatanList key={element.id + 10} datanya={element} fungsi={this.props.fungsi}/>
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
        this.state = {
            data:''
        };
        this.ff = this.ff.bind(this);
    }
    ff(){

        this.props.fungsi(this.props.datanya);
    }
    render() {
        return(
            <li className="perawatanlis">
                <a onClick={this.ff} > - {this.props.datanya.nama} ({this.props.datanya.harga}k) </a>
            </li>
        )
    }
}

export default Perawatan;
