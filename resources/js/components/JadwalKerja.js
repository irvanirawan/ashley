import React from 'react';
import ReactDOM from 'react-dom';
import FullCalendar from '@fullcalendar/react'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction' // needed for dayClick
import Skeleton, { SkeletonTheme } from 'react-loading-skeleton';
import Select from 'react-select';
import './main.scss';

const calendarComponentRef = React.createRef();

class JadwalKerja extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            load: false,
            calendarComponentRef: React.createRef(),
            terapisId: '',
            terapisData: [{label:'No Data',value:0}],
            calendarEvents: [ // initial event data
                                { title: 'Loading', start: new Date() }
                            ]
        }
        this.handleDateClick    = this.handleDateClick.bind(this)
        this.onClickTerapis     = this.onClickTerapis.bind(this)
    }
    componentDidMount(){
        window.axios.get('/data-terapis').then(({ data }) => {
            this.setState({terapisData:data})
        });
    }
    onClickTerapis(data){
        this.setState({load:true});
        window.axios.get('/booking-jadwal-terapis?terapis='+data.value).then(({ data }) => {
            this.setState({calendarEvents:data,load:false})
          });
    }
    handleDateClick(arg){
        // if (confirm('Would you like to add an event to ' + arg.dateStr + ' ?')) {
        //     this.setState({  // add new event data
        //       calendarEvents: this.state.calendarEvents.concat({ // creates a new array
        //         title: 'New Event',
        //         start: arg.date,
        //         allDay: arg.allDay
        //       })
        //     })
        //   }
    }
    render(){
        return(
            <React.Fragment>
                <div className='demo-app-top'>
                    {/* <button onClick={ this.toggleWeekends }>toggle weekends</button> */}
                    <Select options={this.state.terapisData} onChange={this.onClickTerapis} />
                </div>
                <div className='demo-app-calendar'>
                    {this.state.load ? (<Loading/>) :
                    <FullCalendar
                        defaultView="dayGridMonth"
                        header={{ left: 'prev,next today', center: 'title', right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek' }}
                        plugins={[ dayGridPlugin, timeGridPlugin, interactionPlugin ]}
                        ref={ this.calendarComponentRef }
                        weekends={ this.state.calendarWeekends }
                        events={ this.state.calendarEvents }
                        dateClick={ this.handleDateClick }
                        />
                    }
                </div>
            </React.Fragment>
        )
    }
}

function Loading() {
    return(
        <>
            <Skeleton height={40} width={225}/>&nbsp;
            <Skeleton height={40} width={225}/>&nbsp;
            <Skeleton height={40} width={225}/>&nbsp;
            <Skeleton height={500} />
        </>
    )
}

export default JadwalKerja;

if (document.getElementById('jadwalkerja')) {
    ReactDOM.render(<JadwalKerja />, document.getElementById('jadwalkerja'));
}
