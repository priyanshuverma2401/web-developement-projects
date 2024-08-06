
import './App.css';
import Navbar from "./components/Navbar";
import TextForm from "./components/TextForm"
// import About from "./components/About"

function App() { 
  return (
    <>
      <Navbar title="TextEdits"/>
      {/* <About/> */}
      <div className="container" >
        <TextForm heading="Enter The Text To analyze" title="Your Text"/>
      </div>
    </>
  );
}

export default App;
