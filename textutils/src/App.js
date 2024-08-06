
import './App.css';
import Navbar from "./components/Navbar";
import TextForm from "./components/TextForm"


function App() { 
  return (
    <>
      <Navbar title="TextEdits"/>
      
      <div className="container" >
        <TextForm heading="Enter The Text To analyze" title="Your Text"/>
      </div>
    </>
  );
}

export default App;
