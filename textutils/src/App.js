
import './App.css';

import Alert from "./components/Alert";
import Navbar from "./components/Navbar";
import TextForm from "./components/TextForm";
import React, {useState} from 'react';
import Contact from './components/Contact';
import About from "./components/About";
import {
  BrowserRouter as Router,
  Routes,
  Route
} from "react-router-dom";


function App() { 
  const [alert, setAlert] = useState(null);

  

  const showAlert = (message, type)=>{
    setAlert({
      msg: message,
      type: type
    })
    setTimeout(() => {
      setAlert(null);
    }, 1500);
  }
  return (
    <>
    <Router>
      <Navbar  title="TextEdits"/>
      <Alert alert={alert}/>
      
      <div className="container" >
        <Routes>
          <Route exact path='/about' element={<About/>}/>
          <Route exact path='/' element={<TextForm showAlert={showAlert} heading="Enter The Text To analyze" title="Your Text" />}/>
          <Route exact path='/contact' element={<Contact/>}/>
        </Routes>
      </div>
      </Router>
    </>
  );
}

export default App;
