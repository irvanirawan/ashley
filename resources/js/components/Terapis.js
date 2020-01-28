import React from 'react';
import ReactDOM from 'react-dom';
import Skeleton from 'react-loading-skeleton';

import '../css/SelectPerawatan.scss';

class Terapis extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            load:true,
            data:'',
            terapisPerawatanId:''
        };
        this.selectTerapis = this.selectTerapis.bind(this);
    }
    componentDidMount(){
        // awal load set semua state pertanggalan nya
        const datee     = this.props.tanggalFormat;
        const tanggal   = datee.getDate();
        const bulan     = datee.getMonth();
        const tahun     = datee.getFullYear();
        const tanggalFormat   = tahun+'-'+(bulan + 1)+'-'+tanggal;
        const parampampam = {perawatanId:this.props.perawatanId,slotId:this.props.slotId,tanggal:tanggalFormat};
        window.axios.get('/api/terapis',{params:parampampam}).then(({ data }) => {
            this.setState({data,load:false})
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
            if((item.waktu_hari_count === 0) && (item.hari_libur_count === 0)){
                const dipilih = (item.id == this.state.terapisPerawatanId) ? true : false ;
                rows.push(
                    <TerapisList key={index} datanya={item} fungsi={this.selectTerapis} terpilih={dipilih}/>
                            );
            }
        });
        const jumlahTerapis = (rows.length === 0) ? 'Maaf, Terapis tidak tersedia. Silahkan Pilih di tanggal berbeda.' : rows ;
        return(
            <React.Fragment>
            <div className="container">
                <div className="row">
                    { this.state.load
                    ? <React.Fragment><Skeleton count={4} height={260} width={230} /></React.Fragment>
                    : rows
                    }
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
        const linkgambar = "terapis/"+this.props.datanya.terapis.foto;
        return(
            <React.Fragment>
                <div className="col-12 col-sm-6 col-lg-3">
                        <div onClick={this.handleTerapisClick} className={'single-team-member mb-80 ' + classClick}>
                            <div className="team-member-img">
                                <img src={linkgambar} alt=""/>
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
