import React from 'react';
import ReactDOM from 'react-dom';
import { Modal, Button } from 'react-bootstrap';
import Calendar from 'react-calendar';
import Perawatan from './Perawatan.js';
import Tanggal from './Tanggal.js';
import Terapis from './Terapis.js';

import '../css/SelectPerawatan.scss';

class SelectPerawatan extends React.Component{
    constructor(props){
        super(props)
        this.input = React.createRef();
        this.state = {
            showSearchPerawatan:false,
            showModal: false,
            showModalTerapis: false,
            disabledTanggal: true,
            disabledTerapis: true,
            disabledButton: true,
            perawatanId: null,
            perawatanValue: '',
            tanggalId: null,
            tanggalValue: '',
            tanggalFormat: '',
            dataTanggal:null,
            slotId:'',
            terapisPerawatanId:'',
            terapisPerawatanNama:''
        };
        this.onClickSearchPerawatan = this.onClickSearchPerawatan.bind(this);
        this.handleOpenModal        = this.handleOpenModal.bind(this);
        this.handleCloseModal       = this.handleCloseModal.bind(this);
        this.handleOpenModalTerapis = this.handleOpenModalTerapis.bind(this);
        this.handleCloseModalTerapis= this.handleCloseModalTerapis.bind(this);
        this.setTanggalSlot         = this.setTanggalSlot.bind(this);
        this.setTerapis             = this.setTerapis.bind(this);
    }

    handleOpenModal () {
        window.axios.get('/api/tanggal').then(({ data }) => {
            this.setState({dataTanggal:data});
          });
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
        if (typeof data.id !== 'undefined') {
            this.setState({perawatanValue:data.nama});
          }
        this.setState({ showSearchPerawatan: !this.state.showSearchPerawatan, disabledTanggal: false})
    }

    setTanggalSlot (data) {
      this.setState({
                    tanggalValue: data.datestring,
                    tanggalFormat: data.dateformat,
                    slotId:data.slotId,
                    disabledTerapis: false
                    });
    }

    setTerapis (data) {
      this.setState({
                    terapisPerawatanId: data.id,
                    terapisPerawatanNama: data.nama,
                    disabledButton: false
                    });
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
                                            <input ref={this.input} value={this.state.perawatanValue} onClick={this.onClickSearchPerawatan} type="text" className="form-control search-slt" placeholder="Pilih Perawatan" />
                                            { this.state.showSearchPerawatan ? <Perawatan fungsi={this.onClickSearchPerawatan}/> : null }
                                        </div>
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <input disabled = {(this.state.disabledTanggal)? "disabled" : ""} value={this.state.tanggalValue} onClick={this.handleOpenModal} type="text" className="form-control search-slt" placeholder="Pilih Tanggal" />
                                        </div>
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <input disabled = {(this.state.disabledTerapis)? "disabled" : ""} value={this.state.terapisPerawatanNama} onClick={this.handleOpenModalTerapis} type="text" className="form-control search-slt" placeholder="Pilih Terapis" />
                                        </div>
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <button disabled = {(this.state.disabledButton)? "disabled" : ""} type="button" className="btn btn-danger wrn-btn">Booking</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <Modal dialogClassName="modal-90w" show={this.state.showModal}>
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
                <Modal dialogClassName="modal-90w" show={this.state.showModalTerapis}>
                    <Modal.Header >
                            <Modal.Title>Pilih Terapis</Modal.Title>
                    </Modal.Header>
                    <br/>
                    <Terapis perawatanId={this.state.perawatanId} slotId={this.state.slotId} fSetTerapis={this.setTerapis} />
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
