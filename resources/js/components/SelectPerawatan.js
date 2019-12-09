import React from 'react';
import ReactDOM from 'react-dom';
import { Modal, Button } from 'react-bootstrap';

class SelectPerawatan extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            showSearchPerawatan:false,
            showModal: false
        };
        this.onClickSearchPerawatan = this.onClickSearchPerawatan.bind(this);
        this.handleOpenModal = this.handleOpenModal.bind(this);
        this.handleCloseModal = this.handleCloseModal.bind(this);
    }
    onClickSearchPerawatan(){
        this.setState({ showSearchPerawatan: !this.state.showSearchPerawatan })
    }

    handleOpenModal () {
      this.setState({ showModal: true });
    }

    handleCloseModal () {
      this.setState({ showModal: false });
    }
    render(){
        window.axios.get('/api/tes').then(({ data }) => {
            console.log(this.state.data)
          });
        return(
            <React.Fragment>
                <section className="search-sec">
                    <div className="container">
                        <form action="#" method="post">
                            <div className="row">
                                <div className="col-lg-12">
                                    <div className="row">
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <input onClick={this.onClickSearchPerawatan} type="text" className="form-control search-slt" placeholder="Pilih Perawatan" />
                                            { this.state.showSearchPerawatan ? <Perawatan/> : null }
                                        </div>
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <input onClick={this.handleOpenModal} type="text" className="form-control search-slt" placeholder="Pilih Tanggal" />
                                        </div>
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <input type="text" className="form-control search-slt" placeholder="Pilih Terapis" />
                                        </div>
                                        <div className="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <button type="button" className="btn btn-danger wrn-btn">Booking</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <Modal dialogClassName="modal-90w" show={this.state.showModal}>
                    sssss
                    <Modal.Footer closeButton>
                        <Button onClick={this.handleCloseModal} >tes</Button>
                    </Modal.Footer>
                </Modal>
            </React.Fragment>
        )
    }
}

function Perawatan() {
    return(
        <div className="instant-results" style={{display:"block",height:"auto"}}>
            <ul className="list-unstyled result-bucket" id="results_suggest_kategori">
                    <li><strong>Kategori</strong></li>
                    <li>Baju</li>
                    <li><strong>Kategori</strong></li>
                    <li>Baju</li>
                    <li><strong>Kategori</strong></li>
                    <li>Baju</li>
            </ul>
        </div>
    )
}

export default SelectPerawatan;

if (document.getElementById('select-perawatan')) {
    ReactDOM.render(<SelectPerawatan />, document.getElementById('select-perawatan'));
}
