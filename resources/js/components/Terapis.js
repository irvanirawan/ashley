import React from 'react';
import ReactDOM from 'react-dom';

import '../css/SelectPerawatan.scss';

class Terapis extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            data:'',
            terapisPerawatanId:''
        };
        this.selectTerapis = this.selectTerapis.bind(this);
    }
    componentDidMount(){
        // awal load set semua state pertanggalan nya
        window.axios.get('/api/terapis').then(({ data }) => {
            this.setState({data})
          });
    }
    selectTerapis(terapisPerawatanId,terapisPerawatanNama){
        this.setState({terapisPerawatanId});
        this.props.fSetTerapis({id:terapisPerawatanId,nama:terapisPerawatanNama});
    }
    render() {
        const {data} = this.state;
        const rows = [];
        const slot = Array.from(data);
        slot.map((item,index)=>{
            if(item.id == this.state.terapisPerawatanId){
                rows.push(
                    <TerapisList key={index} datanya={item} fungsi={this.selectTerapis} terpilih={true}/>
                            );
            }else{
                rows.push(
                    <TerapisList key={index} datanya={item} fungsi={this.selectTerapis} terpilih={false}/>
                            );
            }
        })
        return(
            <React.Fragment>
            <div className="container">
                <div className="row">
                    {rows}
                </div>
            </div>
            </React.Fragment>
        )
    }
}

class TerapisList extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            data:''
        };
        this.handleTerapisClick = this.handleTerapisClick.bind(this);
    }
    handleTerapisClick(){
        this.props.fungsi(this.props.datanya.id,this.props.datanya.terapis.nama);
    }
    render() {
        const classClick = this.props.terpilih ? 'click' : '' ;
        return(
            <React.Fragment>
                <div className="col-12 col-sm-6 col-lg-3">
                        <div onClick={this.handleTerapisClick} className={'single-team-member mb-80 ' + classClick}>
                            <div className="team-member-img">
                                <img src="akame/img/bg-img/13.jpg" alt=""/>
                                <div className="team-social-info d-flex align-items-center justify-content-center">
                                    <div className="social-link">
                                        <div>Pilih</div>
                                    </div>
                                </div>
                            </div>
                            <div className="team-member-info">
                                <h5>{this.props.datanya.terapis != null ? this.props.datanya.terapis.nama : 'kosong' }</h5>
                                <p>{this.props.datanya.perawatan != null ? this.props.datanya.perawatan.nama : 'kosong' }</p>
                            </div>
                        </div>
                    </div>
            </React.Fragment>
            )
        }
}

export default Terapis;
