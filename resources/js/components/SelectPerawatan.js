import React from 'react';
import ReactDOM from 'react-dom';
import { Modal, Button } from 'react-bootstrap';
import Calendar from 'react-calendar';
import Perawatan from './Perawatan.js';
import Tanggal from './Tanggal.js';
import Terapis from './Terapis.js';
import { Dot } from 'react-animated-dots';

import '../css/SelectPerawatan.scss';

class SelectPerawatan extends React.Component{
    constructor(props){
        super(props)
        this.input = React.createRef();
        this.state = {
            load:false,
            showSearchPerawatan:false,
            showModal: false,
            showModalTerapis: false,
            disabledTanggal: true,
            disabledTerapis: true,
            disabledButton: true,
            perawatanId: '',
            perawatanValue: '',
            tanggalFormat: '',
            tanggalValue: '',
            slotId:'',
            terapisPerawatanId:'',
            terapisPerawatanNama:''
        };
        this.onClickSearchPerawatan = this.onClickSearchPerawatan.bind(this);
        this.handleOpenModal        = this.handleOpenModal.bind(this);
        this.handleCloseModal       = this.handleCloseModal.bind(this);
        this.handleOpenModalTerapis = this.handleOpenModalTerapis.bind(this);
        this.handleCloseModalTerapis= this.handleCloseModalTerapis.bind(this);
        this.setPerawatan           = this.setPerawatan.bind(this);
        this.setTanggalSlot         = this.setTanggalSlot.bind(this);
        this.setTerapis             = this.setTerapis.bind(this);
        this.buttonSubmit           = this.buttonSubmit.bind(this);
    }

    handleOpenModal () {
      this.setState({ showModal: true, showSearchPerawatan:false});
    }
    handleCloseModal () {
      this.setState({ showModal: false });
    }
    handleOpenModalTerapis () {
      this.setState({ showModalTerapis: true, showSearchPerawatan:false});
    }
    handleCloseModalTerapis () {
      this.setState({ showModalTerapis: false });
    }
    onClickSearchPerawatan(data){
        this.setState({ showSearchPerawatan: !this.state.showSearchPerawatan})
    }
    setPerawatan (data) {
        if (typeof data.id !== 'undefined') {
            this.setState({
                        perawatanValue:data.nama,
                        perawatanId:data.id,
                        tanggalValue: '',
                        tanggalFormat: '',
                        slotId:'',
                        terapisPerawatanId:'',
                        terapisPerawatanNama:'',
                        showSearchPerawatan: !this.state.showSearchPerawatan,
                        disabledTanggal:false
                        });
          }
    }
    setTanggalSlot (data) {
      this.setState({
                    tanggalValue: data.datestring,
                    tanggalFormat: data.dateformat,
                    slotId:data.slotId,
                    disabledTerapis: false,
                    terapisPerawatanId: '',
                    terapisPerawatanNama: ''
                    });
    }
    setTerapis (data) {
      this.setState({
                    terapisPerawatanId: data.id,
                    terapisPerawatanNama: data.nama,
                    disabledButton: false
                    });
    }
    buttonSubmit (data) {
        this.setState({load:true});
        if(this.state.tanggalFormat == ''){
            this.setState({ showModal: true });
        }else{
            if(this.state.terapisPerawatanId == ''){
                this.setState({ showModalTerapis: true });
            }
        }
        if((this.state.tanggalFormat != '') && (this.state.terapisPerawatanId != '')){
            //   post: perawatanId, tanggalFormat, slotId, terapisPerawatanId
            const data={
                        tanggal:this.state.tanggalFormat,
                        slotId:this.state.slotId,
                        terapisPerawatanId:this.state.terapisPerawatanId
                        };
            window.axios.post('/booking',data).then(({ data }) => {
                // this.setState({load:false});
                window.location.href = "/booking-history";
              });
        }
    }
    render(){
        return(
            <React.Fragment>
                <section className="search-sec">
                    <div className="container">
                        <form action="#" method="post">
                            <div className="row">
                                <div className="col-lg-12">
                                    <div className="row">
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <input defaultValue={this.state.perawatanValue} onClick={this.onClickSearchPerawatan} type="text" className="form-control search-slt" placeholder="Pilih Perawatan" />
                                            { this.state.showSearchPerawatan ? <Perawatan fSetPerawatan={this.setPerawatan}/> : null }
                                        </div>
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <input disabled = {(this.state.disabledTanggal)? "disabled" : ""} defaultValue={this.state.tanggalValue} onClick={this.handleOpenModal} type="text" className="form-control search-slt" placeholder="Pilih Tanggal" />
                                        </div>
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <input disabled = {(this.state.disabledTerapis)? "disabled" : ""} defaultValue={this.state.terapisPerawatanNama} onClick={this.handleOpenModalTerapis} type="text" className="form-control search-slt" placeholder="Pilih Terapis" />
                                        </div>
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <button disabled = {(this.state.disabledButton)? "disabled" : ""} type="button" className="btn btn-danger wrn-btn" onClick={this.buttonSubmit}>Booking {this.state.load ? <React.Fragment><Dot>.</Dot> <Dot>.</Dot> <Dot>.</Dot></React.Fragment> : '' }</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <Modal dialogClassName="modal-90w" show={this.state.showModal} onHide={this.handleCloseModal}>
                    <Modal.Header >
                        <Modal.Title>Pilih Tanggal Datang</Modal.Title>
                    </Modal.Header>
                    <br/>
                    <Tanggal perawatanId={this.state.perawatanId} fSetTanggalSlot={this.setTanggalSlot} />
                    <br/>
                    <Modal.Footer >
                        <Button onClick={this.handleCloseModal} >OK</Button>
                    </Modal.Footer>
                </Modal>
                <Modal dialogClassName="modal-90w" show={this.state.showModalTerapis} onHide={this.handleCloseModalTerapis}>
                    <Modal.Header >
                            <Modal.Title>Pilih Terapis</Modal.Title>
                    </Modal.Header>
                    <br/>
                    <Terapis perawatanId={this.state.perawatanId} slotId={this.state.slotId} tanggalFormat={this.state.tanggalFormat} fSetTerapis={this.setTerapis} />
                    <br/>
                    <Modal.Footer >
                        <Button onClick={this.handleCloseModalTerapis} >OK</Button>
                    </Modal.Footer>
                </Modal>
            </React.Fragment>
        )
    }
}

export default SelectPerawatan;

if (document.getElementById('select-perawatan')) {
    ReactDOM.render(<SelectPerawatan />, document.getElementById('select-perawatan'));
}
