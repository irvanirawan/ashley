import React from 'react';
import ReactDOM from 'react-dom';
import FullCalendar from '@fullcalendar/react'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction' // needed for dayClick
import Skeleton, { SkeletonTheme } from 'react-loading-skeleton';

import './main.scss';

// function Example() {
//     return (
//         <div className="container">
//             <div className="row justify-content-center">
//                 <div className="col-md-8">
//                     <div className="card">
//                         <div className="card-header">Example Component</div>

//                         <div className="card-body">I'm an example component!</div>
//                     </div>
//                 </div>
//             </div>
//         </div>
//     );
// }
const calendarComponentRef = React.createRef();

class Example extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            calendarComponentRef: React.createRef(),
            tes:true,
            calendarWeekends: true,
            calendarEvents: [ // initial event data
                { title: 'Manicure', start: new Date(), irvan:'tes' },
                { title: 'Padicure', start: new Date() },
                { title: 'Tes', start: new Date() },
                { title: 'Perawatan', start: new Date() },
                { title: 'Tes', start: new Date() },
                { title: 'Tes', start: new Date() },
            { title: 'Event Now Too', start: new Date(2019,10,17) },
            { title: 'Event More', start: '2019-11-02' }
            ]
        }
        this.toggleWeekends = this.toggleWeekends.bind(this)
        this.gotoPast = this.gotoPast.bind(this)
        this.handleDateClick = this.handleDateClick.bind(this)
        this.tes = this.tes.bind(this);
    }
    tes(){
        this.setState({ // update a property
            tes: !this.state.tes
          })
    }
    toggleWeekends(){
        this.setState({ // update a property
            calendarWeekends: !this.state.calendarWeekends
          })
    }
    gotoPast(){
        let calendarApi = this.state.calendarComponentRef.current.getApi()
        calendarApi.gotoDate('2000-01-01') // call a method on the Calendar object
    }
    handleDateClick(arg){
        if (confirm('Would you like to add an event to ' + arg.dateStr + ' ?')) {
            this.setState({  // add new event data
              calendarEvents: this.state.calendarEvents.concat({ // creates a new array
                title: 'New Event',
                start: arg.date,
                allDay: arg.allDay
              })
            })
          }
    }
    render(){
        window.axios.get('/api/tes').then(({ data }) => {
            console.log(data)
          });

        return(
        <div className='demo-app'>
            <button onClick={ this.tes }>TES</button>&nbsp;<br/>
{this.state.tes ? (<Loading/>) : (
    <React.Fragment>
            <div className='demo-app-top'>
              <button onClick={ this.toggleWeekends }>toggle weekends</button>&nbsp;
              <button onClick={ this.gotoPast }>go to a date in the past</button>&nbsp;
              (also, click a date/time to add an event)
            </div>
            <div className='demo-app-calendar'>
              <FullCalendar
                defaultView="dayGridMonth"
                header={{
                  left: 'prev,next today',
                  center: 'title',
                  right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                }}
                plugins={[ dayGridPlugin, timeGridPlugin, interactionPlugin ]}
                ref={ this.calendarComponentRef }
                weekends={ this.state.calendarWeekends }
                events={ this.state.calendarEvents }
                dateClick={ this.handleDateClick }
                />
            </div>
           </React.Fragment>
            )}
        </div>
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

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
