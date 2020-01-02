import React from 'react';
import ReactDOM from 'react-dom';
import Calendar from 'react-calendar';
import Skeleton from 'react-loading-skeleton';

// import '../css/SelectPerawatan.scss';

class Tanggal extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            load:true,
            data:'',
            count:'',
            idslotaktif:'',
            date: new Date(),
            harihari:["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"],
            bulanbulan:["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]
        };
        this.handleDateClick = this.handleDateClick.bind(this);
        this.selectSlot = this.selectSlot.bind(this);
    }
    handleDateClick(date){
        this.setState({date,load:true,idslotaktif:''});
        const datee     = date;
        const tanggal   = datee.getDate();
        const bulan     = datee.getMonth();
        const tahun     = datee.getFullYear();
        const paramDate = tahun+'-'+(bulan + 1)+'-'+tanggal;
        const parampampam = {tanggal:paramDate,perawatanId:this.props.perawatanId};
        window.axios.get('/api/tanggal',{params:parampampam}).then(({ data }) => {
            this.setState({count:data.count,data:data.data,load:false})
          });
    }
    componentDidMount(){
        // awal load set semua state pertanggalan nya
        const datee     = this.state.date;
        const tanggal   = datee.getDate();
        const bulan     = datee.getMonth();
        const tahun     = datee.getFullYear();
        const namahari  = this.state.harihari[datee.getDay()];
        const namabulan = this.state.bulanbulan[datee.getMonth()];
        const paramDate = tahun+'-'+(bulan + 1)+'-'+tanggal;
        const parampampam = {tanggal:paramDate,perawatanId:this.props.perawatanId};
        window.axios.get('/api/tanggal',{params:parampampam}).then(({ data }) => {
            this.setState({count:data.count,data:data.data,load:false})
          });
    }
    selectSlot(idslotaktif,start){
        this.setState({idslotaktif});
        const datee     = this.state.date;
        const tanggal   = datee.getDate();
        const bulan     = datee.getMonth();
        const tahun     = datee.getFullYear();
        const namahari  = this.state.harihari[datee.getDay()];
        const namabulan = this.state.bulanbulan[datee.getMonth()];
        const datefull  = namahari+' '+tanggal+' '+namabulan+' '+tahun+' '+start;
        // const dateformat = new Date(this.state.slotyear,this.state.slotmonth);
        this.props.fSetTanggalSlot({datestring:datefull,dateformat:datee,slotId:idslotaktif});
    }
    render() {
        // console.log([this.state.slotdate]);
        const {data,date} = this.state;
        const tanggal   = date.getDate();
        const bulan     = date.getMonth();
        const tahun     = date.getFullYear();
        const namahari  = this.state.harihari[date.getDay()];
        const namabulan = this.state.bulanbulan[date.getMonth()];
        const rows = [];
        const slot = Array.from(data);
        slot.map((item,index)=>{
            const dipilih = (item.id == this.state.idslotaktif) ? true : false ;
            const fully = (item.terapis_perawatan_count === this.state.count)? true : false ;
            rows.push(
                <SlotList key={index} datanya={item} fungsi={this.selectSlot} terpilih={dipilih} full={fully}/>
                        );
        })
        const jumlahSlot = (this.state.count === 0)? 'Terapis Tidak Tersedia.': rows ;
        return(
        <React.Fragment>
            <div className="row">
                <div className="col-md-5 col-sm-8 pull80">
                <Calendar onChange={this.handleDateClick} value={this.state.date} />
                </div>
                <div className="col-md-7 col-sm-4">
                    <div className="single-booking-table d-flex">
                        <div className="single-date-hours active">
                            <div className="booking-day">
                                <h5>{namahari}</h5>
                                <h6>{tanggal} {namabulan} {tahun}</h6>
                            </div>
                            <div className="booking-hours d-flex flex-wrap">
                                {this.state.load? <React.Fragment><Skeleton height={40} width={400} /><Skeleton height={40} width={400} /></React.Fragment>: jumlahSlot }
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </React.Fragment>
        )
    }
}

class SlotList extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            data:''
        };
        this.handleSlotClick = this.handleSlotClick.bind(this);
    }
    handleSlotClick(){
        // this.setState({slotdays:hari,slotdate:date.getDate(),slotmonths:bulan,slotyear:tahun});
        this.props.fungsi(this.props.datanya.id,this.props.datanya.start);
    }
    render() {
        return(
            <React.Fragment>
                {/* <span className="active" title="Full (Tidak Tersedia)">{this.props.datanya.start}</span> */}
                { this.props.full
                ? <span title={this.props.full ? 'Full (Tidak Tersedia)' : 'Tersedia' } className={this.props.full ? 'active' : 'jamslot' } style={(this.props.terpilih)?{backgroundColor:'#ccc'}:{}}>{this.props.datanya.start}</span>
                : <span onClick={this.handleSlotClick} title={this.props.full ? 'Full (Tidak Tersedia)' : 'Tersedia' } className={this.props.full ? 'active' : 'jamslot' } style={(this.props.terpilih)?{backgroundColor:'#ccc'}:{}}>{this.props.datanya.start}</span>
                }
                {/* <span onClick={this.handleSlotClick} title={this.props.full ? 'Full (Tidak Tersedia)' : 'Tersedia' } className={this.props.full ? 'active' : 'jamslot' } style={(this.props.terpilih)?{backgroundColor:'#ccc'}:{}}>{this.props.datanya.start}</span> */}
            </React.Fragment>
        )
    }
}

export default Tanggal;
