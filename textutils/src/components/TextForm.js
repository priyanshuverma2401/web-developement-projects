import React, {useState} from "react";

export default function TextForm(props) {
  const [text, setText] = useState("");

  const handleupclick = ()=>{
    let newText = text.toUpperCase();
    setText(newText);
  }

  const handlelowclick = ()=>{
    let newText = text.toLowerCase();
    setText(newText);
  }

  const handleclearclick = ()=>{
    setText("");
  }

  const handleonchange = (e)=>{
    console.log("on change");
    setText(e.target.value);
  }
  return (
    <>
    <div>
      <h1>{props.heading}</h1>
      <div className="mb-3">
        <label htmlFor="mybox" className="form-label">
          {props.title}
        </label>
        <textarea
          className="form-control"
          id="mybox"
          rows="8"
          value={text}
          onChange={handleonchange}
        ></textarea>
      </div>
      <button className="btn bg-primary mx-2 my-2" onClick={handleupclick}>UPPERCASE</button>
      <button className="btn bg-primary mx-2 my-2" onClick={handlelowclick}>lowercase</button>
      <button className="btn bg-danger mx-2 my-2" onClick={handleclearclick}>Clear</button>
    </div>
    <div className="container my-4">
      <h1>Your Text Summary</h1>
      <p>{text.split(" ").length} Words and {text.length} Character.</p>
      <p>{0.008* text.split(" ").length} min. reads</p>
      <h1>Preview</h1>
      <p>{text}</p>
    </div>
    </>
    
  );
}
